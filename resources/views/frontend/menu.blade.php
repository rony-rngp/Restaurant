@extends('layouts.frontend.app')

@section('title')
    Menu
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
                        <h1 itemprop="headline">Menu Items</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>



{{--    <section>--}}
{{--        <div class="block no-padding overlape-45">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                        <div class="top-restaurants-wrapper">--}}
{{--                            <ul class="restaurants-wrapper style2">--}}
{{--                                @foreach($category->subcategories as $subcategory)--}}
{{--                                    <li class="wow bounceIn" data-wow-delay="0.2s">--}}
{{--                                        <div class="top-restaurant">--}}
{{--                                            <a class="brd-rd50" href="{{ route('sub_category.wise', [$subcategory->id, $subcategory->slug]) }}" title="{{ $subcategory->name }}" itemprop="url">--}}
{{--                                                <img src="{{ url($subcategory->image) }}" alt="Entrées" itemprop="image">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
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
                                                        <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Menu</font></font></a></li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1-1">



                                                            <div class="dishes-list-wrapper">
                                                                <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Menus</font></font></span></h4>

                                                                <ul class="dishes-list">
                                                                    @forelse($menus as $menu)
                                                                    <li class="wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                                                        <div class="featured-restaurant-box">
                                                                            <div class="featured-restaurant-thumb">
                                                                                <a href="#" title="" itemprop="url">
                                                                                    <img src="{{ $menu->image }}" alt="dish-img1-1.jpg" itemprop="image"></a>
                                                                            </div>
                                                                            <div class="featured-restaurant-info">
                                                                                <h4 itemprop="headline"><a href="#" title="" itemprop="url"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $menu->name }}</font></font></a></h4>
                                                                                <span class="price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ {{ $menu->price }}</font></font></span>
                                                                                <p itemprop="description"></p><h5 class="pagetitle" style="box-sizing: inherit; margin: 1.2rem 0px 0.5rem; font-weight: 700; line-height: 36px; font-size: 22px; letter-spacing: normal; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-family: Roboto; text-transform: uppercase; color: rgb(255, 255, 255); text-align: center; background-color: rgb(95, 27, 27);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $menu->description }}</font></font></h5><p></p>
                                                                                <ul class="post-meta">

                                                                                </ul>
                                                                            </div>
                                                                            <div class="ord-btn">

                                                                                <a class="brd-rd5 orderNowButton" data-id="{{ $menu->id }}" href="javascript:void(0)" id="orderNowButton" title="Order Online"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add </font></font></a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    @empty

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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="all_item_list"></div>
    </div>


@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(".orderNowButton").on('click', function () {
                var setmenu_id = $(this).attr('data-id');
                $(this).attr('disabled',true);
                $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing');

                $.ajax({
                    url:"{{ route('menu.item') }}",
                    type: 'post',
                    data : {setmenu_id:setmenu_id , "_token": "{{ csrf_token() }}"},

                    success:function (response) {
                        $('#myModal').modal('show');
                        $(".all_item_list").html(response);

                        $(".orderNowButton").attr('disabled',false);
                        $(".orderNowButton").html('Add ');



                        }
                });


            });
        });


    </script>
@endpush
