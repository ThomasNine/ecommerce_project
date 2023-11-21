<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color= Color::latest()->paginate(12);
        return view('admin.color.index',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Color::create([
            'slug'=>Str::slug($request->name).uniqid(),
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success','A new color is created successfully.');
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
        $color=Color::where('slug',$id)->first();
        if (!$color) {
            return redirect()->back()->with('error','Color Not Found');
        }
        return view('admin.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::where('slug',$id);
        if (!$color->first()) {
            return redirect()->back()->with('error','Color Not Found.');
        }
        $color->update([
            'name'=>$request->name,
        ]);
        return redirect('/admin/color')->with('success','Color name is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color=Color::where('slug',$id);
        if (!$color->first()) {
            return redirect()->back()->with('error','Color Not Found.');
        }
        $color->delete();
        return redirect()->back()->with('success','Color is deleted successfully.');
    }
}
