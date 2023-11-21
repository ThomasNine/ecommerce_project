<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(5);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'mm_name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        $image= $request->file('image');
        $image_name = uniqid() .$image->getClientOriginalName();
        $image->move(public_path('/images/'),$image_name);

        Category::create([
            'slug'=>Str::slug($request->name) . uniqid(),
            'name'=>$request->name,
            'mm_name'=>$request->mm_name,
            'image'=>$image_name
        ]);
        return redirect()->back()->with('success','A new category is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'mm_name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        $category= Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with('error','Category Not Found');
        };

        if ($image = $request->file('image')) {
            $image_name = uniqid() .$image->getClientOriginalName();
            $image->move(public_path('/images/'),$image_name);
        }else{
            $image_name = $request->image;
        }

        Category::where('slug',$id)->update([
            'name'=>$request->name,
            'mm_name'=>$request->mm_name,
            'image'=>$image_name,
        ]);
        return redirect('admin/category')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('slug',$id);
        if (!$category->first()) {
            return redirect()->back()->with('error','Category Not Found');
        };
        $category->delete();
        return redirect()->back()->with('success','Category is deleted successfully.');
    }
}
