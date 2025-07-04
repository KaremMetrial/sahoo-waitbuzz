<nav class="navbar navbar-expand-lg">
    <div class="container justify-content-between {{ app()->getLocale() === 'en' ? 'flex-row-reverse' : '' }}">
        <a class="navbar-brand" href="{{  route('home') }}">
            <img src="{{ Storage::url($settings['logo']) }}" alt="logo"/>
        </a>
        <button class="nav-toggler d-lg-none d-block" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarItems">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarItems">
            <ul class="navbar-nav gap-3 me-auto mb-2 mb-lg-0">
                <li>
                    <form class="d-flex d-lg-none search-container m-0 mt-4" role="search" action="{{ route('products.index') }}" method="GET">
                        <input class="form-control" type="text" name="search" placeholder="{{ __('search_product') }}" aria-label="Search" value="{{ request('search') }}"/>
                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                            <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="search">
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">{{ __('home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') ?? '#' }}">
                        {{ __('categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @php
                            $categories = \App\Models\Category::active()->get();
                        @endphp
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.featured') ? 'active' : '' }}" href="{{  route('products.featured') }}">{{ __('our_works') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">{{ __('about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}" href="{{ route('contact-us') }}">{{ __('contact_us') }}</a>
                </li>
            </ul>
        </div>
        <form class="search-container m-0 d-none d-lg-flex" role="search" action="{{ route('products.index') }}" method="GET">
            <input class="form-control" type="text" name="search" placeholder="{{ __('search_product') }}" aria-label="Search" value="{{ request('search') }}"/>
            <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="search">
        </form>
    </div>
</nav>
