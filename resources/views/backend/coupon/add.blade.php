@extends('layouts.backend.app')

@section('title', 'Add Coupon')

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
                            <h3 class="float-left">Add Coupon</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.coupon') }}"><i class="fa fa-list-alt"></i> Coupon List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.store.coupon') }}" method="POST">
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">Coupon Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="type">Coupon type</label>
                                        <select name="type" class="form-control" id="type">
                                            <option value="">Select</option>
                                            <option value="Percentage">Percentage</option>
                                            <option value="Amount">Amount</option>
                                        </select>
                                        <span style="color:red">{{ $errors->has('type') ? $errors->first('type') : '' }}</span>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" id="amount" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
                                        <span style="color:red">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-10">
                                        <button type="submit"  class="btn btn-primary">Submit</button>
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
                    type: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number: true
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

