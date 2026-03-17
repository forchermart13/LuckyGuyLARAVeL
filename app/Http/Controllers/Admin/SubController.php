<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubController extends Controller
{

    public function addSubcategory()
    {
        $categories = Category::all();

        return view('admin.sub', compact('categories'));
    }

    public function storeSubcategory(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:11048',
            'status' => 'required'
        ]);

        $imageName = null;

        if($request->hasFile('image')){

            $image = $request->file('image');

            $imageName = time().'_'.$image->getClientOriginalName();

            $image->move(public_path('sub'), $imageName);
        }

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success','Subcategory Added Successfully');
    }
}