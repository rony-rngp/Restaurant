@extends('layouts.backend.app')

@section('title', 'Set Menu List')

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
                            <h3 class="float-left">Set Menu List ({{ $setmenus->count() }})</h3>
                            <p class="float-right"><a href="javascript:void(0)" class="customModal btn btn-info btn-sm" data-toggle="modal" data-target="#details" id="exampleModal" ><i class="fa fa-plus-square"></i> Add Set Menu</a></p>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Image</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($setmenus as $key => $setmenu)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img width="60px" src="{{ file_exists($setmenu->image) ? url($setmenu->image) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td>
                                            Name : <b>{{ $setmenu->name }}</b> <br>
                                            Price : <b>{{ $setmenu->price }}</b> <br>
                                            Description : {{ \Illuminate\Support\Str::limit($setmenu->description, 70) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.details.setmenu',$setmenu->id ) }}" title="Details" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a>
                                            <!--Delete Data-->
                                            <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $setmenu->id }})">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $setmenu->id }}" action="{{ route('admin.destroy.setmenu', $setmenu->id) }}" method="post" style="display: none">
                                                @csrf
                                                @method('post')
                                            </form>
                                            <!--End Delete Data-->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                            <form action="{{ route('admin.store.setmenu') }}" id="quickForm" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Set Menu Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Set Menu Name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Set Menu Price</label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Set Menu Price">
                                </div>
                                <div class="form-group">
                                    <label for="description">Set Menu Description</label>
                                    <textarea name="description"  id="description" class="form-control" cols="30" rows="5" placeholder="enter Set Menu Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Set Menu Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*" placeholder="enter Set Menu Name">
                                </div>
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
                    price: {
                        required: true,
                        number: true,
                    },
                    description: {
                        required: true,
                    },
                    image: {
                        required: true,
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
        });
    </script>
@endpush

