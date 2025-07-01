@extends('layouts.frontend.master')
@section('content')
    <!-- header -->
    <div class="categories-header">
        <div class="bg-image">
            <img src="{{ asset('assets/frontend/images/project-head.png') }}" alt="">
        </div>
    </div>

    <!-- project details -->
    <div class="project-details my-5">
        <div class="container">
            <h3 class="header">{{ __('project_details.title') }}</h3>
            <p class="section-p">{{ __('project_details.description') }}</p>
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <h5 class="fw-800 mb-3">{{ __('project_details.problem_title') }}</h5>
                        <p>{{ __('project_details.problem_text') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <h5 class="fw-800 mb-3">{{ __('project_details.solution_title') }}</h5>
                        <p>{{ __('project_details.solution_text') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card">
                        <h5 class="fw-800 mb-3">{{ __('project_details.info_title') }}</h5>
                        <ul class="d-grid gap-1">
                            <li>
                                <span>{{ __('project_details.work_hours') }}:</span>
                                <span>450 {{ __('project_details.hours') }}</span>
                            </li>
                            <li>
                                <span>{{ __('project_details.location') }}:</span>
                                <span>{{ __('project_details.location_value') }}</span>
                            </li>
                            <li>
                                <span>{{ __('project_details.materials') }}:</span>
                                <span>{{ __('project_details.materials_value') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- project image -->
    <div class="project-img">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0">
                    <div class="img mb-4">
                        <img src="{{ asset('assets/frontend/images/project-head.png') }}" alt="">
                    </div>
                    <div class="img">
                        <img src="{{ asset('assets/frontend/images/3 (2).png') }}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img">
                        <img src="{{ asset('assets/frontend/images/1 (2).png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="my-5">
        <div class="why-sahoo about-industry">
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-5">
                        <h5 class="title">{{ __('about_industry.title') }}</h5>
                        <p>{{ __('about_industry.paragraph1') }}</p>
                        <p>{{ __('about_industry.paragraph2') }}</p>
                        <p class="fw-800">{{ __('about_industry.paragraph3') }}</p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="/contact-us.html" class="main-btn">{{ __('about_industry.contact_team') }}</a>
                            <a href="#" class="border-btn">{{ __('about_industry.request_quote') }}</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/projects.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
