@extends('layouts.backend.app')

@section('title', 'Add Product')

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
                            <h3 class="float-left">Add Product</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.view.product') }}"><i class="fa fa-list-alt"></i> Product List</a></p>
                        </div>
                        <div class="card-body">
                            <div id="loader"  style="width:100px; margin:0 auto; display: none">
                                <img width="120px" src="{{ asset('public/backend/upload/tenor.gif') }}">
                            </div>

                            <form id="quickForm" action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Product Name</label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Product Name">
                                                <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Product Description</label>
                                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" rows="3" spellcheck="false">{{ old('description') }}</textarea>
                                                <span style="color:red">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Regular Price</label>
                                                <input type="text" name="regular_price" id="regular_price" value="{{ old('regular_price') }}" class="form-control" placeholder="200">
                                                <span style="color:red">{{ $errors->has('regular_price') ? $errors->first('regular_price') : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Offer Price</label>
                                                <input type="text" name="offer_price" id="offer_price" value="{{ old('offer_price') }}" class="form-control" placeholder="200">
                                                <span style="color:red">{{ $errors->has('offer_price') ? $errors->first('offer_price') : '' }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" class="form-control dropify" data-max-file-size="5M" id="image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group col-md-12">
                                                <label for="category_id">Root Category</label>
                                                <select name="category_id" id="category_id" class="form-control select2bs4">
                                                    <option value="">Select Root Category</option>
                                                    @foreach($root_categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="subcategory_id ">Sub Category</label>
                                                <select name="subcategory_id" id="subcategory_id" class="form-control select2bs4" style="width: 100%;">
                                                    <option value="">Select </option>

                                                </select>
                                                <span style="color:red">{{ $errors->has('subcategory_id ') ? $errors->first('subcategory_id ') : '' }}</span>
                                            </div>

                                            <div class="form-group col-md-10">
                                                <button type="submit"  class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
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
       $(document).ready(function () {

           //add subcategory
           $("#category_id").on('change', function () {
               var category_id = $(this).val();
               $.ajax({
                   url : "{{ route('admin.get_subcategory.product') }}",
                   type : 'get',
                   data : {category_id:category_id},

                   beforeSend: function() {
                       $('#loader').show();
                   },

                   success:function (res) {
                       var html = '<option value="">Select</option>';
                       $.each(res, function (key, v) {
                           html +='<option value="'+v.id+'">'+v.name+'</option>';
                       });
                       $('#subcategory_id').html(html);
                       $('#loader').hide();
                   }
               });
           });

            $('#quickForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },

                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    regular_price: {
                        required: true,
                        number: true
                    },
                    offer_price: {
                        required: true,
                        number: true
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

