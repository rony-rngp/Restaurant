@extends('layouts.frontend.app')

@section('title')
    Cart
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
            <div class="fixed-bg" style="background-image: url({{ asset('public/frontend') }}/assets/frontend/images/topbg.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Cart Details</h1>
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
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Cart Details</a></li>

            </ol>
        </div>
    </div>

    <section>
        <div class="block gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="right wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                        <div class="order-inner gradient-brd">

                                            <h4 itemprop="headline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">My command</font></font></h4>
                                            <div class="order-list-wrapper">

                                                <ul class="order-list-inner">
                                                    <?php
                                                        $sl = 1;
                                                        $total = 0;
                                                    ?>
                                                    @forelse($contents as $content)
                                                    <li>
                                                        <div class="dish-name">
                                                            <i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $sl++ }}</font></font></i>
                                                            <h6 itemprop="headline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $content->name }} x {{ $content->qty }}</font></font></h6>
                                                            <span class="price">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ {{ $content->price *  $content->qty }}</font></font>
                                                                <a class="btn btn-danger removeBtn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('destroy.cart.item', $content->rowId) }}" ><i class="fa fa-trash"></i> </a>
                                                            </span>
                                                        </div>

                                                        <div class="dish-ingredients">
                                                            @if($content->options->items != null)
                                                            <div class="dish-ingredients">
                                                                <?php
                                                                  $items = explode(',', $content->options->items)
                                                                ?>
                                                                @foreach($items as $item)
                                                                   <span class="check-box"><input type="checkbox" id="checkbox1-1">
                                                                      <label for="checkbox1-1"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                          {{ $item }}</font></font></span>
                                                                        </label>
                                                                   </span>
                                                                @endforeach
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </li>
                                                     <?php
                                                            $total +=  $content->price *  $content->qty;
                                                     ?>
                                                    @empty
                                                        <h4 style="text-align: center; background: #DC3545; padding: 10px; color: white">Your cart is empty.You need to shopping first...</h4>
                                                    @endforelse

                                                </ul>

                                                <form id="quickForm" action="{{ route('place.order') }}" class="restaurant-info-form brd-rd5" method="post">
                                                    @csrf
                                                    <div class="row mrg20">
                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <h5 itemprop="headline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Payment method</font></font></h5>
                                                        </div>
                                                        <div class="pay-mnt">
                                                            @foreach($payment_methods as $payment_method)
                                                            <span class="radio-box">
                                                                <input type="radio" name="payment_method" id="{{ $payment_method->id }}" value="{{ $payment_method->name }}" checked="">
                                                                <label for="{{ $payment_method->id }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $payment_method->name }}</font></font></label>
                                                                @if($payment_method->name == 'CB')
                                                                    <img src="{{ asset('public/frontend') }}/assets/frontend/images/cb.jpg">
                                                                @endif
                                                            </span>
                                                            @endforeach

                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-lg-12" style="margin-top:25px;">
                                                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Order Type </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                            <div class="select-wrp">
                                                                <select id="delivery_type" name="delivery_type" total="{{ $total }}" coupon_amount="{{ Session::get('coupon_amount') }}" shipping_charges="{{ $shipping_charges->shipping_charges }}">
                                                                    <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">In delivery</font></font></option>
                                                                    <option value="2" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">To take away</font></font></option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="row" id="addressdiv" style="display: none;">
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Complete Address </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                                <input class="brd-rd3" id="address" name="address" type="text">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">City </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                                <input class="brd-rd3" id="city" name="city" type="text">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Postal Code </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                                <input class="brd-rd3" id="postal_code" name="postal_code" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-lg-12 couponSection">
                                                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">COUPON </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                            <div class="row">
                                                                <div class="col-sm-11 col-xs-8">
                                                                    <input id="couponInput" class="brd-rd3" value="{{ @Session::get('coupon_code') }}" name="coupon" type="text">
                                                                </div>
                                                                <div class="col-sm-1 col-xs-4">
                                                                    <a id="verifyCoupon" style="margin-left:-20px;margin-top:8px;" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check</font></font></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>
                                                                <input type="text" autocomplete="off" class="brd-rd3" id="myDatepicker" name="order_date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Time </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></sup></label>

                                                                <div class="select-wrp">
                                                                    <select required="" id="order_time" name="order_time">
                                                                        @foreach($order_times as $order_time)
                                                                            <option value="{{ $order_time->name }}">{{ $order_time->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Comments (Optional)</font></font><sup><font style="vertical-align: inherit;"></font></sup></label>
                                                            <input class="brd-rd3" name="comments" id="comments" type="text">
                                                        </div>
                                                    </div>



                                                    <div id="geand_total">
                                                        <ul class="order-total">
                                                            <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></span> <i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ {{ $total }}</font></font></i></li>
                                                            <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shipping cost</font></font></span> <i id="deliveryFee"><font style="vertical-align: inherit;">€ <font style="vertical-align: inherit;" class="shipping_charges"> 0</font></font></i></li>
                                                            <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Coupon</font></font></span> <i id="couponAmount"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">- € {{ Session::get('coupon_amount') ?  Session::get('coupon_amount') : '0'}}</font></font></i></li>
                                                        </ul>
                                                        <ul class="order-method brd-rd2 red-bg">
                                                            <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></span> <span class="price" id="totalPrice"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                <?php
                                                                    $total = $total - Session::get('coupon_amount');
                                                                ?>

                                                                   € <span class="grand_total" total="{{ $total }}"> {{ $total }}</span>

                                                                </font></font></span></li>

                                                            <li>
                                                                <button type="submit" class="brd-rd2 btn btn-primary"  id="checkoutBtn" title="" itemprop="url"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> VALIDATE MY ORDER</font></font></button>
                                                            </li>

                                                        </ul>

                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $("#delivery_type").on('change', function () {
                var delivery_type = $(this).val();
                if(delivery_type == 1) {
                    var shipping_charges = $(this).attr("shipping_charges");
                    var total = $(this).attr("total");
                    var coupon_amount = $(this).attr("coupon_amount");
                    if (coupon_amount == "") {
                        coupon_amount = 0;
                    }
                    var grand_total = parseInt(total) + parseInt(shipping_charges) - parseInt(coupon_amount);
                    $(".shipping_charges").html(shipping_charges);
                    $(".grand_total").html(grand_total);
                }else{
                    var total = $(this).attr("total");
                    var coupon_amount = $(this).attr("coupon_amount");
                    if (coupon_amount == "") {
                        coupon_amount = 0;
                    }
                    var shipping_charges = '0';
                    var grand_total = parseInt(total) - parseInt(coupon_amount);
                    $(".shipping_charges").html(shipping_charges);
                    $(".grand_total").html(grand_total);
                }

            });


            $("#verifyCoupon").on('click', function () {
                var coupon_code = $("#couponInput").val();
                if (coupon_code != ''){

                    $.ajax({
                        url:"{{ route('apply.coupon') }}",
                        type: 'post',
                        data : {coupon_code:coupon_code, "_token": "{{ csrf_token() }}"},

                        success:function (res) {

                            if(res.status == true){

                                alert(res.message)

                            }else{

                                alert(res.message)

                                $("#couponInput").val('')
                            }

                            window.location.href = "{{ url('/cart') }}";

                        }



                    });

                }else{
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: 'Coupon filed is required!!'
                    });

                }
            });


            $("#delivery_type").on('change', function () {
                var delivery_type = $(this).val();
                if(delivery_type == 1){
                    $("#addressdiv").show();
                }else{
                    $("#addressdiv").hide();
                    $("#address").val('');
                    $("#city").val('');
                    $("#postal_code").val('');
                }
            });
        });

        $('#myDatepicker').datepicker({
            'formatDate': 'Y-m-d H:i:s'
        });
        $('#myDatepicker2').datepicker({
            'formatDate': 'Y-m-d H:i:s'
        });

        $('#quickForm').validate({
            rules: {
                payment_method: {
                    required: true,
                },
                delivery_type: {
                    required: true,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                postal_code: {
                    required: true,
                },
                order_date: {
                    required: true,
                },
                order_time: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

    </script>
@endpush
