<footer>
    <div class="block top-padd80 bottom-padd80 dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="footer-data">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">
                                    <div class="logo"><h1 itemprop="headline"><a href="#" title="Home" itemprop="url"><img src="{{ file_exists($logo->logo) ? url($logo->logo) : '' }}" itemprop="image"></a></h1></div>
                                    <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                    <div class="social2">
                                        <a class="brd-rd50" href="{{ $website_setting->facebook }}" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a class="brd-rd50" href="{{ $website_setting->google_plus }}" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a class="brd-rd50" href="{{ $website_setting->facetwitterbook }}" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a class="brd-rd50" href="#" title="Pinterest" itemprop="url" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                    <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i> {{ $website_setting->address }} </li>
                                        <li><i class="fa fa-phone"></i> {{ $website_setting->phone }} </li>
                                        <li><i class="fa fa-envelope"></i> <a href="#" title="" itemprop="url"><span class="__cf_email__">{{ $website_setting->email }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- Footer Data -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
<div class="bottom-bar dark-bg text-center">
    <div class="container">
        <p itemprop="description">&copy; 2021 <a class="red-clr" href="http://webinane.com/" title="Webinane" itemprop="url" target="_blank"></a>. All Rights Reserved</p>
    </div>
</div><!-- Bottom Bar -->
<!-- Newsletter Popup Wrapper -->
