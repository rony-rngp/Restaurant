<section>
    <div class="featured-restaurant-food text-center bottom-padd80">
        <div class="featured-restaurant-food-thumb">
            <ul class="featured-restaurant-food-img-carousel">
                @foreach($sliders as $slider)
                <li><img src="{{ file_exists($slider->image) ? url($slider->image) : '' }}" alt="{{ $slider->image }}" itemprop="url"> <a class="brd-rd50 vimeo"></a></li>
                @endforeach
            </ul>
            <ul class="featured-restaurant-food-thumb-carousel">
                @foreach($sliders as $slider)
                <li><img class="brd-rd3" src="{{ file_exists($slider->image) ? url($slider->image) : '' }}" alt="{{ $slider->image }}" itemprop="image"></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>


