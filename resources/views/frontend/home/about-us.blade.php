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
                <h2 class="fw-800 mb-4">{{ __('home.hero.title') }}</h2>
                <p class="fw-bold mb-4">{{ __('home.hero.subtitle') }}</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('projects.index') }}" class="white-btn">{{ __('home.hero.cta_see_projects') }}</a>
                    <a href="{{ route('contact-us') }}" class="white-border-btn">{{ __('home.hero.cta_contact') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="my-5">
        <h3 class="header text-center">{{ __('home.about.heading') }}</h3>
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 py-4">
                        <h5 class="title">{{ __('home.about.subheading') }}</h5>
                        <p>{{ __('home.about.paragraph1') }}</p>
                        <p>{{ __('home.about.paragraph2') }}</p>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <img src="{{ asset('assets/frontend/images/about.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- our foundation -->
    <div class="our-foundation text-center my-5">
        <div class="container">
            <h3 class="header">{{ __('home.foundation.heading') }}</h3>
            <div class="row my-4">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <img src="{{ asset('assets/frontend/images/telescope.svg') }}" />
                        <h5 class="title">{{ __('home.foundation.vision.title') }}</h5>
                        <p>{{ __('home.foundation.vision.description') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <img src="{{ asset('assets/frontend/images/target.svg') }}" />
                        <h5 class="title">{{ __('home.foundation.mission.title') }}</h5>
                        <p>{{ __('home.foundation.mission.description') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <img src="{{ asset('assets/frontend/images/diamond.svg') }}" />
                        <h5 class="title">{{ __('home.foundation.values.title') }}</h5>
                        <p>{{ __('home.foundation.values.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- why sahoo -->
    <div class="my-5">
        <h3 class="header text-center">{{ __('home.why.heading') }}</h3>
        <div class="why-sahoo">
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-5">
                        <h5 class="title">{{ __('home.why.subheading') }}</h5>
                        <p>{{ __('home.why.paragraph1') }}</p>
                        <p>{{ __('home.why.paragraph2') }}</p>
                        <p class="fw-800">{{ __('home.why.paragraph3') }}</p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="{{ route('contact-us') }}" class="main-btn">{{ __('home.why.cta_contact') }}</a>
                            <a href="{{ route('categories.index') }}" class="border-btn">{{ __('home.why.cta_view_categories') }}</a>
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
