@extends('layouts.backend.app')

@section('title', 'Order Details')

@push('css')

@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Details</h4>
                        </div><hr style="margin: 0">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <tbody><tr>
                                        <td>Order ID</td>
                                        <td>#{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Date</td>
                                        <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Status</td>
                                        <td><span class="badge badge-warning">{{ $order->order_status }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>€ {{ $order->grand_total }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Delivery Total</td>
                                        <td> {{ $order->delivery_type == 1 ? 'In Delivery' : 'To take away' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charges</td>
                                        <td>€ {{ $order->shipping_charges }}</td>
                                    </tr>
                                    <tr>
                                        <td>Coupon Code</td>
                                        <td>
                                            <i>{{ $order->coupon_code ? $order->coupon_code : 'Null' }}</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Coupon Amount</td>
                                        <td>
                                            <i>€ {{ $order->coupon_amount ? $order->coupon_amount : 0 }}</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Payment Method</td>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>

                                    <!-- start Stripe tr-->
                                    @if($order->payment_method == 'Stripe')
                                    <tr>
                                        <td>Payment Status</td>
                                        <td>
                                            @if($order->payment_status == 'Complete')
                                                <span class="badge badge-success">{{ $order->payment_status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $order->payment_status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: 14px">Payment id</span></td>
                                        <td><span style="font-size: 14px">{{ $order->transaction_id }}</span></td>
                                    </tr>
                                    @endif
                                    <!--End Stripe tr-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if( $order->delivery_type == 1)
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Delivery Address</h4>
                        </div><hr style="margin: 0">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $order->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Postal Code</td>
                                        <td>{{ $order->postal_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer Info</h4>
                        </div><hr style="margin: 0">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <tbody><tr>
                                        <td>Customer Name</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer E-Mail</td>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Mobile</td>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="float-left">Update Order Status</h4>
                        </div>
                        <div class="card-body">
                            <table>
                                <tbody><tr>
                                    <td colspan="2">
                                        <form id="quickForms" action="{{ route('admin.order.status', $order->id) }}" method="post" style="display: flex" novalidate="novalidate">
                                            @csrf
                                            <select name="order_status" id="order_status" class="form-control" style="width: 128px;" required="">
                                                <option {{ $order->order_status == 'New' ? 'selected' : '' }} value="New">New</option>
                                                <option {{ $order->order_status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                                                <option {{ $order->order_status == 'Hold' ? 'selected' : '' }} value="Hold">Hold</option>
                                                <option {{ $order->order_status == 'Cancelled' ? 'selected' : '' }} value="Cancelled">Cancelled</option>
                                                <option {{ $order->order_status == 'In Process' ? 'selected' : '' }} value="In Process">In Process</option>
                                                <option {{ $order->order_status == 'Paid' ? 'selected' : '' }} value="Paid">Paid</option>
                                                <option {{ $order->order_status == 'Shipped' ? 'selected' : '' }} value="Shipped">Shipped</option>
                                                <option {{ $order->order_status == 'Delivered' ? 'selected' : '' }} value="Delivered">Delivered</option>
                                            </select> &nbsp;&nbsp;
                                            <button class="btn btn-sm btn-success" type="submit">Update</button>
                                        </form>
                                        <br>
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2">
                                        @foreach($order_logs as $log)
                                            <strong>{{ $log->order_status }}</strong><br>
                                            {{ date('d-M-Y, h:i:s', strtotime($log->created_at)) }}
                                            <hr>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Product Details</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Items</th>
                                    <th>Price</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($order->order_products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>
                                        @if($product->items)
                                            {{ $product->items }}
                                        @else
                                            <i>Null</i>
                                        @endif
                                    </td>
                                    <td>€ {{ $product->qty * $product->price }}</td>
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

