<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.blogs.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="body" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full mt-1" type="text" name="title" autofocus />
                            @error('title')
                            <span class="font-bold text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-input id="body" class="block w-full mt-1" type="text" name="body" />
                            </textarea>
                            @error('body')
                            <span class="font-bold text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="author" :value="__('Author')" />
                            <select name="author_id" id="author_id">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>