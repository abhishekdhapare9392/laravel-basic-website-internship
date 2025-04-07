<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Blogs') }}
            {{-- catch the session message --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between mt-2 me-2">
                    {{-- search --}}
                    <form action="{{ route('admin.blogs') }}" method="GET">
                        <input type="text" name="search" placeholder="Search by title"
                            class="px-4 py-2 border border-gray-300 rounded-md">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">Search</button>
                    </form>
                    {{-- add blog --}}
                    <a href="{{ route('admin.blogs.create') }}"
                        class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">Add Blog</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border border-collapse table-auto">
                        <thead>
                            <tr
                                class="text-xs font-semibold text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr class="border">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->body }}</td>
                                <td>{{ $blog->author->name }}</td>
                                <td>{{ date("d, F Y",strtotime($blog->created_at)) }}</td>
                                <td class="flex gap-2"><a
                                        class="px-4 py-2 font-bold text-white bg-orange-500 rounded hover:bg-orange-700"
                                        href="{{ route('admin.blogs.edit', $blog->id) }}">Edit</a>
                                    <a href="{{ route('admin.blogs.delete', $blog->id) }}"
                                        class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>