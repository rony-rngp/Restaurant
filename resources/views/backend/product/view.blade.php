@extends('layouts.backend.app')

@section('title', 'Product List')

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
                            <h3 class="float-left">Product List ({{ $products->count() }})</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.add.product') }}"><i class="fa fa-plus-square"></i> Add Product</a></p>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Current Price</th>
                                    <th>Offer Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $key => $product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ isset($product->category->name) ? $product->category->name : ''}} {{ isset($product->subcategory->name) ? '-» '.$product->subcategory->name : '' }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->offer_price }}</td>
                                        <td><img width="60px" src="{{ file_exists($product->image) ? url($product->image) : asset('public/backend/upload/no_image.png') }}"></td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="70" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $product->id }}"  {{ $product->status == 1 ? 'checked' : '' }}  >
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.product',$product->id ) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                                            <!--Delete Data-->
                                            <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $product->id }})">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $product->id }}" action="{{ route('admin.destroy.product', $product->id) }}" method="post" style="display: none">
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

