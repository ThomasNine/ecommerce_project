@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 bg-white pt-5 pb-3 px-5 d-flex flex-column " style="height:845px">
            <div class="mb-4 d-flex justify-content-between ">
                <h4 class="">Product-Add-Transaction List</h4>
                <a href="{{url('admin/product-remove-transaction')}}" class="btn btn-outline-secondary px-5">
                    Remove-Transitions List
                </a>
            </div>
            <hr class="mb-0 bg-secondary-subtle ">
            <table class="table table-hover mb-4 align-middle " >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Total Quantity</th>
                        <th>Supplier</th>
                        <th>Description</th>
                        <th>Buy Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addTransactions as $key=>$each)
                        <tr class="">
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('/images/'.$each->product->image)}}" alt="product image" class=" img-thumbnail object-fit-cover" style='height:100px;width:100px'>
                            </td>
                            <td>{{$each->product->name}}</td>
                            <td>{{$each->total_quantity}}</td>
                            <td>{{$each->supplier->name}}</td>
                            <td>{{$each->description}}</td>
                            <td>{{$each->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" align-self-center mt-auto ">{{$addTransactions->links()}}</div>
        </div>
    </div>
</div>
@endsection
