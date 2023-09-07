@extends('layouts.backend.app')

@section('title', 'Add Sub Category')

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
                            <h3 class="float-left">Add Sub Category</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.subcategory') }}"><i class="fa fa-list-alt"></i> Sub Category List</a></p>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.store.subcategory') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="category_id">Root Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2bs4">
                                            <option value="">Select Root Category</option>
                                            @foreach($root_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control dropify" data-max-file-size="5M" id="image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                        </div>
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
                    category_id: {
                        required: true,
                    },

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

