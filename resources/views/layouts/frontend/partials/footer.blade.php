<footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-12">
                <img class="logo" src="{{ asset('assets/frontend/images/footer-logo.svg') }}" alt="">
            </div>
            <div class="col-md-3 col-6">
                <ul class="d-grid gap-3">
                    <li>
                        <a href="{{ route('categories.index') }}">{{ __('footer.categories') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">{{ __('footer.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}">{{ __('footer.our_projects') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact-us') }}">{{ __('footer.contact_us') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-6">
                <ul class="d-grid gap-3">
                    <li>
                        <a href="">{{ __('footer.terms') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact-us') }}">{{ __('footer.call_us') }}</a>
                    </li>
                    <li>
                        <a href="">{{ __('footer.branches') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}">{{ __('footer.about_us') }}</a>
                    </li>
                    <li>
                        <p>{{ __('footer.follow_us') }}</p>
                        <ul class="social-links d-flex gap-3 mt-2">
                            <li>
                                <a href="{{ $settings['youtube'] }}">
                                    <img src="{{ asset('assets/frontend/images/youtube.svg') }}" class="social-icon" alt="youtube" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['facebook_link'] }}">
                                    <img src="{{ asset('assets/frontend/images/facebook.svg') }}" class="social-icon" alt="facebook" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['instagram'] }}">
                                    <img src="{{ asset('assets/frontend/images/instagram.svg') }}" class="social-icon" alt="instagram" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings['tiktok'] }}">
                                    <img src="{{ asset('assets/frontend/images/tiktok.svg') }}" class="social-icon" alt="tiktok" />
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-12 payment">
                <p class="fw-bold">{{ __('footer.payment_methods') }}</p>
                <ul class="d-flex gap-3 mt-2">
                    <li>
                        <img src="{{ asset('assets/frontend/images/visa.svg') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('assets/frontend/images/mastercard.svg') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('assets/frontend/images/k-net.svg') }}" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- copyrights -->
<div class="copyrights">
    <div class="container">
        <div class="space-between">
            <p>{{ __('footer.copyright') }}</p>
            <ul class="d-flex gap-3">
                <li><a href="">{{ __('footer.usage_policy') }}</a></li>
                <li><a href="">{{ __('footer.service_terms') }}</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- whatsapp -->
<div class="whatsapp">
    <a href="https://api.whatsapp.com/send/?phone={{ $settings['whatsapp_number'] }}&text&type=phone_number&app_absent=0" class="whatsapp-button">
        <span class="tooltip">{{ __('footer.whatsapp') }}</span>
        <img src="{{ asset('assets/frontend/images/whatsapp.svg') }}" alt="">
    </a>
</div>
