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



                                                    <li class="active"><a href="#my-orders" data-toggle="tab"><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>


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
                                            <div class="tab-pane fade in active" id="my-orders">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline">MY ORDERS</h4>

                                                    @foreach($orders as $order)
                                                        <div class="order-list">
                                                        <div class="order-item brd-rd5">

                                                            <div class="order-info">

                                                                <h4 itemprop="headline"><a href="javascript:void(0)" title="" itemprop="url">#{{ $order->id }}</a></h4>

                                                                <span class="price">€{{ $order->grand_total }}</span>

                                                                @if( $order->order_status == 'Cancelled')
                                                                <span class="processing brd-rd3" style="color: red">
                                                                    {{ $order->order_status }}
                                                                </span>
                                                                @else
                                                                 <span class="processing brd-rd3" >
                                                                    {{ $order->order_status }}
                                                                </span>
                                                                @endif
                                                                <a class="brd-rd2" href="{{ route('order.details', $order->id) }}" title="" itemprop="url">Order Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

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
