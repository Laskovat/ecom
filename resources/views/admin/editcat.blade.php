@extends('admin.layout')
@section("body")

<h3>Edit Category</h3>
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
<form method="POST" action="{{route("updatecat",$category->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Category Title</label>
      <input type="text" name="title" class="form-control text-white" value="{{$category->title}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Category Description</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">{{$category->desc}}</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
