@extends('layouts.backend.app')

@section('title', 'Website Setting')

@push('css')

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Website Setting</h3>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.website_setting', $website_setting->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $website_setting->name }}" class="form-control">
                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" value="{{ $website_setting->address }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="address" value="{{ $website_setting->phone }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email">E-Mail</label>
                                        <input type="email" name="email" id="email" value="{{ $website_setting->email }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" id="facebook" value="{{ $website_setting->facebook }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('facebook') ? $errors->first('facebook') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="google_plus">Google Plus</label>
                                        <input type="text" name="google_plus" id="google_plus" value="{{ $website_setting->google_plus }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('google_plus') ? $errors->first('google_plus') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter" value="{{ $website_setting->twitter }}" class="form-control" >
                                        <span style="color:red">{{ $errors->has('twitter') ? $errors->first('twitter') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-10">
                                        <button type="submit"  class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@push('js')
    <script>
        $(function () {
            $('#quickForm').validate({
                rules: {

                    name: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    facebook: {
                        required: true,
                    },
                    google_plus: {
                        required: true,
                    },
                    twitter: {
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
        });
    </script>
@endpush

