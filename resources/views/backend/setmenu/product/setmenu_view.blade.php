@extends('layouts.backend.app')

@section('title', 'Set Menu Product List')

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
                            <h3 class="float-left">Set Menu Product List ({{ $setmenu_category->name }})</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($setmenu_category->setmenu_products as $key => $setmenu_product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $setmenu_product->name }}</td>
                                        <td><img width="60px" src="{{ file_exists($setmenu_product->image) ? url($setmenu_product->image) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td>
                                            <!--Delete Data-->
                                            <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $setmenu_product->id }})">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $setmenu_product->id }}" action="{{ route('admin.destroy.setmenu.product', $setmenu_product->id) }}" method="post" style="display: none">
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

@endsection

@push('js')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }

            $.ajax({
                url: "{{ route('admin.status.product') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush

