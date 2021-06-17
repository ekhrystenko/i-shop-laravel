<div class="slider-main">
    @foreach($products as $product)
        <a href="{{ route('product', [$product->category->alias, $product->alias]) }}">
            <img class="prod-slide" src="{{ Storage::url($product->images[0]['img']) }}" alt="{{ $product->title }}">
        </a>
    @endforeach
</div>
