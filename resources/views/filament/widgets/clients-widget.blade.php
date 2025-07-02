<x-filament::section :heading="__('dashboard.sections.our_clients')" icon="heroicon-o-user-group">
    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach($clients as $client)
            <div class="flex flex-col items-center">
                @if($client['file'])
                    <img src="{{ Storage::url( $client['file']['path']) }} }}" alt="{{ $client['name'] }}" class="w-16 h-16 object-contain">
                @endif
                <p class="mt-2 text-sm text-center">{{ $client['name'] }}</p>
            </div>
        @endforeach
    </div>
</x-filament::section>
