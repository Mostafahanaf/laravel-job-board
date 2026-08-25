<x-layout :title="$Pagetitle">
    <h2>tag {{ $tag->title }}</h2>

    <h3>Related posts</h3>
        <ul>
            @forelse ($tag->posts as $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <p>{{ $post->body }}</p>
                <p>Author: {{ $post->author }}</p>
                <a href="{{ route('blog.show', $post->id) }}">View full post</a>
            </li>
            @empty
                <p>No related posts found.</p>
            @endforelse
        </ul>
</x-layout>
