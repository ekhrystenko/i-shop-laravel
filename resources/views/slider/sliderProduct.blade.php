<div class="slider-product-card">
    @foreach($product->images as $image)
        <div class="product-img-cart">
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ Storage::url($image->img) }}" alt="{{ $product->title }}"></a>
        </div>
    @endforeach
</div>
