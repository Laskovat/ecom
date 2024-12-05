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
        <th scope="col">{{__("Order Number")}}</th>
        <th scope="col">{{__("Required Date")}}</th>
        <th scope="col">{{__("Ordered Date")}}</th>
        <th scope="col">{{__("Total")}}</th>
        <th scope="col">{{__("Ordered By")}}</th>
        <th scope="col">{{__("Statue")}}</th>
        <th scope="col">{{__("message.action")}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order )

      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$order->orderNum}}</td>
        <td>{{$order->requiredDate}}</td>
        <td>{{$order->orderDate}}</td>
        <td>{{$order->subtotal}}</td>
        <td>{{$order->user->name}}</td>
        <td>{{$order->orderNum}}</td>
        <td>

            <h1>
                <a class="btn btn-success" href="{{url("showorder/$order->id")}}" >{{__("Show")}}</a>
            </h1>
            <form action="{{route("deleteorder",$order->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{__("message.delete")}}</button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>
{{$orders->links()}}
@endsection