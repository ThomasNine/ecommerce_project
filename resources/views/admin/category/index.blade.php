@extends('admin.layout.master')
@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 bg-white pt-5 pb-3 px-5 d-flex flex-column" style=' height:845px;'>
            <div class="mb-4 d-flex justify-content-between ">
                <h4 class="">Category List</h4>
                <a href="{{route('category.create')}}" class="btn btn-outline-secondary px-5">
                    <i class="bi bi-plus-circle-fill"></i>
                    Create
                </a>
            </div>
            <hr class="mb-0 bg-secondary-subtle ">
            <table class="table table-hover mb-4 align-middle ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th >Image</th>
                        <th >Name</th>
                        <th >MM_Name(မြန်မာဘာသာ)</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key=>$c)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('/images/'.$c->image)}}"alt="product image" class=" img-thumbnail object-fit-cover" style='height:100px;width:100px'>
                            </td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->mm_name}}</td>
                            <td>
                                <a href="{{route('category.edit',$c->slug)}}" class="btn btn-sm btn-outline-secondary ">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>
                                <form action="{{route('category.destroy',$c->slug)}}" method="post" onsubmit="return comfirm("Are you sure to delete?")" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ">
                                        <i class="bi bi-trash-fill"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" align-self-center mt-auto ">{{$category->links()}}</div>
        </div>
    </div>
</div>
@endsection
