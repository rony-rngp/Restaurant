@extends('layouts.frontend.app')

@section('title')
    {{ $subcategory->category->name }} -> {{ $subcategory->name }}
@endsection

@push('css')

@endpush

@section('content')


    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url('{{ asset('public/frontend') }}/assets/frontend/images/topbg.jpg');"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">All Items</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="block no-padding overlape-45">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="top-restaurants-wrapper">
                            <ul class="restaurants-wrapper style2">
                                <?php
                                $cat = \App\Model\Category::with('subcategories')->where('id', $subcategory->category->id)->firstOrFail();
                                ?>
                                @foreach($cat->subcategories as $subcat)
                                    <li class="wow bounceIn" data-wow-delay="0.2s">
                                        <div class="top-restaurant">
                                            <a class="brd-rd50" href="{{ route('sub_category.wise', [$subcat->id, $subcat->slug]) }}" title="{{ $subcat->name }}" itemprop="url">
                                                <img src="{{ url($subcat->image) }}" alt="Entrées" itemprop="image">
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories returents -->



    <section>
        <div class="block gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="restaurant-detail-wrapper">
                                            <div class="restaurant-detail-info">
                                                <div class="restaurant-detail-tabs">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Menu</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1-1">



                                                            <div class="dishes-list-wrapper">
                                                                <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">{{ $subcategory->category->name }} -> {{ $subcategory->name }}</span></h4>

                                                                <ul class="dishes-list">
                                                                    @forelse($subcategory->products as $product)
                                                                        <li class="wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                                                            <div class="featured-restaurant-box">
                                                                                <div class="featured-restaurant-thumb">
                                                                                    <a href="#" title="" itemprop="url">
                                                                                        <img src="{{ url($product->image) }}" alt="dish-img1-1.jpg" itemprop="image"></a>
                                                                                </div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">{{ $product->name }}</a></h4>
                                                                                    <span class="price">
                                                                                    €{{ $product->offer_price }}
                                                                                </span>
                                                                                    <p itemprop="description"></p><p>{{ $product->description }}<br></p><p></p>
                                                                                    <ul class="post-meta">

                                                                                    </ul>
                                                                                </div>
                                                                                <div class="ord-btn">

                                                                                    <a  data-id="{{ $product->id }}" class="brd-rd5 addCart" data-id="96" data-name="Mixed Grill" href="javascript:void(0)" title="Order Online"><i class="fa fa-cart-arrow-down"> </i> Add </a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @empty
                                                                        <div class="featured-restaurant-info">
                                                                            <h4>Sorry , Poduct not found :(</h4>
                                                                        </div>
                                                                    @endforelse
                                                                </ul>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(".addCart").on('click', function () {
                var id = $(this).attr('data-id');
                $(this).attr('disabled',true);
                $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing');

                $.ajax({
                    url:"{{ route('add.cart') }}",
                    type: 'post',
                    data : {id:id, "_token": "{{ csrf_token() }}"},

                    success:function (res) {
                        if (res.message != "") {

                            $(".totalCartItems").text('('+res.totalCartItems+')');
                            $(".addCart").attr('disabled',false);
                            $(".addCart").html('<i class="fa fa-cart-arrow-down"> </i> Add ');

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
