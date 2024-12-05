@extends('admin.layout')
@section("body")

@if (session()->has("success"))
<div class="alert alert-success">
{{session()->get("success")}}
</div>
@endif
@if (session()->has("error"))
<div class="alert alert-danger">
{{session()->get("error")}}
</div>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Desc</th>
        <th scope="col">Products</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$category->title}}</td>
        <td>{{Str::limit($category->desc,60, '...')}}</td>
        <td>
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>Products</option>
                @foreach ($category->products as $product )

                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
        </td>
        <td>
            <h1>
                <a class="btn btn-success" href="{{url("categories/edit/$category->id")}}" >edit</a>
            </h1>
            <form action="{{url("categories/delete/$category->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>
{{$categories->links()}}
@endsection