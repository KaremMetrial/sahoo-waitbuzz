<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/all.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- our metal swiper -->
<script>
    const swiperProducts = new Swiper('.swiper-products', {
        slidesPerView: 8,
        slidesPerGroup: 1,
        spaceBetween: 20,
        // Pagination
        pagination: {
            el: '.swiper-pagination-products',
            clickable: true,
        },
        navigation: {
            nextEl: '.next-product',
            prevEl: '.prev-product',
        },
        loop: false,
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 6,
            },
            1200: {
                slidesPerView: 8,
            },
        }
    });
</script>

<!-- quality swiper -->
<script>
    const swiperQuality = new Swiper('.centered-swiper', {
        slidesPerView: 'auto',
        centeredSlides: true,
        loop: true,
    });
</script>

<!-- trust swiper -->
<script>
    const swiperCompanies = new Swiper('.swiper-companies', {
        slidesPerView: 8,
        slidesPerGroup: 1,
        spaceBetween: 20,
        // Pagination
        pagination: {
            el: '.swiper-pagination-companies',
            clickable: true,
        },
        loop: false,
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 5,
            },
            1024: {
                slidesPerView: 8,
            },
        }
    });
</script>

<!-- reviews swiper -->
<script>
    const swiperReviews = new Swiper('.swiper-reviews', {
        slidesPerView: 4,
        slidesPerGroup: 1,
        spaceBetween: 20,
        pagination: {
            el: '.reviews-swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.next-review',
            prevEl: '.prev-review',
        },
        loop: false,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            },
        }
    });
</script>
@stack('frontend-js')
