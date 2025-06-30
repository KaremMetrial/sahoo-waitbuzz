@if($sliders->isNotEmpty())
    <div id="headerSlider" class="carousel slide header-slider">
        <div class="carousel-indicators">
            @foreach($sliders as $index => $slider)
                <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="{{ $index }}"
                        @class(['active' => $index === 0])
                        @if($index === 0) aria-current="true" @endif
                        aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item @if($index === 0) active @endif py-5">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3 mb-md-0 ">
                                <h2 class="fw-bold mb-3">{{ $slider->title ?? 'نصنع الجودة بخبرة كويتية في عالم الأثاث الحديدي' }}</h2>
                                <p class="fw-bold">{{ $slider->descriptions ?? 'نقدم حلول أثاث معدني متكاملة للمكاتب، المنشآت الطبية، المستودعات، والمدارس.' }}</p>
                                <div class="mt-4 d-flex gap-3">
                                    <a class="main-btn" href="{{ $slider->btn_link ?? '/products.html' }}">شاهد المنتجات</a>
                                    <a class="border-btn" href="/contact-us.html">تواصل معنا</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0 ">
                                @if($slider->file?->path)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($slider->file->path) }}" alt="slider {{ $index + 1 }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-next" type="button" data-bs-target="#headerSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endif
