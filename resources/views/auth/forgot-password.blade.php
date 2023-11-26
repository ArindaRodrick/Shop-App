<x-guest>
<section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
<x-panel>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-form.label for="email" :value="__('Email')" />
            <x-form.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-form.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-form.primary-button>
                {{ __('Email Password Reset Link') }}
            </x-form.primary-button>
        </div>
    </form>
    </main>
    </section>
</x-panel>
</x-guest>
