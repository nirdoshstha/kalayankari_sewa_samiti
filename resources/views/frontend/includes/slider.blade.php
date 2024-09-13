 
        <div class="swiper-carousle">
            <div class="swiper mainSlider">
                <div class="swiper-wrapper">
                @forelse (sliders() as $slider )
                    <div class="swiper-slide">
                        <img src="{{asset('storage/'.$slider->image)}}" alt="">
                    </div> 
                    @empty  
                    <div class="swiper-slide">
                        <img src="{{asset('frontend/assets/image/2.jpeg')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('frontend/assets/image/3.jfif')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('frontend/assets/image/small-image2.png')}}" alt="">
                    </div> 
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> 
                @endforelse
                     
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
 