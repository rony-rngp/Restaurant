<header class="stick">
    <div class="topbar">
        <div class="container">
            <div class="topbar-register">
                <a class="log-popup-btn" href="#" title="Login" itemprop="url">SE CONNECTER </a>
            </div>
            <div class="social1">
                <a href="{{ $website_setting->facebook }}" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="{{ $website_setting->twitter }}" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{ $website_setting->google_plus }}" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div><!-- Topbar -->
    <div class="logo-menu-sec" style="background: rgb(162,30,33)">
        <div class="container">
            <div class="logo"><h1 itemprop="headline"><a href="{{ url('/') }}" title="Home" itemprop="url"><img src="{{ file_exists($logo->logo) ? url($logo->logo) : '' }}" alt="logo.png" itemprop="image"></a></h1></div>
            <nav>
                <div class="menu-sec">
                    <ul>
                        <li class="menu-item-has-children"><a style="color: white" href="{{ url('/') }}" title="HOMEPAGES" itemprop="url"><span class="red-clr"></span>Home</a>
                        </li>
                        <li><a style="color: white" href="{{ route('reservations') }}" title="Reservations" itemprop="url"><span class="red-clr"></span>Reservations</a>
                        </li>
                        {{--<li><a style="color: white" href="#" title="CONTACT US" itemprop="url"><span class="red-clr"></span>About</a>
                        </li>--}}
                        <li><a style="color: white" href="{{ route('cart') }}" title="Cart" itemprop="url"><span class="red-clr"></span>Cart <p class="totalCartItems" style="color: white">({{ Cart::count() }})</p> </a>
                        </li>
                        <li><a style="color: white" href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" title="Coupon" itemprop="url"><span class="red-clr"></span>Coupons </a>
                        </li>
                    </ul>
                    @if(!Auth::check())
                    <a class="red-bg brd-rd4" href="{{ route('user.login') }}" title="Register" itemprop="url">Login </a>
                    @endif

                    @if(Auth::check())
                        <a style="margin-left:10px;"  class="yellow-bg brd-rd4" title="Logout" href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <a class="red-bg brd-rd4" href="{{ route('account') }}" title="Account" itemprop="url"><i class="fa fa-user"></i> {{ Auth::user()->email }}</a>
                    @endif
                </div>
            </nav><!-- Navigation -->
        </div>
    </div><!-- Logo Menu Section -->
</header>

<div class="responsive-header">
    <div class="responsive-logomenu">
        <div class="logo"><h1 itemprop="headline"><a href="{{ url('/') }}" title="Home" itemprop="url"><img src="{{ file_exists($logo->logo) ? url($logo->logo) : '' }}" alt="logo.png" itemprop="image"></a></h1></div>
        <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
    </div>
    <div class="responsive-menu">
        <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
        <div class="menu-lst">
            <ul>
                <li><a style="color: white" href="{{ url('/') }}" title="Home" itemprop="url"><span class="red-clr"></span>Home</a>
                </li>
                <li><a style="color: white" href="{{ route('reservations') }}" title="Reservations" itemprop="url"><span class="red-clr"></span>Reservations</a>
                </li>
                {{--<li><a style="color: white" href="#" title="About Us" itemprop="url"><span class="red-clr"></span>About</a>
                </li>--}}
                <li><a style="color: white" href="{{ route('cart') }}" title="Cart" itemprop="url"><span class="red-clr"></span>Cart <p class="totalCartItems" style="color: white">({{ Cart::count() }})</p> </a>
                </li>
                <li><a style="color: white" href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" title="Coupon" itemprop="url"><span class="red-clr"></span>Coupons </a>
                </li>
            </ul>
        </div>



        <div class="topbar-register">



        </div>
        <div class="register-btn">
            @if(!Auth::check())
                <a class="red-bg brd-rd4" href="{{ route('user.login') }}" title="Register" itemprop="url">Login </a>
            @endif

            @if(Auth::check())
                <a  class="yellow-bg brd-rd4" title="Logout" href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Log Out
                </a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                    <br>
                <a class="red-bg brd-rd4" href="{{ route('account') }}" title="Account" itemprop="url"><i class="fa fa-user"></i> {{ Auth::user()->email }}</a>
            @endif

        </div>
    </div><!-- Responsive Menu -->
</div><!-- Responsive Header -->

