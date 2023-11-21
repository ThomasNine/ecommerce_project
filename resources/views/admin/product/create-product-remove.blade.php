@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3" style='min-height:875px'>
    <div class="row justify-content-center">
        <div class="col-12 bg-white ">
            <form action="{{url('/admin/create-product-remove',$product->slug)}}" method="post" class=" px-4 py-5 ">
                @csrf
                <div class="mb-4 d-flex justify-content-between ">
                    <h4 class="">
                        Remove quantity for
                        <span class=" text-danger ">{{$product->name}}</span>
                    </h4>
                    <a href="{{route('product.index')}}" class="btn btn-outline-secondary px-5">All products</a>
                </div>
                <hr>
                <h6 class=" alert alert-danger w-50 ">Only <span class=" text-danger ">{{$product->total_quantity}}</span> products left</h6>
                <div class="form-group mb-4 w-50">
                    <label for="total_quantity" class=" form-label ">Total Quantity</label>
                    <input type="number" name="total_quantity" id="total_quantity" class="form-control" required>
                </div>
                <div class="form-group mb-4 w-50">
                    <label for="description" class=" form-label ">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 w-50 ">Remove</button>
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
