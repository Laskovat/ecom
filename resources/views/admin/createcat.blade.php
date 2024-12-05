@extends('admin.layout')
@section("body")

{{-- @include('admin.errors')
@include('admin.success') --}}


<h3>Add New Category</h3>
@if ($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
@if (session()->has("success"))
<div class="alert alert-success">
{{session()->get("success")}}
</div>
@endif
<form method="POST" action="{{url('categories')}}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Title</label>
      <input type="text" name="title"value="{{old("title")}}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Category Description</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">{{old("desc")}}</textarea>
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
