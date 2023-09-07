@extends('layouts.frontend.app')

@section('title')
    Login
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
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Login</a></li>

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
                                                <h4 itemprop="headline">Login</h4>
                                            </div>


                                            <form class="sign-form" action="{{ route('user.login') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <input id="email" type="email" class="brd-rd3  is-invalid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus placeholder="Enter your e-mail">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <input id="password" type="password" class="brd-rd3 @error('password') is-invalid @enderror" name="password" required="" autocomplete="current-password" placeholder="Entrer Password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <button class="red-bg brd-rd3" type="submit">Login</button>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                        <a class="sign-btn" href="{{ route('register') }}" title="" itemprop="url">Register</a>

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
