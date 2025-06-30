@extends('layouts.frontend.master')
@section('content')
    <!-- header slider -->
@include('frontend.home.partials.slider')

    <!-- who we are -->
@include('frontend.home.partials.who-we-are')

    <!-- why sahoo -->
@include('frontend.home.partials.why-sahoo')

    <!-- our metal -->
@include('frontend.home.partials.our-metal')

    <!-- our special products -->
@include('frontend.home.partials.our-special-products')

    <!-- quality -->
@include('frontend.home.partials.quality')

    <!-- trust -->
@include('frontend.home.partials.trust')

    <!-- reviews -->
@include('frontend.home.partials.review')

    <!-- contact us -->
@include('frontend.home.partials.contact-us')

@endsection
