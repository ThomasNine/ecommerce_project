<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAddTransaction;
use App\Models\ProductRemoveTransaction;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->select('slug','name','image','total_quantity')->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier=Supplier::all();
        $category=Category::all();
        $brand=Brand::all();
        $color=Color::all();
        return view('admin.product.create',compact('supplier','category','brand','color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:2048',
            'description'=>'required|string',
            'total_quantity'=>'required|integer',
            'buy_price'=>'required|integer',
            'sale_price'=>'required|integer',
            'discount_price'=>'required|integer',
            'supplier_slug'=>'required|string',
            'brand_slug'=>'required|string',
            'category_slug'=>'required|string',
            'color_slug.*'=>'required|string',
        ]);
        // return $request;
        $category = Category::where('slug',$request->category_slug)->first();
        if (!$category) {
            return redirect()->back()->with('error','No category found');
        }
        $supplier = Supplier::where('slug',$request->supplier_slug)->first();
        if (!$supplier) {
            return redirect()->back()->with('error','No supplier found');
        }
        $brand = Brand::where('slug',$request->brand_slug)->first();
        if (!$brand) {
            return redirect()->back()->with('error','No brand found');
        }
        $colors=[];
        foreach ($request->color_slug as $c) {
            $color = Color::where('slug',$c)->first();
            if (!$color) {
                return redirect()->back()->with('error','No color found');
            }
            $colors[]=$color->id;
        }

        $image = $request->file('image');
        $image_name =uniqid().$image->getClientOriginalName();
        $image->move(public_path('/images'),$image_name);

        $product =Product::create([
            'category_id'=>$category->id,
            'brand_id'=>$brand->id,
            'supplier_id'=>$supplier->id,
            'slug'=> uniqid(). Str::slug($request->name),
            'name'=> $request->name,
            'image'=> $image_name,
            'discount_price'=>$request->discount_price,
            'buy_price'=>$request->buy_price,
            'sale_price'=>$request->sale_price,
            'view_count'=>0,
            'like_count'=>0,
            'description'=>$request->description,
            'total_quantity'=>$request->total_quantity,
        ]);
        ProductAddTransaction::create([
            'supplier_id'=>$supplier->id,
            'product_id'=>$product->id,
            'total_quantity' => $request->total_quantity,
        ]);

        Product::find($product->id)->color()->sync($colors);
        return redirect()->back()->with('success','A new product is created successfully.');
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
        $supplier=Supplier::all();
        $brand=Brand::all();
        $color=Color::all();
        $category=Category::all();
        $product= Product::where('slug',$id)
            ->with('supplier','brand','color','category')
            ->first();
        if (!$product) {
            return redirect()->back()->with('error','No brand found');
        }
        // return $product;
        return view('admin.product.edit',compact('supplier','brand','color','category','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $find_product = Product::where('slug',$id)->first();
        if (!$find_product) {
            return redirect()->back()->with('error','No product found');
        }

        $find_product_id =$find_product->id;


        $category = Category::where('slug',$request->category_slug)->first();
        if (!$category) {
            return redirect()->back()->with('error','No category found');
        }
        $supplier = Supplier::where('slug',$request->supplier_slug)->first();
        if (!$supplier) {
            return redirect()->back()->with('error','No supplier found');
        }
        $brand = Brand::where('slug',$request->brand_slug)->first();
        if (!$brand) {
            return redirect()->back()->with('error','No brand found');
        }
        $colors=[];
        foreach ($request->color_slug as $c) {
            $color = Color::where('slug',$c)->first();
            if (!$color) {
                return redirect()->back()->with('error','No color found');
            }
            $colors[]=$color->id;
        }
        $image = $request->file('image');
        if ($image) {
            $image_name =uniqid().$image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
        }else {
            $image_name =$find_product->image;
        }

        $find_product->update([
            'category_id'=>$category->id,
            'brand_id'=>$brand->id,
            'supplier_id'=>$supplier->id,
            'slug'=> uniqid(). Str::slug($request->name),
            'name'=> $request->name,
            'image'=> $image_name,
            'discount_price'=>$request->discount_price,
            'buy_price'=>$request->buy_price,
            'sale_price'=>$request->sale_price,
            'view_count'=>0,
            'like_count'=>0,
            'description'=>$request->description,
            'total_quantity'=>$request->total_quantity,
        ]);
        ProductAddTransaction::create([
            'supplier_id'=>$supplier->id,
            'product_id'=>$find_product->id,
            'total_quantity' => $request->total_quantity,
        ]);

        Product::find($find_product_id)->color()->sync($colors);
        return redirect('admin/product')->with('success','UpdatedP successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('slug',$id)->first();
        if (!$product) {
            return redirect()->back()->with('error','No product found');
        };

        File::delete(public_path('/images/'.$product->image));

        Product::find($product->id)->color()->sync([]);

        $product->delete();
        return redirect()->back()->with('success','The product is deleted successfully.');
    }

    public function createProductAdd($slug){
        $product = Product::where('slug',$slug)->first();
        if (!$product) {
            return redirect()->back()->with('error','No product found');
        };

        $supplier = Supplier::all();
        return view('admin.product.create-product-add',compact('product','supplier'));
    }
    public function storeProductAdd(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        if (!$product) {
            return redirect()->back()->with('error','No product found');
        };
        // return $request;
        ProductAddTransaction::create([
            'product_id'=>$product->id,
            'supplier_id'=>$request->supplier_id,
            'description'=>$request->description,
            'total_quantity'=>$request->total_quantity,
        ]);

        $product->update([
            'total_quantity'=> DB::raw('total_quantity+'.$request->total_quantity)
        ]);
        return redirect()->back()->with('success', $request->total_quantity.'added');
    }

    public function createProductRemove($slug){
        $product = Product::where('slug',$slug)->first();
        if (!$product) {
            return redirect()->back()->with('error','No product found');
        };
        return view('admin.product.create-product-remove',compact('product'));
    }
    public function storeProductRemove(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        if (!$product) {
            return redirect()->back()->with('error','No product found');
        };
        ProductRemoveTransaction::create([
            'product_id'=> $product->id,
            'total_quantity'=>$request->total_quantity,
            'description'=>$request->description
        ]);
        $product->update([
            'total_quantity'=> DB::raw('total_quantity-'.$request->total_quantity)
        ]);
        return redirect()->back()->with('success', $request->total_quantity.' removed');
    }
    public function productAddTransaction(){
        $addTransactions = ProductAddTransaction::with('product','supplier')->paginate(5);
        // return $addTransactions;
        return view('admin.product.add-transaction',compact('addTransactions'));
    }
    public function productRemoveTransaction(){
        $removeTransactions = ProductRemoveTransaction::with('product')->paginate(5);
        // return $addTransactions;
        return view('admin.product.remove-transaction',compact('removeTransactions'));
    }
}
