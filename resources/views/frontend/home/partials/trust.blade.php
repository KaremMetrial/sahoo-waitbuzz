<div class="trust my-5">
    <div class="container">
        <h3 class="header">{{ __('earned_trust_over_years') }}</h3>
        <p class="section-p">{{ __('trusted_by_clients_description') }}</p>
        <div class="swiper swiper-companies pb-4">
            <div class="swiper-wrapper">
                @foreach($clients as $client)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($client->file->path ?? '-') }}" />
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-companies"></div>
        </div>
    </div>
</div>
