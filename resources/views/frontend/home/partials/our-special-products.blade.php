<div class="our-special-products my-5">
    <div class="container">
        <h3 class="header">{{ __('our_featured_products') }}</h3>
        <p class="section-p">{{ __('featured_products_description') }}</p>
        <div class="row">
            @foreach($productFeatured as $product)
                <div class="col-4">
                    <a href="/product.html">
                        <img src="{{ Storage::url($product->file->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
