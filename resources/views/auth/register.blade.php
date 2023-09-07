@extends('layouts.frontend.app')

@section('title')
    Register
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
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Register</a></li>

            </ol>
        </div>
    </div>

    <section>
        <div class="block top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="login-register-wrapper">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-lg-6">
                                    <div class="sign-popup-wrapper brd-rd5">
                                        <div class="sign-popup-inner brd-rd5">

                                            <div class="sign-popup-title text-center">
                                                <h4 itemprop="headline">Register</h4>
                                            </div>


                                            <form class="sign-form" action="{{ route('user.register') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                                        <input id="name" type="text" class="brd-rd3 " name="name" value="{{ old('name') }}" required="" autocomplete="name" placeholder="Enter Name">
                                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                                        <input id="phone" type="text" class="brd-rd3 " name="phone" value="{{ old('phone') }}" required="" autocomplete="phone" placeholder="Enter Number">
                                                        <span style="color:red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                                        <input id="email" type="email" class="brd-rd3 " name="email" value="{{ old('email') }}" required="" autocomplete="email" placeholder="Enter E-Mail">
                                                        <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                                                        <input id="password" type="password" class="brd-rd3 " name="password" required="" autocomplete="new-password" placeholder="Enter Password" aria-autocomplete="list">
                                                        <span style="color:red">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <button class="red-bg brd-rd3" type="submit">Register</button>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <a class="sign-btn" href="{{ route('login') }}" title="" itemprop="url">Login</a>

                                                    </div>
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
    </section>



@endsection

@push('js')
    <script>


    </script>
@endpush
