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
                <h2 class="fw-800 mb-4">{{ __('categories.header.title') }}</h2>
                <p class="fw-bold mb-2">{{ __('categories.header.description') }}</p>
                <p class="fw-800 mb-5">{{ __('categories.header.more_info') }}</p>
                <a href="/contact-us.html" class="white-btn">{{ __('categories.header.contact_us') }}</a>
            </div>
        </div>
    </div>

    <!-- categories -->
    <div class="categories my-4">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('categories.show', $category) }}">
                            <div class="card">
                                <img src="{{ Storage::url($category->file->path) }}" height="250" width="200" class="card-img-top">
                                <div class="card-body text-center p-3">
                                    <p>{{ $category->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
