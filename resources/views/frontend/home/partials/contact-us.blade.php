<div class="my-5">
    <h3 class="header text-center">{{ __('site.contact.title') }}</h3>
    <p class="section-p">{{ __('site.contact.description') }}</p>
    <div class="contact-us py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 p-md-0 p-4 pt-0">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first-name">{{ __('site.contact.first_name') }}</label>
                                <input id="first-name" type="text" name="first_name" placeholder="{{ __('site.contact.first_name_placeholder') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="last-name">{{ __('site.contact.last_name') }}</label>
                                <input id="last-name" type="text" name="last_name" placeholder="{{ __('site.contact.last_name_placeholder') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{ __('site.contact.email') }}</label>
                                <input id="email" type="text" name="email" placeholder="{{ __('site.contact.email_placeholder') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone">{{ __('site.contact.phone') }}</label>
                                <input id="phone" type="text" name="phone" placeholder="{{ __('site.contact.phone_placeholder') }}">
                            </div>
                            <div class="col-md-12">
                                <label for="message">{{ __('site.contact.message') }}</label>
                                <input id="message" type="text" name="message" placeholder="{{ __('site.contact.message_placeholder') }}">
                            </div>
                        </div>
                        <button class="main-btn">
                            <span>{{ __('site.contact.send') }}</span>
                            <img src="{{ asset('assets/frontend/images/send.svg') }}" alt="">
                        </button>
                    </form>
                </div>
                <div class="col-md-5 px-4">
                    <h5>{{ __('site.contact.contact_on') }}</h5>
                    <ul class="d-grid gap-3">
                        <li class="d-flex gap-2 contact-item">
                            <img src="{{ asset('assets/frontend/images/call.svg') }}" alt="">
                            <div>
                                <p>{{ __('site.contact.mobile') }}</p>
                                <ul class="d-flex gap-3">
                                    <li>
                                        <span>{{ $settings['phone_number_1'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <span>{{ $settings['phone_number_2'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex gap-2 contact-item">
                            <img src="{{ asset('assets/frontend/images/message.svg') }}" alt="">
                            <div>
                                <p>{{ __('site.contact.sms') }}</p>
                                <ul class="d-flex gap-3">
                                    <li>
                                        <span>{{ $settings['sms_number_1'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <span>{{ $settings['sms_number_2'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex gap-2 contact-item">
                            <img src="{{ asset('assets/frontend/images/mail.svg') }}" alt="">
                            <div>
                                <p>{{ __('site.contact.email_label') }}</p>
                                <ul class="d-flex gap-3">
                                    <li>
                                        <span>{{ $settings['email'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex gap-2 contact-item">
                            <img src="{{ asset('assets/frontend/images/mail.svg') }}" alt="">
                            <div>
                                <p>{{ __('site.contact.fax') }}</p>
                                <ul class="d-flex gap-3">
                                    <li>
                                        <span>{{ $settings['fax_1'] ?? '-' }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <span>{{ $settings['fax_2'] ?? '-' }}</span>
                                        <img src="{{ asset('assets/frontend/images/copy.svg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex gap-2 contact-item">
                            <img src="{{ asset('assets/frontend/images/location.svg') }}" alt="">
                            <div>
                                <p>{{ __('site.contact.location') }}</p>
                                <ul>
                                    <li>
                                        <span>{{ $settings['address_1'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/link.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <span>{{ $settings['address_2'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/link.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <span>{{ $settings['address_3'] }}</span>
                                        <img src="{{ asset('assets/frontend/images/link.svg') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <h5 class="mt-3">{{ __('site.contact.follow_us') }}</h5>
                    <ul class="social-links d-flex gap-3 mt-2">
                        <li>
                            <a href="{{ $settings['youtube'] }}">
                                <img src="{{ asset('assets/frontend/images/youtube-blue.svg') }}" class="social-icon" alt="youtube" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ $settings['facebook_link'] }}">
                                <img src="{{ asset('assets/frontend/images/facebook-blue.svg') }}" class="social-icon" alt="facebook" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ $settings['instagram'] }}">
                                <img src="{{ asset('assets/frontend/images/instagram-blue.svg') }}" class="social-icon" alt="instagram" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ $settings['tiktok'] }}">
                                <img src="{{ asset('assets/frontend/images/tiktok-blue.svg') }}" class="social-icon" alt="tiktok" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
