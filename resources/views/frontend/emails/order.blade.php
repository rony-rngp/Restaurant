<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .table  {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table tr  {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
<table width="100%">
    {{--<tr><td>&nbsp;</td></tr>
    <tr><td>Restaurant</td></tr>--}}
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello {{ $name }},</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thank you for order us. Your order details ar as bellow :- </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Delivery Type : {{ $order_details->delivery_type == 1 ? 'In Delivery' : 'To take away' }} </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order Received Date : {{ $order_details->order_date }} ; {{ $order_details->order_time }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Payment Method : {{ $order_details->payment_method }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order no: #{{ $order_details->id }} </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>

            <table class="table" style="width: 90%;text-align: center" cellpadding="5" cellspacing="5" bgcolor="white">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Items</th>
                    <th width="20%">Price</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order_details->order_products as $product)
                    <tr>
                        <td width="30%">{{ $product->name }}</td>
                        <td width="10%">{{ $product->qty}}</td>
                        <td>
                            @if($product->items)
                                {{ $product->items }}
                            @else
                                <i>Null</i>
                            @endif
                        </td>
                        <td width="16%">€ {{ $product->qty * $product->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right">Shipping Charges</td>
                    <td>€ {{ $order_details->shipping_charges ? $order_details->shipping_charges : '0' }}</td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Coupon Discount</td>
                    <td>
                        @if($order_details->coupon_amount)
                            - € {{ $order_details->coupon_amount }}
                        @else
                            - € 0
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Grand Total</td>
                    <td>€ {{ $order_details->grand_total }}</td>
                </tr>
                </tbody>
            </table>
        </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>
            @if($order_details->delivery_type == 1)
                <table class="table" cellpadding="5" cellspacing="5" bgcolor="white" width="60%">
                    <tr>
                        <td colspan="2"><strong>Delivery Address</strong></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $order_details->address }}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{ $order_details->city }}</td>
                    </tr>
                    <tr>
                        <td>Postal Code</td>
                        <td>{{ $order_details->postal_code }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>{{ $order_details->user->phone }}</td>
                    </tr>
                </table>
            @endif

        </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>For any enquiries, you can contact us at <a href="mailto:rony.rngp@gmail.com">rony.rngp@gmail.com</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Regards,<br> Team Restaurant</td></tr>
    <tr><td>&nbsp;</td></tr>
</table>
</body>
</html>

