<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Invoice</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
            background-color: #000
        }

        .padding {
            padding: 2rem !important
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 20px
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium'
        }

        .text-dark {
            color: #3d405c !important
        }
    </style>
</head>
<body>


<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="{{ url('/') }}" data-abc="true">Lerajwal Restaurant</a>
            <div class="float-right">
                <h3 class="mb-0">Invoice #{{ $order->id }}</h3>
                Date: {{ date('Y-m-d', strtotime($order->created_at)) }}
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">Customer Info:</h5>
                    <h3 class="text-dark mb-1">{{ $order->user->name }}</h3>
                    <div>Email: {{ $order->user->email }}</div>
                    <div>Phone: {{ $order->user->phone }}</div>
                    @if( $order->delivery_type == 1)
                    <div>{{ $order->address .', '.$order->city.', '.$order->postal_code }}</div>
                    @endif
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">Basic Info:</h5>
                    <h3 class="text-dark mb-1">{{ $order->delivery_type == 1 ? 'In Delivery' : 'To take away' }}</h3>
                    <div>Order Received Date : {{ $order->order_date.' ; '.$order->order_time }}</div>
                    <div>Payment Method : {{ $order->payment_method }}</div>
                    @if( $order->payment_method == 'Stripe')
                        <div>Payment ID : {{ $order->transaction_id }}</div>
                    @endif
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Item Name</th>
                        <th class="right">Qty</th>
                        <th class="center">Items</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->order_products as $key => $product)
                    <tr>
                        <td class="center">{{ $key+1 }}</td>
                        <td class="left strong">{{ $product->name }}</td>
                        <td class="left">{{ $product->qty }}</td>
                        <td class="right">
                            @if($product->items)
                                {{ $product->items }}
                            @else
                                <i>Null</i>
                            @endif
                        </td>
                        <td class="center">€ {{ $product->qty * $product->price }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-5">
                </div>
                <div class="col-lg-5 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Shipping Charges</strong>
                            </td>
                            <td class="right">€ {{ $order->shipping_charges ? $order->shipping_charges : '0' }}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Coupon Discount</strong>
                            </td>
                            <td class="right">
                                @if($order->coupon_amount)
                                    - € {{ $order->coupon_amount }}
                                @else
                                    - € 0
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Grand Total</strong> </td>
                            <td class="right">
                                <strong class="text-dark">€ {{ $order->grand_total }}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
        </div>
    </div>
</div>



</body>
</html>
