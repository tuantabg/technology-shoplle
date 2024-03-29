<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueFromInformationTable('phone') }} </a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueFromInformationTable('email') }} </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group pull-right text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}"><img src="{{ asset('technology_shoplle/images/home/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li class="nav-item"><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li class="nav-item"><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @guest
                                <li class="nav-item btn-group">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> Account
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a>
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-lock"></i>{{ __('Register') }}</a>
                                        @endif
                                    </div>
                                </li>
                            @else
                                <li class="nav-item btn-group">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                    </a>

                                    <div class="nav-item dropdown-menu dropdown-menu-right">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <i class="fa fa-lock"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @include('client.page.home.components.main_menu')
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
