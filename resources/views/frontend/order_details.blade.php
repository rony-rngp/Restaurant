@extends('layouts.frontend.app')

@section('title')
    Account
@endsection

@push('css')
    <style>
        li{
            list-style-type: none;
        }
    </style>
@endpush

@section('content')


    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url(https://demo.lerajwal.com/assets/frontend/images/topbg.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">User Dashboard</h1>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">User Dashboard</a></li>

            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">

                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-lg-4">
                                        <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                            <div class="profile-sidebar-inner brd-rd5">
                                                <div class="user-info red-bg">
                                                    <img class="brd-rd50" src="{{ asset('public/frontend') }}/assets/frontend/images/resource/profile-thumb5.jpg" alt="user-avatar.jpg" itemprop="image">
                                                    <div class="user-info-inner">
                                                        <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ $user->name }}</a></h5>

                                                        <a class="brd-rd3 sign-out-btn yellow-bg" href="logout"
                                                           onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <i class="fa fa-sign-out"></i> SIGN OUT
                                                        </a>
                                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                                <ul class="nav nav-tabs">



                                                    <li ><a href="{{ route('account') }}" ><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>


                                                    <li>
                                                        <a href="logout"
                                                           onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <i class="fa fa-sign-out"></i>Log Out
                                                        </a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="new-orders">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline">ORDER INFo</h4>

                                                    <div class="order-list">
                                                        <div class="order-item order-details93 brd-rd5">
                                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">Order Info (€{{ $order->grand_total }})</a></h4>
                                                            <span class="post-rate yellow-bg brd-rd2">
                                                                {{ $order->order_status }}
                                                            </span>
                                                            <div class="review-info">
                                                                <div class="review-info-inner">
                                                                    <h5 itemprop="headline">From: Lerajwal Restaurant</h5>
                                                                    <i class="red-clr">17 Rue des Faussets Bordeaux 33000</i>
                                                                </div>
                                                            </div>
                                                            <div class="review-info">
                                                                <div class="review-info-inner">
                                                                    <h5 itemprop="headline">To: {{ $order->user->name }}</h5>
                                                                    @if($order->delivery_type == 1)
                                                                    <i class="red-clr">{{ $order->address }}, {{ $order->city }}, {{ $order->postal_code }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="booking-table">
                                                                <table>
                                                                    <thead>
                                                                    <tr><th>Order Items</th></tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($order->order_products as $product)
                                                                    <tr>

                                                                        <td>
                                                                            <h5 itemprop="headline">
                                                                                <a href="#" title="" itemprop="url">{{ $product->name }}</a> x {{ $product->qty }}
                                                                            </h5>
                                                                        </td>

                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <br>
                                                        </div>


                                                    </div>

                                                    <!-- Pagination Wrapper -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('js')
    <script>


    </script>
@endpush
