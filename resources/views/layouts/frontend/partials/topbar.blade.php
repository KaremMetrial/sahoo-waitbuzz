<div class="top-bar">
    <div class="container space-between ">

        <!-- social links -->
        <ul class="social-links d-flex gap-md-3 gap-2">
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

        <!-- language -->
        <div class="language">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @php
                    $flagImage = $localeCode === 'ar' ? 'kw-flag.svg' : 'us-flag.svg';
                    $languageName = $localeCode === 'ar' ? 'العربية' : 'English (US)';
                @endphp

                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img src="{{ asset('assets/frontend/images/' . $flagImage) }}" alt="{{ $properties['native'] }} flag">
                    <span class="px-1">{{ $languageName }}</span>
                </a>

                @if(!$loop->last)
                    <span class="px-2">|</span>
                @endif
            @endforeach
        </div>
    </div>
</div>
