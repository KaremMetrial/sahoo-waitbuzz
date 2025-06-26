<nav class="navbar navbar-expand-lg">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('assets/frontend/images/sahoo-logo.svg') }}" alt="logo" />
        </a>
        <button class="nav-toggler d-lg-none d-block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarItems" >
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarItems">
            <ul class="navbar-nav gap-3 me-auto mb-2 mb-lg-0">
                <li class="">
                    <form class="d-flex d-lg-none search-container m-0 mt-4" role="search">
                        <input class="form-control" type="search" placeholder="البحث عن منتج" aria-label="Search"/>
                        <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="search">
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/categories.html">
                        الأقسام
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/products.html">مكاتب حديد</a></li>
                        <li><a class="dropdown-item" href="/product.html">خزائن ملفات</a></li>
                        <li><a class="dropdown-item" href="/products.html">خزائن عدة</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/our-projects.html">أعمالنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us.html">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact-us.html">تواصل معنا</a>
                </li>
            </ul>
        </div>
        <form class="search-container m-0 d-none d-lg-flex" role="search">
            <input class="form-control" type="search" placeholder="البحث عن منتج" aria-label="Search"/>
            <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="search">
        </form>
    </div>
</nav>
