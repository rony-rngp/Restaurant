
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.lerajwal.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jun 2021 17:54:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>@yield('title') | {{ $website_setting->name }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ file_exists($logo->favicon) ? url($logo->favicon) : '' }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/main.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/red-color.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/yellow-color.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/responsive.css">
    <script src="{{ asset('public/frontend') }}/assets/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <!-- izitoast -->
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">

    <style>
        .title3, .title4{font-size: 20px;}
        /* . responsive-header{position: fixed;z-index: 100000;} */

    </style>

    @stack('css')

</head>
<body itemscope>
<main>


    @include('layouts.frontend.partial.header')


    @yield('content')


    @include('layouts.frontend.partial.footer')

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">The promo code is therefore at checkout
                        </h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->name }}</td>
                                    @if($coupon->type == 'Percentage')
                                        <td>{{ $coupon->amount .'%' }}</td>
                                    @else
                                        <td>{{ $coupon->amount }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>


                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


</main><!-- Main Wrapper -->

<script src="{{ asset('public/frontend') }}/assets/frontend/js/jquery.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/frontend/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/frontend/js/plugins.js"></script>
<script src="{{ asset('public/frontend') }}/assets/frontend/js/main.js"></script>
<!-- izitoast -->
<script src="{{ asset('public/js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')

<!-- jquery-validation -->
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>

@stack('js')

</body>

<!-- Mirrored from html.webinane.com/food-chow/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jan 2021 15:36:44 GMT -->

<!-- Mirrored from demo.lerajwal.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jun 2021 17:55:02 GMT -->
</html>
