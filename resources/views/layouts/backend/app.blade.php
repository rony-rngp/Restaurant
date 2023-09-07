
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
{{--    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/jqvmap/jqvmap.min.css">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- izitoast -->
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- jQuery -->
    <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
    <style>
        .dropify-wrapper .dropify-message p{
            font-size: initial;
        }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.backend.partial.header')
    <!-- /.navbar -->

    @include('layouts.backend.partial.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.backend.partial.footer')

</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('public/backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
{{--<script src="{{ asset('public/backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="{{ asset('public/backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('public/backend') }}/dist/js/pages/dashboard.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend') }}/dist/js/demo.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- izitoast -->
<script src="{{ asset('public/js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')

<!-- DataTables -->
<script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!--sweetalert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function deleteData(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
</script>

<!-- dropify -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    $('.dropify').dropify();
</script>

<!-- Select2 -->
<script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result)
            };
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>

@stack('js')
</body>
</html>
