@extends('layouts.frontend.master')
@section('content')
    <!-- header -->
    <div class="categories-header">
        <div class="bg-image">
            <img src="{{ asset('assets/frontend/images/header.png') }}" alt="">
        </div>
        <div class="blue-overlay"></div>
        <div class="overlay p-5">
            <div class="col-md-5">
                <h2 class="fw-800 mb-4">{{ __('projects.heading') }}</h2>
                <p class="fw-bold">{{ __('projects.paragraph1') }}</p>
                <p class="fw-bold mb-5">{{ __('projects.paragraph2') }}</p>
                <a href="" class="white-btn">{{ __('projects.request_custom_offer') }}</a>
            </div>
        </div>
    </div>

    <!-- our projects -->
    <div class="projects my-5">
        <div class="container">
            <h3 class="header">{{ __('featured_projects.heading') }}</h3>
            <p class="section-p">{{ __('featured_projects.description') }}</p>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 col-6 mb-4">
                    <a href="{{ route('products.show', $product) }}" class="project-card">
                        <img src="{{ Storage::url($product->files->first()->path) }}" alt="{{ $product->title }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="my-5">
        <div class="why-sahoo about-industry">
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-5">
                        <h5 class="title">نصنع الجودة… ونُتقن التفاصيل</h5>
                        <p>نحوّل الخامات إلى أنظمة تخزين، أثاث صناعي، وحلول هندسية تخدمك سنين.</p>
                        <p>كل مشروع يبدأ بفكرة — وننهيه بتفاصيل متقنة من التصميم للتنفيذ.من أول قياس، لآخر برغي — شغلنا
                            مدروس، وجودتنا ما تقبل التنازل.</p>
                        <p class="fw-800">لا تكتفي بالأثاث العادي — اختر المتانة التي تستحقها.</p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="/contact-us.html" class="main-btn">تواصل مع فريقنا</a>
                            <a href="#" class="border-btn">اطلب عرض مخصص</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="image">
                            <img src="images/projects.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
