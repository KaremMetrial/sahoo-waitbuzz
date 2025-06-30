@extends('layouts.frontend.master')
@section('content')
    <!-- breadcrumb -->
    <nav style="--bs-breadcrumb-divider: ' > ';" aria-label="breadcrumb">
        <div class="container pt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('categories.index') }}">{{ __('categories.breadcrumb.index') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $category->name }}
                </li>
            </ol>
        </div>
    </nav>

    <!-- products -->
    <div class="products my-4">
        <div class="container">
            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('products.show', $product) }}">
                            <div class="card">
                                <img src="{{ Storage::url($product->file->path) }}" height="200" class="card-img-top">
                                <div class="card-body p-3">
                                    <p class="fw-800 mb-1">{{ $product->name }}</p>
                                    <p class="info">{{ $product->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
