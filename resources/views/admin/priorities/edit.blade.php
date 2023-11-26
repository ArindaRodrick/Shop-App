<x-app>
<div class="page-header">
                <h1>PRIORITIES</h1>
                <small>PRIORITIES / EDIT PRIORITY</small>
            </div>
  
<section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <form method="POST" action="/priorities/{{ $priority->id }}">
            @csrf
            @method('PATCH')
            

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-6">
        <x-form.label for="name" :value="__('Name')" />
          <div class="mt-2">
          <x-form.input name="name" :value="old('name', $priority->name)" required />
          <x-form.error :messages="$errors->get('name')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-6">
        <x-form.label for="slug" :value="__('Slug')" />
          <div class="mt-2">
            <x-form.input name="slug" :value="old('slug', $priority->slug)" required />
            <x-form.error :messages="$errors->get('slug')" class="mt-2" />
</div>
        </div>
<div class="sm:col-span-full">
<x-form.label for="description" :value="__('Description')" />
          <div class="mt-2">
          <x-form.textarea name="description"  rows="2" required>{{ old('description', $priority->description) }}</x-form.textarea>
            <x-form.error :messages="$errors->get('description')" class="mt-2" />
          </div>
        </div>
        </div>
            <x-form.button>Update</x-form.button>
            </x-panel>

            </main>
    </section>
</x-app>