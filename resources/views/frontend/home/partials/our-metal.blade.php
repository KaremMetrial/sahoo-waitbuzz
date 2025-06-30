<div class="our-metal my-5">
    <div class="container">
        <h3 class="header">{{ __('our_metal_solutions') }}</h3>
        <div class="swiper swiper-products pb-4">
            <div class="swiper-wrapper">
                @foreach($categories as $category)
                    <div class="swiper-slide">
                        <a href="{{ route('categories.show',  $category->id) }}">
                            <div class="text-center">
                                <div class="image d-flex justify-content-center">
                                    <img src="{{ $category->file?->path ? Storage::url($category->file->path) : asset('images/placeholder.png') }}" alt="{{ $category->translate(app()->getLocale())->title ?? '' }}" />
                                </div>
                                <p>{{ $category->name ?? '' }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-products"></div>
            <div class="swiper-button-prev prev-product">
                <img src="{{ asset('assets/frontend/images/arrow-left.svg') }}" alt="">
            </div>
            <div class="swiper-button-next next-product">
                <img src="{{ asset('assets/frontend/images/arrow-left.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>
