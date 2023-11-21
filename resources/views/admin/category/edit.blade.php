@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3" style='min-height:875px'>
    <div class="row justify-content-center">
        <div class="col-12 bg-white">
            <form action="{{route('category.update',$category->slug)}}" method="post" class=" px-4 py-5 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4 d-flex justify-content-between ">
                    <h4 class="">Edit category name</h4>
                    <a href="{{route('category.index')}}" class="btn btn-outline-secondary px-5">All categories</a>
                </div>
                <hr>
                <div class="form-group mb-4 w-25">
                    <label for="" class=" form-label ">Category Name To Update</label>
                    <input type="text" name="name" id="" class=" form-control " value='{{$category->name}}'>
                </div>
                <div class="form-group mb-4 w-25">
                    <label for="" class=" form-label ">Category Name(မြန်မာဘာသာ)</label>
                    <input type="text" name="mm_name" value="{{$category->mm_name}}" class=" form-control " required>
                </div>
                <div class="form-group mb-4 w-25">
                    <label for="" class=" form-label ">Category Image</label>
                    <input type="file" name="image" class="img_thumbnail form-control " required>
                    <img src="{{asset('/images/'.$category->image)}}" alt="" width="100" height="100" class=" img-thumbnail object-fit-cover mt-2 ">
                </div>
                <button type="submit" class="btn btn-primary px-4">Update</button>
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
