<div class="flex items-center justify-between p-3 text-2xl header bg-zinc-800 text-slate-50">
    <p>E-commerce Website</p>
    <div class="p-3">

        <a href="/"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('home') ? 'text-amber-500' : '' }}">Home</a>
        <a href="/about"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('about') ? 'text-amber-500' : '' }}">About</a>
        <a href="/blogs"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('blogs') ? 'text-amber-500' : '' }}">Blogs</a>
        <a href="/contact"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('contact') ? 'text-amber-500' : '' }}">Contact</a>
        <a href="/login"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('login') ? 'text-amber-500' : '' }}">Login</a>
        <a href="/register"
            class="p-2 hover:text-amber-500 transition duration-300 {{ request()->routeIs('register') ? 'text-amber-500' : '' }}">Register</a>
    </div>
</div>