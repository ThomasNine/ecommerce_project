@extends('admin.layout.master')

@section('content')
<div class="col-10 bg-secondary-subtle ">
    {{auth()->guard("admin")->user()}}
</div>
@endsection
