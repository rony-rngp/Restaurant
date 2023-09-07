@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')

@endpush

@section('content')
    @include('layouts.frontend.partial.slider')

    <section>
        <br>

        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="top-restaurants-wrapper">
                <ul class="restaurants-wrapper style2">
                    <!-- Set Menu -->
                    <li class="wow bounceIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;">
                        <div class="top-restaurant">
                            <a class="brd-rd50" href="{{ route('menu') }}" title="Menus" itemprop="url">
                                <img src="{{ asset('public/backend/upload/menus.png') }}" alt="Entrances" itemprop="image">
                            </a>
                        </div>
                    </li>
                    <!-- End Menu -->

                    @foreach($categories as $category)
                    <li class="wow bounceIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;">
                        <div class="top-restaurant">
                            <a class="brd-rd50" href="{{ route('category.wise', [$category->id, $category->slug]) }}" title="{{ $category->name }}" itemprop="url">
                                <img src="{{ url($category->image) }}" alt="Entrances" itemprop="image">
                            </a>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </section>


    <section>
        <div class="block remove-bottom">
            <div class="container" >
                <div class="module-heading" style="background: #0d95e8; margin-top: -50px">
                    <h4 style="padding: 10px; color: white">Latest Product ( 8 )</h4>
                </div><!-- /.module-heading --><br>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3" style="border: 1px solid rgb(243,243,243); margin-top: 5px; max-height: 500px">
                                <div class="thumb-wrapper text-center">
                                    <div class="img-box">
                                        <img height="261" width="261" src="{{ url($product->image) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content text-center">
                                        <h4>{{ Str::limit($product->name, 25) }}</h4>
                                        <p class="item-price">
                                            @if($product->regular_price > $product->offer_price )
                                            <strike>${{ $product->regular_price }}</strike>

                                             <span>${{ $product->offer_price }}</span>
                                            @else
                                            <span>${{ $product->regular_price }}</span>
                                            @endif
                                        </p><br>

                                        <button style="margin-bottom: 10px" data-id="{{ $product->id }}" class="btn btn-primary addCart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- welcome section -->


    <section style="margin-bottom: 20px; margin-top: 20px;">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.0781705534155!2d-0.5728767846370957!3d44.840341382873795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5527d1d2e89bc5%3A0xa19bbc5e8dbefa7d!2sRestaurant%20Indien%20le%20Rajwal%20Bordeaux!5e0!3m2!1sen!2s!4v1614621668980!5m2!1sen!2s" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>




    <!-- -------------------------------------------------------------------------------------------------- -->






@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $('#exampleModal').show();


            $(".addCart").on('click', function () {
                 var id = $(this).attr('data-id');
                $(this).attr('disabled',true);
                $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing');

                 $.ajax({
                     url:"{{ route('add.cart') }}",
                     type: 'post',
                     data : {id:id, "_token": "{{ csrf_token() }}"
                  },

                success:function (res) {
                         if (res.messege != "") {

                             $(".totalCartItems").text('('+res.totalCartItems+')');
                             $(".addCart").attr('disabled',false);
                             $(".addCart").html(' Add to Cart');

                             if (res.status == true) {
                                 iziToast.success({
                                     title: 'Success',
                                     position: 'topRight',
                                     message: res.message
                                 });
                             } else {
                                 iziToast.error({
                                     title: 'Error',
                                     position: 'topRight',
                                     message: res.message
                                 });
                             }
                         }
                     }
                 });
            });
        });


    </script>
@endpush
