@extends('layouts.frontend.app')

@section('title')
    Reservations
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
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Reservations</a></li>

            </ol>
        </div>
    </div>


    <section>
        <div class="block top-padd30 gray-bg">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="reservation-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">

                                        <div class="reservation-tab-content">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="reservation-tab1">
                                                    <form action="{{ route('reservations.store') }}" class="restaurant-info-form brd-rd5" method="post">
                                                        @csrf
                                                        <h4 itemprop="headline">Table Reservation Form</h4>
                                                        <div class="row mrg20">
                                                            <div class="row" id="addressdiv">
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>Name <sup>*</sup></label>
                                                                    <input class="brd-rd3" name="name" type="text">
                                                                    <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>Phone <sup>*</sup></label>
                                                                    <input class="brd-rd3" name="number" type="text">
                                                                    <span style="color:red">{{ $errors->has('number') ? $errors->first('number') : '' }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>Email <sup>*</sup></label>
                                                                    <input class="brd-rd3" name="email" type="text">
                                                                    <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>No Of Persons <sup>*</sup></label>
                                                                    <input class="brd-rd3" name="numberOfGuest" type="text">
                                                                    <span style="color:red">{{ $errors->has('numberOfGuest') ? $errors->first('numberOfGuest') : '' }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>Order Date <sup>*</sup></label>
                                                                    <input type="text" autocomplete="off" class="brd-rd3" id="myDatepicker" name="date">
                                                                    <span style="color:red">{{ $errors->has('date') ? $errors->first('date') : '' }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <label>Order Time <sup>*</sup></label>
                                                                    <div class="select-wrp">
                                                                        <select required="" id="time" name="time">
                                                                            @foreach($order_times as $order_time)
                                                                                <option value="{{ $order_time->name }}">{{ $order_time->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span style="color:red">{{ $errors->has('time') ? $errors->first('time') : '' }}</span>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <label>Any Special Requirements <sup>*</sup></label>
                                                                <input class="brd-rd3" name="message" type="text">
                                                                <span style="color:red">{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
                                                            </div>


                                                        </div>
                                                        <div class="">
                                                            <button type="submit" class="red-bg brd-rd5" href="#" title="" itemprop="url" style="color: white;text-decoration: none;padding: 10px;">Submit Record</button>
                                                        </div>
                                                    </form>
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
    $('#myDatepicker').datepicker({
        'formatDate': 'Y-m-d H:i:s'
    });
    $('#myDatepicker2').datepicker({
        'formatDate': 'Y-m-d H:i:s'
    });
</script>
@endpush
