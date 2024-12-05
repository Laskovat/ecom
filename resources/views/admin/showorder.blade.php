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
    <h1>Order Details</h1>
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">{{__("Order Number")}}</th>
        <th scope="col">{{__("Required Date")}}</th>
        <th scope="col">{{__("Ordered Date")}}</th>
        <th scope="col">{{__("Total")}}</th>
        <th scope="col">{{__("State")}}</th>
        {{-- <th scope="col">{{__("Statue")}}</th> --}}
        <th scope="col">{{__("message.action")}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        {{-- <th scope="row">{{$loop->iteration}}</th> --}}
        <td>{{$order->orderNum}}</td>
        <td>{{$order->requiredDate}}</td>
        <td>{{$order->orderDate}}</td>
        <td>{{$order->subtotal}}</td>
        <td>


                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">{{$order->statu->state}}</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route("editorder1",$order->id)}}">new</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('editorder2',$order->id)}}">shipping</a></li>
                  </ul>
                </div>

        </td>
        {{$order->statu->state}}
        {{-- <td>{{$order->created_at}}</td> --}}
        <td>

            {{-- <h1>
                <a class="btn btn-success" href="{{url("showorder/$order->id")}}" >{{__("Show")}}</a>
            </h1> --}}
            <form action="{{route("deleteorder",$order->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{__("message.delete")}}</button>
            </form>
        </td>
    </tr>
{{-- ============================================================================================ --}}
    </tbody>
</table>
<table class="table">
    <h1>Customer Details</h1>
    <thead>
      <tr>
        <th scope="col">{{__("Customer Name")}}</th>
        <th scope="col">{{__("Customer Email")}}</th>
        <th scope="col">{{__("Customer Id")}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$order->user->name}}</td>
        <td>{{$order->user->email}}</td>
        <td>{{$order->user->id}}</td>

    </tr>
{{-- ============================================================================================ --}}
    </tbody>
</table>
<table class="table">

    <h1>Order Details</h1>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__("Product Name")}}</th>
        <th scope="col">{{__("Price")}}</th>
        <th scope="col">{{__("Quantity")}}</th>
        <th scope="col">{{__("Total")}}</th>
        <th scope="col">{{__("Category")}}</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($orderdetails as $orderdetail )

      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$orderdetail->product->name}}</td>
        <td>{{$orderdetail->unitPrice}}</td>
        <td>{{$orderdetail->quantityOrdered}}</td>
        <td>{{$orderdetail->totalPrice}}</td>
        <td>{{$orderdetail->product->category->title}}</td>

    </tr>
    @endforeach

    </tbody>
</table>
<table class="table">

    <h1>Order History</h1>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Order Number</th>
        <th scope="col">State</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($orderhistory as $orderhistoryvalue )

      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$orderhistoryvalue->order->orderNum }}</td>
        <td>{{$orderhistoryvalue->statu->state }}</td>
        <td>{{$orderhistoryvalue->created_at }}</td>

    </tr>
    @endforeach

    </tbody>
</table>
{{-- {{$orders->links()}} --}}
@endsection