@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3" style='min-height:875px'>
    <div class="row justify-content-center">
        <div class="col-12 bg-white ">
            <form action="{{url('/admin/create-product-add',$product->slug)}}" method="post" class=" px-4 py-5 ">
                @csrf
                <div class="mb-4 d-flex justify-content-between ">
                    <h4 class="">
                        Add more quantity for
                        <span class=" text-primary ">{{$product->name}}</span>
                    </h4>
                    <a href="{{route('product.index')}}" class="btn btn-outline-secondary px-5">All products</a>
                </div>
                <hr>
                <div class="form-group mb-4 w-50">
                    <label for="supplier" class=" form-label ">Supplier Name</label>
                    <select name="supplier_id" id="supplier" class="form-select" required>
                        @foreach ($supplier as $each)
                            <option value="{{$each->id}}">{{$each->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4 w-50">
                    <label for="total_quantity" class=" form-label ">Total Quantity</label>
                    <input type="number" name="total_quantity" id="total_quantity" class="form-control" required>
                </div>
                <div class="form-group mb-4 w-50">
                    <label for="description" class=" form-label ">Descripton</label>
                    <textarea name="description" id="descripton" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 w-50 ">Add</button>
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
