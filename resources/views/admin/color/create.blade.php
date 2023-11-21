@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle px-4 py-3" style='min-height:875px'>
    <div class="row justify-content-center">
        <div class="col-12 bg-white">
            <form action="{{route('color.store')}}" method="post" class=" px-4 py-5 ">
                @csrf
                <div class="mb-4 d-flex justify-content-between ">
                    <h4 class="">Create a new color</h4>
                    <a href="{{route('color.index')}}" class="btn btn-outline-secondary px-5">All colors</a>
                </div>
                <hr>
                <div class="form-group mb-4 w-25 ">
                    <label for="" class=" form-label ">Color Name</label>
                    <input type="text" name="name" id="" class=" form-control " autofocus>
                </div>
                <button type="submit" class="btn btn-primary px-4">Create</button>
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
