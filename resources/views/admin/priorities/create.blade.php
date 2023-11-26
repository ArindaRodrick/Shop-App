<x-app>
<div class="page-header">
                <h1>PRIORITIES</h1>
                <small>PRIORITIES / CREATE NEW PRIORITY</small>
            </div>
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <form method="POST" action="/priorities">
            @csrf

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
        <x-form.label for="name" :value="__('Name')" />
          <div class="mt-2">
          <x-form.input type="text" name="name" required /> 
            <x-form.error :messages="$errors->get('name')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-3">
        <x-form.label for="slug" :value="__('Slug')" />
          <div class="mt-2">
          <x-form.input type="text" name="slug" required />
            <x-form.error :messages="$errors->get('slug')" class="mt-2" />
          </div>
        </div>
        <div class="col-span-6">
        <x-form.label for="description" :value="__('Description')" />
          <div class="mt-2">
          <x-form.textarea type="text" rows="2" name="description" required />
            <x-form.error :messages="$errors->get('description')" class="mt-2" />
          </div>
        </div>
            </div>
            <x-form.button>Create</x-form.button>
            </x-panel>

            </main>
    
</x-app>