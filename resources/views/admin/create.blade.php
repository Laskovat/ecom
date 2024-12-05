@extends('admin.layout')
@section("body")

{{-- @include('admin.errors')
@include('admin.success') --}}


<h3>Add New Product</h3>
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
<form method="POST" action="{{url('products')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" class="form-control text-white" value="{{old("name")}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{old("desc")}}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" class="form-control text-white"value="{{old("price")}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="number" name="quantity" class="form-control text-white"value="{{old("quantity")}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
      </div>
        <select name="category_id" id="">
            <option disabled selected value="">categories</option>

            @foreach ($categories as $category )

            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
