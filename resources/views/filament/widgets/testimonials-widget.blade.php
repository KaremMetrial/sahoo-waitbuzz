<x-filament::section :heading="__('dashboard.sections.recent_testimonials')" icon="heroicon-o-chat-bubble-left-ellipsis">
    <div class="space-y-4">
        @foreach($testimonials as $testimonial)
            <div class="border rounded-lg p-4">
                <div class="flex items-center gap-4">
                    @if($testimonial['file'])
                        <img src="{{ Storage::url($testimonial['file']['path']) }}" alt="{{ $testimonial['client_name'] }}" class="w-12 h-12 rounded-full">
                    @endif
                    <div>
                        <h4 class="font-semibold">{{ $testimonial['client_name'] }}</h4>
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="mt-2 text-sm">{{ \Illuminate\Support\Str::limit($testimonial['content'], 150) }}</p>
            </div>
        @endforeach
    </div>
</x-filament::section>