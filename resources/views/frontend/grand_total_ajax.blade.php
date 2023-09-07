<ul class="order-total">
    <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></span> <i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ {{ $total }}</font></font></i></li>
    <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shipping cost</font></font></span> <i id="deliveryFee"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ 0</font></font></i></li>
    <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Coupon</font></font></span> <i id="couponAmount"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">- € {{ Session::get('coupon_amount') ?  Session::get('coupon_amount') : '0'}}</font></font></i></li>
</ul>
<ul class="order-method brd-rd2 red-bg">
    <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></span> <span class="price" id="totalPrice"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
         <?php
               $total = $total - Session::get('coupon_amount');
         ?>

                <span id="full_total" total="{{ $total }}">€ {{ $total }}</span>
             <?php
                    Session::put('grand_total', $total);
             ?>

     </font></font></span></li>

    <li>
        <button type="submit" class="brd-rd2 btn btn-primary"  id="checkoutBtn" title="" itemprop="url"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> VALIDATE MY ORDER</font></font></button>
    </li>

</ul>
