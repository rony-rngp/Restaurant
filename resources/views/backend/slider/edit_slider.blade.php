@extends('layouts.backend.app')

@section('title', 'Edit Slider')

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
                            <h3 class="float-left">Edit Slider</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.slider') }}"><i class="fa fa-list-alt"></i> Slider List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.slider', $slider->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control dropify" data-default-file="{{ file_exists($slider->image) ? url($slider->image) : '' }}" data-max-file-size="5M" id="image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                        </div>
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
                    image: {
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

