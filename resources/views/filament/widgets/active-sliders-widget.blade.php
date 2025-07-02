<x-filament::section heading="{{__('dashboard.sections.active_sliders')}}" icon="heroicon-o-photo">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($activeSliders as $slider)
            <div class="border rounded-lg p-4">
                @if ($slider['file'])
                    <img src="{{ Storage::url($slider['file']['path']) }}" alt="{{ $slider['title'] }}"
                        class="w-full h-48 object-cover rounded">
                @endif
                <h3 class="font-semibold mt-2">{{ $slider['title'] }}</h3>
                <p class="text-sm text-gray-500">
                     {{ __('filament::resources.sliders.types.' . $slider['type']) }}
                </p>
            </div>
        @endforeach
    </div>
</x-filament::section>
