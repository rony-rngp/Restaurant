@extends('layouts.backend.app')

@section('title', 'Min and Max Amount')

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
                            <h3 class="float-left">Min and Max Amount</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.min_max') }}"><i class="fa fa-list-alt"></i> View Min and Max Amount</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.min_max', $min_max->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="min_amount">Minimum Amount</label>
                                        <input type="text" name="min_amount" id="min_amount" value="{{ $min_max->min_amount }}" class="form-control" placeholder="Min Amount">
                                        <span style="color:red">{{ $errors->has('min_amount') ? $errors->first('min_amount') : '' }}</span>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="max_amount">Maximum Amount</label>
                                        <input type="text" name="max_amount" id="max_amount" value="{{ $min_max->max_amount }}" class="form-control" placeholder="Maximum Amount">
                                        <span style="color:red">{{ $errors->has('max_amount') ? $errors->first('max_amount') : '' }}</span>

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
                    min_amount: {
                        required: true,
                        number : true
                    },
                    max_amount: {
                        required: true,
                        number : true
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

