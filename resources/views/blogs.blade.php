<x-layout>
    <h1 class="text-3xl font-bold text-amber-500 text-center">Blogs</h1>
    <ul>
        @foreach ($blogs as $blog)
        <li>
            <p><strong>ID:</strong>{{ $blog->id }}</p>
            <p><strong>Title:</strong>{{ $blog->title }}</p>
            <p><strong>Body:</strong>{{ $blog->body }}</p>
        </li>
        @endforeach
    </ul>
</x-layout>