<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('layouts.frontend.partials.head')
</head>
<body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<!-- top bar -->
@include('layouts.frontend.partials.topbar')

<!-- navbar -->
@include('layouts.frontend.partials.navbar')

@yield('content')

<!-- footer -->
@include('layouts.frontend.partials.footer')

<!-- js files -->
@include('layouts.frontend.partials.scripts')
</body>
</html>
