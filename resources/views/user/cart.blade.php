@extends("user.layout")
@section("body")

<div class="latest-products">
    <div class="container">
        <div class="row">

            @foreach ($cart as $id=>$product )
            <div class="col-md-4">

                <div class="product-item">
                    <img src="{{asset("storage/".$product['image'])}}" alt="">
                    <div class="down-content">
                        <h4>{{$product['name']}}</h4>
                        <h6>${{$product['price']}}</h6>
                    </div>
                    <h6>quantity : {{$product['qty']}}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <form action="{{url("makeOrder")}}" method="post">
            @csrf
            <input type="date" name="requiredDate"  required>
            <button type="submit">Make Order</button>

        </form>
    </div>
</div>

@endsection