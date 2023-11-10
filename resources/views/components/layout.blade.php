<!doctype html>

<title>Shopping list</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="js/main.js" defer></script>
<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif ">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center bg-gray-300">
            <div>
                <a href="/">
                    <img src="/images/download.png" alt="Laracasts Logo" width="100" height="16">
                </a>
            </div>
            <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
         <input type="text"
                       name="search"
                       placeholder="Search Item by name"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
        @auth
<button class="py-2 pl-3 pr-9 text-sm font-semibold Uppercase">
<x-dropdown-item
                                href="/items/create"
                                :active="request()->is('/items/create')"
                            >
                                 Create New Item
                            </x-dropdown-item>
                            <x-dropdown-item
                                href="/categories/create"
                                :active="request()->is('/categories/create')"
                            >
                                 Create New Category
                            </x-dropdown-item>
                            <x-dropdown-item
                                href="/priorities/create"
                                :active="request()->is('/priorities/create')"
                            >
                                 Create New Priority
                            </x-dropdown-item>
</button>
<button class="py-2 pl-3 pr-9 text-sm font-semibold Uppercase">
<x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Log Out
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                        </button>
                        
            <div class="mt-8 md:mt-0 flex items-center px-3 py-2">
            
                @else
                <button>
                <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Register
                    </a>
                </button>
                   <button>
                   <a href="/login"
                       class="mr-8 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                   </button>
                   
                @endauth
             
            </div>
        </nav>

        {{ $slot }}

        <footer
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
        >
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">

            <h5 class="text-3xl">Stay in touch with the latest items</h5>
            <p class="text-sm mt-3">check out for the latest products.</p>

            <div class="mt-10">
              
            </div>
        </footer>
    </section>
    <x-flash/>
</body>
