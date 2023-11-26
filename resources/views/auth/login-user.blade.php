<x-guest>
    <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-4xl"><a href="/login" class="hover:underline">Log in</a></h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                    <x-form.label for="email" :value="__('Email')" />
                    <div class="mt-2">
                    <x-form.input type="email" name="email" autocomplete="email" required />
                    <x-form.error :messages="$errors->get('email')" class="mt-2" />
                    </div>
         
        </div>
        <div class="sm:col-span-6">
        <x-form.label for="password" :value="__('Password')" />
        <div class="mt-2">
        <x-form.input type="password" name="password" autocomplete="current-password" required />
        <x-form.error :messages="$errors->get('password')" class="mt-2" />
        </div>
                    </div>
                    </div>
<!-- Remember Me -->
<div class="block mt-4">
          
            <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            @if (Route::has('register'))
          <a class="text-sm text-gray-600 hover:text-green-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
          Need an account?{{ __('Sign Up') }}
                </a>
            @endif
            </div>
             <x-form.button>Log In</x-form.button>
        </div>

       
                   

                </form>
            </x-panel>
    </main>
    </section>
</x-guest>

