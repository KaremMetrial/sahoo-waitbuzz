<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.frontend.partials.head')
</head>
<body>

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
