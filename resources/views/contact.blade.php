<x-layout>
    <div class="container mx-auto p-8 flex justify-center">
        <form action="{{ route('contact.store') }}" method="post"
            class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            @csrf
            <h2 class="text-2xl font-bold text-amber-500 mb-4 text-center">Contact Us</h2>
            <div class="mb-4">
                @if (session('success'))
                <div id="success-message" class="text-green-500 text-center">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('success-message').style.display = 'none';
                    }, 3000); // 3 seconds
                </script>
                @endif
            </div>
            <div class="mb-4 flex flex-col">
                <label for="name" class="text-gray-700 mb-1">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400 focus:outline-none"
                    placeholder="Enter your name">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex flex-col">
                <label for="email" class="text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400 focus:outline-none"
                    placeholder="Enter your email">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 flex flex-col">
                <label for="message" class="text-gray-700 mb-1">Message</label>
                <textarea id="message" name="message"
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400 focus:outline-none" rows="4"
                    placeholder="Enter your message"></textarea>
                @error('message')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-4 py-2 bg-stone-800 text-white rounded-lg hover:bg-stone-700 transition">
                Submit
            </button>
        </form>
    </div>

</x-layout>