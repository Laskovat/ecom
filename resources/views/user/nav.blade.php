    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="{{url("showall")}}"><h2>Sixteen <em>Clothing</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth

                    @if (session()->has('cart'))
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="{{url("myCart")}}">Cart
                        </a>
                    </li>
                    @endif
                    @endauth

                    @if (session()->has('wishlist'))
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="{{url("myWishList")}}">WishList
                        </a>
                    </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url("showall")}}">{{__("message.home")}}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                      <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url("usersearch")}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="search" placeholder="{{__("message.search products")}}">
                      </form>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="{{url("change/en")}}">
                            English
                        </a>
                  </li>
                  <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="{{url("change/ar")}}">
                      العربية
                    </a>
                  </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                  <a class="nav-link" href="{{url("change/cz")}}">
                    čeština
                  </a>
                </li>
                @auth

                <li class="nav-item">
                    <a class="nav-link" href="{{url("dashboard")}}">{{__("message.profile")}}</a>
                </li>
                @endauth
                @guest

                <li class="nav-item">
                    <a class="nav-link" href="{{url("dashboard")}}">Login</a>
                </li>
                @endguest
              </ul>
            </div>
          </div>

        </nav>
      </header>

      <!-- Page Content -->