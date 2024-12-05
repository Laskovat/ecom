@extends("user.layout")
@section("body")

<div class="latest-products">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="product-item">
                    <img src="{{asset("storage/$product->image")}}" alt="">
                    <div class="down-content">
                        <h4>{{$product->name}}</h4>
                        <h6>${{$product->price}}</h6>
                        <p>{{$product->desc}}</p><br>

                        {{-- <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (24)</span> --}}
                    </div>
                    <h6>category:{{$product->category->title}}</h6>
                    <h6>category description:{{$product->category->desc}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection