<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>
    {{-- @dd($blog->id) --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}">
                        @csrf

                        <div>
                            <x-input-label for="body" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full mt-1" type="text" name="title" autofocus
                                value="{{ $blog->title }}" />
                            @error('title')
                            <span class="font-bold text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-input id="body" class="block w-full mt-1" type="text" name="body"
                                value="{{ $blog->body }}" />
                            </textarea>
                            @error('body')
                            <span class="font-bold text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>