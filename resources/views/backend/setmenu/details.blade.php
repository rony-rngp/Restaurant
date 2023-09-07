@extends('layouts.backend.app')

@section('title', 'Set Menu Details')

@push('css')

@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Set Menu Details ({{ $setmenu->name }})</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#details" id="exampleModal" href="javascript:void(0)"><i class="fa fa-plus-square"></i> Add Set Menu Category</a></p>
                        </div>
                        <div class="card-body">
                            @forelse($setmenu->setmenu_categories as $key => $setmenu_category)
                                <div class="shadow p-3 mb-5 bg-gray-light rounded">
                                    <h4>{{ $setmenu_category->name }} ({{ $setmenu_category->setmenu_products->count() }})</h4><br>
                                    <a href="{{ route('admin.view.setmenu.product',$setmenu_category->id ) }}"  class="btn btn-sm btn-success">View</a>
                                    <a href="javascript:void(0)" data-id="{{ $setmenu_category->id }}" data-toggle="modal" data-target="#setMenuProduct" id="exampleModal" class="btn btn-sm btn-primary setmenucategory_id">Add</a>
                                    <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $setmenu_category->id }})">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $setmenu_category->id }}" action="{{ route('admin.destroy.setmenu.category', $setmenu_category->id) }}" method="post" style="display: none">
                                        @csrf
                                        @method('post')
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Modal check details-->
    <div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Set Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.store.setmenu.category') }}" id="quickForm" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Set Menu Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <input type="hidden" name="setmenu_id" value="{{ $setmenu->id }}">
                                <div class="modal-footer">
                                    <button type="button" class="customModalHide btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SetMenu Product check details-->
    <div class="modal fade" id="setMenuProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Set Menu Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.store.setmenu.product') }}" method="post" id="SetMenuProduct" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Set Menu Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Set Menu Name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Set Menu Product Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*" placeholder="Enter Set Menu Name">
                                </div>

                                <input type="hidden" name="setmenu_id" value="{{ $setmenu->id }}">
                                <input type="hidden" name="setmenucategory_id" id="setmenucategory_id" value="">

                                <div class="modal-footer">
                                    <button type="button" class="customModalHide btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $('#quickForm').validate({
                rules: {
                    name: {
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

            $('#SetMenuProduct').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true
                    }

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

            $(document).on('click', '.setmenucategory_id', function () {
                var id = $(this).attr("data-id");
                $('#setmenucategory_id').val(id);

            });
        });
    </script>
@endpush

