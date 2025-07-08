@foreach ($posts as $post)
    <div class="post mb-4">
        <h2>{{ $post->title }}</h2>
        <p>{{ Str::limit($post->content, 150) }}</p>
        <small>{{ $post->created_at->format('F j, Y') }}</small>
        <hr>
    </div>
@endforeach
