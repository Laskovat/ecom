@extends("user.layout")
@section("body")

<div class="latest-products">
    <div class="container">
        <div class="row">

            @foreach ($wishlist as $id=>$product )
            <div class="col-md-4">

                <div class="product-item">
                    <img src="{{asset("storage/".$product['image'])}}" alt="">
                    <div class="down-content">
                        <h4>{{$product['name']}}</h4>
                        <h6>${{$product['price']}}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <form action="{{url("makeOrder")}}" method="post">
            @csrf
            <input type="time" name="requiredDate" id="">
            <button type="submit">Make Order</button>

        </form>
    </div>
</div>

@endsection