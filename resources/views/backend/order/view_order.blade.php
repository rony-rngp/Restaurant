@extends('layouts.backend.app')

@section('title', 'Order List')

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
                            <h3 class="float-left">Order List ({{ $orders->count() }})</h3>
                            <p class="float-right "><a class="btn btn-info btn-sm" href="{{ route('admin.add.category') }}"><i class="fa fa-plus-square"></i> Add Category</a></p>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>is Seen</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_date . ' ; ' . $order->order_time}}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td><p class="badge badge-info">{{ $order->order_status }}</p></td>
                                        <td>
                                            @if($order->is_seen == 0)
                                                <p class="badge badge-danger">Unseen</p>
                                            @elseif($order->is_seen == 1)
                                                <p class="badge badge-success">Seen</p>
                                            @endif
                                        </td>
                                        <td>€ {{ $order->grand_total }}</td>
                                        <td>

                                            <a href="{{ route('admin.order.details',$order->id ) }}" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i></a>

                                            <a href="{{ route('admin.order.print',$order->id ) }}" class="btn btn-sm btn-secondary"> <i class="fa fa-print"></i></a>

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

@endpush

