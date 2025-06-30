@extends('layouts.frontend.master')
@section('content')
    <!-- header slider -->
@include('frontend.home.partials.slider')

    <!-- who we are -->
@include('frontend.home.partials.who-we-are')
    <!-- why sahoo -->
    <div class="my-5">
        <h3 class="header text-center">لماذا السهو؟</h3>
        <div class="why-sahoo">
            <div class="container">
                <div class="row py-5 align-items-center">
                    <div class="col-md-5">
                        <h5 class="title">ريادة في تصنيع الأثاث المعدني وأنظمة التخزين</h5>
                        <p>في مصنع السهو، ندمج بين الخبرة الهندسية والدقة الصناعية لتقديم منتجات معدنية عالية الجودة، مصممة لتلبي متطلبات المكاتب، المنشآت الحكومية، والمستودعات.</p>
                        <p>نُركز على تقديم حلول متكاملة تبدأ من التصميم العملي مرورًا بالتصنيع الدقيق وصولًا إلى التسليم في الوقت المحدد، لنمنح عملاءنا ثقة لا تُضاهى في متانة كل منتج نقدمه.</p>
                        <p class="fw-800">لا تكتفي بالأثاث العادي — اختر المتانة التي تستحقها.</p>
                        <div class="mt-4 d-flex gap-3">
                            <a href="/contact-us.html" class="main-btn">تواصل معنا الأن</a>
                            <a href="/categories.html" class="border-btn">عرض الأقسام</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="images/image.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- our metal -->
    <div class="our-metal my-5">
        <div class="container">
            <h3 class="header">حلولنا المعدنية</h3>
            <div class="swiper swiper-products pb-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/products.html">
                            <div class="text-center">
                                <div class="image">
                                    <img src="images/product.png" />
                                </div>
                                <p>سراير طبية</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-products"></div>
                <div class="swiper-button-prev prev-product">
                    <img src="images/arrow-left.svg" alt="">
                </div>
                <div class="swiper-button-next next-product">
                    <img src="images/arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- our special products -->
    <div class="our-special-products my-5">
        <div class="container">
            <h3 class="header">منتجاتنا المميزة</h3>
            <p class="section-p">حلول معدنية مختارة بعناية لتناسب مختلف الاحتياجات. استكشف بعض من أبرز تصاميمنا:</p>
            <div class="row">
                <div class="col-4">
                    <a href="/product.html">
                        <img src="images/1.png" alt="">
                    </a>
                </div>
                <div class="col-4">
                    <a href="/product.html">
                        <img src="images/1.png" alt="">
                    </a>
                </div>
                <div class="col-4">
                    <a href="/product.html">
                        <img src="images/1.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- quality -->
    <div class="quality my-5">
        <div class="container">
            <h3 class="header">جودة تلمسها من قلب العمل.</h3>
            <p class="section-p">شاهد فيديوهات وصوراً حقيقية توثق مراحل التصنيع، بيئة العمل المتطورة، وخطوط الإنتاج الحديثة في مصنع السهو. هنا تجد التفاصيل التي تعكس التزامنا بالجودة والتميز.</p>
            <div class="swiper centered-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/quality.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/quality.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/quality.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/quality.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- trust -->
    <div class="trust my-5">
        <div class="container">
            <h3 class="header">ثقة كسبناها على مدار السنوات.</h3>
            <p class="section-p">نفخر بأن نقدم خدماتنا لجهات حكومية وشركات كبرى ومؤسسات رائدة داخل الكويت وخارجها.</p>
            <div class="swiper swiper-companies pb-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/swiper.png" />
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-companies"></div>
            </div>
        </div>
    </div>

    <!-- reviews -->
    <div class="reviews">
        <div class="container">
            <h3 class="header">ماذا قالوا عنا؟</h3>
            <p class="section-p">نفتخر بثقة عملائنا وشركائنا في السوق الكويتي، وهذه بعض كلماتهم بعد التعامل معنا:</p>
            <div class="swiper swiper-reviews pb-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="images/review.png" alt="">
                                </div>
                                <div>
                                    <p class="name">قسم المشاريع، وزارة الأشغال</p>
                                    <p class="rate mt-1">
                                        <span>5/5</span>
                                        <span>
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                      </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">جودة ممتازة، والتعامل راقٍ، والتوصيل في الوقت.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="images/review.png" alt="">
                                </div>
                                <div>
                                    <p class="name">قسم المشاريع، وزارة الأشغال</p>
                                    <p class="rate mt-1">
                                        <span>5/5</span>
                                        <span>
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                      </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">جودة ممتازة، والتعامل راقٍ، والتوصيل في الوقت.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="images/review.png" alt="">
                                </div>
                                <div>
                                    <p class="name">قسم المشاريع، وزارة الأشغال</p>
                                    <p class="rate mt-1">
                                        <span>5/5</span>
                                        <span>
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                      </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">جودة ممتازة، والتعامل راقٍ، والتوصيل في الوقت.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="images/review.png" alt="">
                                </div>
                                <div>
                                    <p class="name">قسم المشاريع، وزارة الأشغال</p>
                                    <p class="rate mt-1">
                                        <span>5/5</span>
                                        <span>
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                      </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">جودة ممتازة، والتعامل راقٍ، والتوصيل في الوقت.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="d-flex gap-2">
                                <div class="user-img">
                                    <img src="images/review.png" alt="">
                                </div>
                                <div>
                                    <p class="name">قسم المشاريع، وزارة الأشغال</p>
                                    <p class="rate mt-1">
                                        <span>5/5</span>
                                        <span>
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                        <img src="images/Star.svg" alt="">
                      </span>
                                    </p>
                                </div>
                            </div>
                            <p class="review-content mt-2">جودة ممتازة، والتعامل راقٍ، والتوصيل في الوقت.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination reviews-swiper-pagination"></div>
                <div class="swiper-button-prev prev-review">
                    <img src="images/arrow-left.svg" alt="">
                </div>
                <div class="swiper-button-next next-review">
                    <img src="images/arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- contact us -->
    <div class="my-5">
        <h3 class="header text-center">تواصل معنا بكل سهولة</h3>
        <p class="section-p">فريقنا جاهز يستقبل استفساراتك ويقدم لك الدعم اللي تحتاجه بسرعة واحترافية.</p>
        <div class="contact-us py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 p-md-0 p-4 pt-0">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first-name">الإسم الاول</label>
                                    <input id="first-name" type="text" placeholder="ادخل الإسم الاول">
                                </div>
                                <div class="col-md-6">
                                    <label for="first-name">الإسم الأخير</label>
                                    <input id="first-name" type="text" placeholder="ادخل الإسم الأخير">
                                </div>
                                <div class="col-md-6">
                                    <label for="first-name">البريد الإلكتروني</label>
                                    <input id="first-name" type="text" placeholder="ادخل البريد الإلكتروني">
                                </div>
                                <div class="col-md-6">
                                    <label for="first-name">رقم الهاتف</label>
                                    <input id="first-name" type="text" placeholder="ادخل رقم الهاتف">
                                </div>
                                <div class="col-md-12">
                                    <label for="first-name">تفاصيل الرسالة</label>
                                    <input id="first-name" type="text" placeholder="كيف نقدر نخدمك؟ شاركنا طلبك أو استفسارك.">
                                </div>
                            </div>
                            <button class="main-btn">
                                <span>إرسال الرسالة</span>
                                <img src="images/send.svg" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="col-md-5 px-4">
                        <h5>تواصل علي</h5>
                        <ul class="d-grid gap-3">
                            <li class="d-flex gap-2 contact-item">
                                <img src="images/call.svg" alt="">
                                <div>
                                    <p>رقم الجوال</p>
                                    <ul class="d-flex gap-3">
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-flex gap-2 contact-item">
                                <img src="images/message.svg" alt="">
                                <div>
                                    <p>رسالة قصيرة</p>
                                    <ul class="d-flex gap-3">
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-flex gap-2 contact-item">
                                <img src="images/mail.svg" alt="">
                                <div>
                                    <p>البريد الالكتروني</p>
                                    <ul class="d-flex gap-3">
                                        <li>
                                            <span>alsahoofacyory@alsahoogroup.com</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-flex gap-2 contact-item">
                                <img src="images/mail.svg" alt="">
                                <div>
                                    <p>فاكس</p>
                                    <ul class="d-flex gap-3">
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                        <li>
                                            <span>24910194</span>
                                            <img src="images/copy.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-flex gap-2 contact-item">
                                <img src="images/location.svg" alt="">
                                <div>
                                    <p>الموقع</p>
                                    <ul>
                                        <li>
                                            <span>الشويخ الصناعية – قطعة هـ – قسيمة 29</span>
                                            <img src="images/link.svg" alt="">
                                        </li>
                                        <li>
                                            <span>امغرة الصناعية – قطعة 3 – قسيمة 166/168</span>
                                            <img src="images/link.svg" alt="">
                                        </li>
                                        <li>
                                            <span>فرع الري – بجوار السوق الإيراني</span>
                                            <img src="images/link.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <h5 class="mt-3">تابعنا على</h5>
                        <ul class="social-links d-flex gap-3 mt-2">
                            <li>
                                <a href="">
                                    <img src="images/youtube-blue.svg" class="social-icon" alt="youtube" />
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/facebook-blue.svg" class="social-icon" alt="facebook" />
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/instagram-blue.svg" class="social-icon" alt="instagram" />
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/tiktok-blue.svg" class="social-icon" alt="tiktok" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
