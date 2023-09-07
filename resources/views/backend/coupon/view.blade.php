@extends('layouts.backend.app')

@section('title', 'Coupons List')

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
                            <h3 class="float-left">Coupon List ({{ $coupons->count() }})</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.add.coupon') }}"><i class="fa fa-plus-square"></i> Add Coupon</a></p>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Coupon Name</th>
                                    <th>Coupon Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($coupons as $key => $coupon)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td> {{ $coupon->type }}</td>
                                        <td>{{ $coupon->amount }}{{ $coupon->type == 'Percentage' ? '%' : '' }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="70" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $coupon->id }}"  {{ $coupon->status == 1 ? 'checked' : '' }}  >
                                        </td>
                                        <td>
                                            <!--Delete Data-->
                                            <button class="btn btn-sm btn-danger waves-effect" id="delete" type="button" onclick="deleteData({{ $coupon->id }})">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $coupon->id }}" action="{{ route('admin.destroy.coupon', $coupon->id) }}" method="post" style="display: none">
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
                url: "{{ route('admin.status.coupon') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush

