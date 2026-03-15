<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;   // ✅ ye line add karo

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product');
    }

 public function addCategory()
    {
        return view('admin.addcat');
    }

 public function storeCategory(Request $request)
{
    try {
        $request->validate([
            'category_name' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $imageName = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('category'), $imageName);
        }

        Category::create([
            'name' => $request->category_name,
            'image' => $imageName,
            'status' => $request->status == 1 ? 'active' : 'inactive'
        ]);

        return redirect()->back()->with('success', 'Category Added Successfully');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Category not added.');
    }
}

}