@foreach ($products as $product)
    <div class="post mb-4">
        <h2>{{ $product->title }}</h2>
        <p>{{ Str::limit($product->content, 150) }}</p>
        <small>{{ $product->created_at->format('F j, Y') }}</small>
        <hr>
    </div>
@endforeach
