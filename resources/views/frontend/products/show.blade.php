@extends('layouts.frontend.master')
@section('content')
    <!-- breadcrumb -->
    <nav style="--bs-breadcrumb-divider: ' > ';" aria-label="breadcrumb">
        <div class="container pt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('categories.index') }}">{{ __('categories.breadcrumb.index') }}</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('categories.show', $product->category_id) }}">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
            </ol>
        </div>
    </nav>

    <!-- product -->
    <div class="product my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ $product->title }}</h4>
                    <p>{{ $product->short_description }}</p>
                    <p>
                        <span>{{ __('products.code') }}:</span>
                        <span>{{ $product->code }}</span>
                    </p>
                    @if ($product->description)
                        <div class="details my-3">
                            <h5>{{ __('products.description') }}</h5>
                            <div class="description-content">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    @endif
                    @if ($product->specifications)
                        <div class="details my-3">
                            <h5>{{ __('products.specifications') }}</h5>
                            <div class="specifications-content">
                                {!! $product->specifications !!}
                            </div>
                        </div>
                    @endif

                    @if ($product->features)
                        <div class="features my-3">
                            <h5>{{ __('products.features') }}</h5>
                            <div class="features-content">
                                {!! $product->features !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="mb-3">
                        <div class="swiper product-main">
                            <div class="swiper-wrapper">
                                @foreach ($product->files as $file)
                                    <div class="swiper-slide">
                                        <img src="{{ Storage::url($file->path) }}" alt="{{ $product->title }}"
                                            class="img-fluid" />
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Thumbnail Swiper -->
                        <div class="swiper product-thumbs">
                            <div class="swiper-wrapper  justify-content-center">
                                @foreach ($product->files as $file)
                                    <div class="swiper-slide" style="width: 100px"><img
                                            src="{{ Storage::url($file->path) }}" /></div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev prev-review">
                                <img src="{{ asset('assets/frontend/images/arrow-up-double-sharp.svg') }}" alt="">
                            </div>
                            <div class="swiper-button-next next-review">
                                <img src="{{ asset('assets/frontend/images/arrow-up-double-sharp.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <a href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp_number'] }}&text&type=phone_number&app_absent=0"
                        class="main-btn w-100 py-3 d-inline-block text-center text-decoration-none">
                        {{ __('products.request_quote') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- similar products -->
    <div class="similar-products my-5">
        <div class="container">
            <h4 class="mb-3">منتجات مشابة</h4>
            <div class="row">
                @foreach ($similarProducts as $similarProduct)
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('products.show', $similarProduct->id) }}">
                            <div class="card">
                                <img src="{{ Storage::url($similarProduct->files->first()->path ?? '-') }}"
                                    class="card-img-top">
                                <div class="card-body p-3">
                                    <p class="fw-800 mb-1">{{ $similarProduct->title }}</p>
                                    <p class="info">{{ $similarProduct->short_description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- why sahoo -->
    <div class="my-5">
        <h3 class="header text-center">{{ __('why_sahoo.heading') }}</h3>
        <div class="why-sahoo">
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-5">
                        <h5 class="title">{{ __('why_sahoo.title') }}</h5>
                        <p>{{ __('why_sahoo.paragraph1') }}</p>
                        <p>{{ __('why_sahoo.paragraph2') }}</p>
                        <p class="fw-800">{{ __('why_sahoo.highlight') }}</p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp_number'] }}&text&type=phone_number&app_absent=0"
                                class="main-btn">{{ __('why_sahoo.contact_now') }}</a>
                            <a href="{{ route('categories.index') }}"
                                class="border-btn">{{ __('why_sahoo.view_categories') }}</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="{{ asset('assets/frontend/images/image.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
