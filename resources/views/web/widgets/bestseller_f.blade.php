<section id="best-seller" class="best-seller d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid">
        <div class="common-col text-end" data-aos="fade-left" data-aos-delay="1000">
            <h2>WOMEN'S BEST SELLERS</h2>
            <p>It is a long established fact that a reader will distracted.</p>
            <a href="{{route('web.shop',['women'])}}" class="btn-get-started">Shop Now <img class="logo-img" src="{{asset('web/assets/img/favicon.png')}}" alt="" /></a>
        </div>
        <div class="position-relative h-100">
            <div class="slides-3 portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @if($products)
                    @foreach($products as $product)
                    <div class="swiper-slide">
                        <div class="Products-img">
                            <div class="absulte-content">
                                <ul>
                                    <li><img class="logo-img" src="{{asset($product->product_file)}}" alt="{{$product->name}}" data-aos="flip-left" data-aos-delay="1000" /></li>
                                    <li><img class="logo-img" src="{{asset($product->product_file)}}" alt="{{$product->name}}" data-aos="flip-left" data-aos-delay="1000" /></li>
                                </ul>
                            </div>
                            <img class="feature-img" src="{{asset($product->product_file)}}" alt="" data-aos="fade" data-aos-delay="1000" />
                            <span class="line line-top"></span>
                            <span class="line line-bottom"></span>
                            <span class="line line-left"></span>
                            <span class="line line-right"></span>
                        </div>
                        <div class="Products-content">
                            <h5 class="title">{{$product->name}}</h5>
                            <p class="availablity">2 Colours Available</p>
                            <p class="price">
                                <span class="regular">
                                    <div class="currency_sign">₤</div>
                                    <div class="currency_amount">{{$product->price}}</div>
                                </span>
                                <span class="sales"></span>
                            </p>
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
