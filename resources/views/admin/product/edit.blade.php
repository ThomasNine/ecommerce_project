@extends('admin.layout.master')

@section('css')
@endsection

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3" style='min-height:875px'>
    <div class="row">
        <div class="col-12 bg-white px-4 py-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Edit product</h4>
                <a href="{{route('product.index')}}" class="btn btn-outline-secondary px-5">All Products</a>
            </div>
            <hr>
            <form action="{{route('product.update',$product->slug)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-6">
                        <div class=" form-group mb-2 ">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value='{{$product->name}}'>
                        </div>
                        <div class="form-group mb-2 ">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img src="{{asset('/images/'.$product->image)}}" alt="" width="100" height="100" class=" img-thumbnail object-fit-cover mt-2 ">
                        </div>
                    </div>
                    <div class="col-6 form-group mb-2 ">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{$product->description}}</textarea>
                    </div>
                    {{-- pricing --}}
                    <div class="col-3 form-group mb-2 ">
                        <label for="total_quantity" class="form-label">Total Quantity</label>
                        <input type="number" name="total_quantity" id="total_quantity" class="form-control" value='{{$product->total_quantity}}'>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                        <label for="buy_price" class="form-label">Buy Price</label>
                        <input type="number" name="buy_price" id="buy_price" class="form-control" value='{{$product->buy_price}}'>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                        <label for="sale_price" class="form-label">Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" value='{{$product->sale_price}}'>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                        <label for="discount_price" class="form-label">Discount Price</label>
                        <input type="number" name="discount_price" id="discount_price" class="form-control" value='{{$product->discount_price}}'>
                    </div>
                    {{-- select  --}}
                    <div class="col-3 form-group mb-2 ">
                        <label for="supplier" class="form-label">Choose supplier</label>
                        <select name="supplier_slug" id="supplier" class=" form-select">
                            @foreach ($supplier as $a)
                                <option value="{{$a->slug}}" @if ($a->id=== $product->supplier_id) selected @endif>
                                        {{$a->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                        <label for="brand" class="form-label">Choose brand</label>
                        <select name="brand_slug" id="brand" class=" form-select">
                            @foreach ($brand as $a)
                                <option value="{{$a->slug}}" @if($a->id===$product->brand_id) selected @endif>
                                    {{$a->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                    <label for="category" class="form-label">Choose category</label>
                        <select name="category_slug" id="category" class=" form-select">
                            @foreach ($category as $a)
                                <option value="{{$a->slug}}" @if($a->id===$product->category_id) selected @endif>
                                    {{$a->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 form-group mb-2 ">
                        <label for="color" class="form-label">Choose color</label>
                        <select name="color_slug[]" id="color" class=" form-select" multiple>
                            @foreach ($color as $a)
                                <option value="{{$a->slug}}"
                                    @foreach ($product->color as $c)
                                        @if ($c->id===$a->id)
                                            selected
                                        @endif
                                    @endforeach
                                >
                                    {{$a->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 offset-3 mt-5">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <small class=" text-danger ms-2 ">{{$e}}</small>
                    @endforeach
             @endif
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
