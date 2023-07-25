<section id="best-seller-section" class="common-section best-seller-section d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid">
        <div class="common-col text-center" data-aos="fade-left" data-aos-delay="1000">
            <h2>Best SElling</h2>
        </div>
        <div class="position-relative h-100">
            <div class="slides-4 portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @if($category)
                    @foreach($category as $cate)
                    <div class="swiper-slide">
                        <div class="Post-img">
                            <div class="absulte-content Post-content">
                                <h3>{{ucwords($cate->name)}}</h3>
                            </div>
                            <img class="feature-img" alt="{{$cate->name}}" src="{{asset($cate->category_file)}}" data-aos="fade-left" data-aos-delay="500" />
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
