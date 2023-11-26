<x-guest>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-6">
        <x-form.label for="name" :value="__('Name')" />
        <div class="mt-2">
        <x-form.input type="text" name="name" required />
        <x-form.error :messages="$errors->get('name')" class="mt-2" />
        </div>
        </div>
          <div class="sm:col-span-6">
          <x-form.label for="username" :value="__('Username')" />
          <div class="mt-2">
          <x-form.input type="text" name="username"  required />
          <x-form.error :messages="$errors->get('username')" class="mt-2" />
          </div>
          </div>
          <div class="sm:col-span-6">
          <x-form.label for="email" :value="__('Email')" />
          <div class="mt-2">
          <x-form.input type="email" name="email"  required />
          <x-form.error :messages="$errors->get('email')" class="mt-2" />
          </div>
          </div>
          <div class="sm:col-span-6">
          <x-form.label for="password" :value="__('Password')" />
          <div class="mt-2">
          <x-form.input type="password" name="password"  required />
          <x-form.error :messages="$errors->get('password')" class="mt-2" />
          </div>
                    </div>
                    </div>
                    <x-form.button>Sign Up</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
    </x-guest>
