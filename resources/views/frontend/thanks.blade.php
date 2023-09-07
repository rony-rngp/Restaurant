@extends('layouts.frontend.app')

@section('title')
    Thanks
@endsection

@push('css')
    <style>
        li{
            list-style-type: none;
        }
    </style>
@endpush

@section('content')





    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Thanks</a></li>

            </ol>
        </div>
    </div>


    <div class="row single-product" style="background: white">
        <h3 align="center">Thanks..</h3>
        <hr>
        <div align="center">
            <h3>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY</h3>
            <b>Yor order number is #{{ Session::get('order_id') }} and total amount is € {{ Session::get('grand_total') }}</b>
        </div><br>

        <div class="clearfix"></div>
    </div><br><br>

    <?php
    Session::forget('order_id');
    Session::forget('grand_total');
    Session::forget('coupon_amount');
    Session::forget('coupon_code');
    Session::forget('shipping_charges');
    ?>



@endsection

@push('js')

@endpush
