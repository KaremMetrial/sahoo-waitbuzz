<div class="reviews">
    <div class="container">
        <h3 class="header">{{ __('site.testimonials.title') }}</h3>
        <p class="section-p">{{ __('site.testimonials.description') }}</p>
        <div class="swiper swiper-reviews pb-4">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="{{ Storage::url($testimonial->file->path ?? '-') }}" alt="">
                                </div>
                                <div>
                                    <p class="name">{{ $testimonial->client_name }}</p>
                                    <p class="rate mt-1">
                                        <span>{{ $testimonial->rating }}/5</span>
                                        <span>
                                            @for ($i = 0; $i < 5; $i++)
                                                <img src="{{ asset('assets/frontend/images/Star.svg') }}" alt=""
                                                     @if($i >= $testimonial->rating) style="opacity:0.3;" @endif>
                                            @endfor
                                         </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">{{ $testimonial->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination reviews-swiper-pagination"></div>
            <div class="swiper-button-prev prev-review">
                <img src="{{ asset('assets/frontend/images/arrow-left.svg') }}" alt="">
            </div>
            <div class="swiper-button-next next-review">
                <img src="{{ asset('assets/frontend/images/arrow-left.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>
