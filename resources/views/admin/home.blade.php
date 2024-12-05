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
        <th scope="col">{{__("message.title")}}</th>
        <th scope="col">{{__("message.category")}}</th>
        <th scope="col">{{__("message.price")}}</th>
        <th scope="col">{{__("message.quantity")}}</th>
        <th scope="col">{{__("message.desc")}}</th>
        <th scope="col">{{__("message.image")}}</th>
        <th scope="col">{{__("message.action")}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->category->title}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{Str::limit($product->desc,38, '...')}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>
            <h1>
                <a class="btn btn-success" href="{{url("products/edit/$product->id")}}" >{{__("message.edit")}}</a>
            </h1>
            <form action="{{route("deleteproduct",$product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{__("message.delete")}}</button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>
{{$products->links()}}
@endsection