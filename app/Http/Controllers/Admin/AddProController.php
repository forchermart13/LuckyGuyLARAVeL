<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Product;
use App\Models\SizedProduct;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class AddProController extends Controller
{
    public function index()
    {
        // Fetch all sizes from database
        $sizes = Size::orderBy('name')->get();
        $subcategories = DB::table('subcategories')->orderBy('name')->get();
        return view('admin.addpro', compact('sizes', 'subcategories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|max:100',
            'description' => [
                'required',
                'min:20',
                'max:1000',
                function ($attribute, $value, $fail) {
                    // Count words in description
                    $wordCount = str_word_count($value);
                    if ($wordCount < 6) {
                        $fail('The description must be at least 6 words.');
                    }
                },
            ],
            'short_description' => 'nullable|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:13312', // 13MB in KB (13 * 1024)
            'photo02.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:13312', // 13MB in KB
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'subcategory' => 'required|exists:subcategories,id',
            'status' => 'required|in:active,draft,scheduled'
        ]);

        // Begin transaction
        DB::beginTransaction();

        try {
            // Handle main photo upload
            $mainPhotoPath = $this->uploadImage($request->file('photo'), 'products');

            // Create product
            $product = Product::create([
                'subcategory_id' => $request->subcategory,
                'name' => $request->name,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'image' => $mainPhotoPath, // Main photo
                'price' => $request->price,
                'compare_price' => $request->compare_price,
                'status' => $request->status
            ]);

            // Handle additional photos
            if ($request->hasFile('photo02')) {
                foreach ($request->file('photo02') as $photo) {
                    $photoPath = $this->uploadImage($photo, 'products/additional');
                    
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $photoPath
                    ]);
                }
            }

            // Insert sizes into sized_products table
            foreach ($request->sizes as $sizeId) {
                SizedProduct::create([
                    'product_id' => $product->id,
                    'size_id' => $sizeId
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products')->with('success', 'Product created successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error creating product: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Upload image to public directory
     */
    private function uploadImage($file, $folder)
    {
        // Generate unique filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store in public/uploads/{folder}
        $path = public_path('uploads/' . $folder);
        
        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        
        // Move file to public directory
        $file->move($path, $filename);
        
        // Return the path relative to public
        return 'uploads/' . $folder . '/' . $filename;
    }
}