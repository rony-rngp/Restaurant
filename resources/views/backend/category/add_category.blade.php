@extends('layouts.backend.app')

@section('title', 'Add Category')

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
                            <h3 class="float-left">Add Category</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.category') }}"><i class="fa fa-list-alt"></i> Category List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.store.category') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="promo_image">Promo Image</label>
                                        <input type="file" name="promo_image" id="promo_image" class="form-control" accept="image/*">
                                        <span style="color:red">{{ $errors->has('promo_image') ? $errors->first('promo_image') : '' }}</span>
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
                        maxlength:30,
                    },
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

