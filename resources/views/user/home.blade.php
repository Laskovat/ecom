@extends("user.layout")
@section("body")
@if (session()->has("error"))
<div class="alert alert-danger">
{{session()->get("error")}}
</div>
@endif
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>{{__('message.latest products')}}</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="product-item">
            <a href="{{url("showone/$product->id")}}">
                <img src="{{asset("storage/$product->image")}}" width="200" height="300"alt="">
            </a>
            {{-- @auth

            <form action="{{url("addToFav/$product->id")}}" method="post">
                @csrf
                <button type="submit" style="border:none ; background:none">
                    @if ($product->isfav())

                    <div class="fa fa-heart" style="color: rgba(253, 5, 42, 0.963)"></div>
                    @else
                    <div class="fa fa-heart" style="color: rgba(173, 157, 160, 0.963)"></div>

                    @endif
                </button>
            </form>
            @endauth --}}
            <div class="down-content">
              <a href="{{url("showone/$product->id")}}"><h4>{{$product->name}}</h4></a>
              <h6>${{$product->price}}</h6>
              <p>{{$product->desc}}</p>
              {{-- <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (24)</span> --}}
            </div>
            @auth

            <form action="{{url("addToCart/$product->id")}}" method="post">
                @csrf
                <input type="number" name="qty" min="1" required >
                <button type="submit" class="btn btn-success">Add To Cart</button>
            </form>
            @endauth
            @guest

            <form action="{{url("addToWishList/$product->id")}}" method="post">
                @csrf
                <button type="submit" class="btn btn-info">Add To Wish List</button>
            </form>
            @endguest

          </div>
        </div>
        @endforeach

    </div>
</div>
</div>
{{$products->links()}}

@endsection