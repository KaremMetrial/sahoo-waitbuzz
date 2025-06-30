<div class="my-5">
    <h3 class="header text-center">{{ __('why_sahoo') }}</h3>
    <div class="why-sahoo">
        <div class="container">
            <div class="row py-5 align-items-center">
                <div class="col-md-5">
                    <h5 class="title">{{ __('leadership') }}</h5>
                    <p>{{ __('leadership.description1') }}</p>
                    <p>{{ __('leadership.description2') }}</p>
                    <p class="fw-800">{{ __('leadership.description3') }}</p>
                    <div class="mt-4 d-flex gap-3">
                        <a href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp_number'] }}&text&type=phone_number&app_absent=0" class="main-btn">{{ __('contact_us') }}</a>
                        <a href="/categories.html" class="border-btn">{{ __('view_categories') }}</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('assets/frontend/images/image.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
