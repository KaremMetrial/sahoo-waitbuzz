<x-filament::section :heading="__('dashboard.sections.featured_products')" icon="heroicon-o-star">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($featuredProducts as $product)
            <div class="border rounded-lg p-4">
                @if($product['files'][0])
                    <img src="{{ Storage::url($product['files'][0]['path']) }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover rounded">
                @endif
                <h3 class="font-semibold mt-2">{{ $product['title'] }}</h3>
                <p class="text-sm text-gray-500">{{ $product['category']['name'] ?? '' }}</p>
                <p class="text-sm">{{ $product['code'] }}</p>
            </div>
        @endforeach
    </div>
</x-filament::section>