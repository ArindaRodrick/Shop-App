<x-app>     
            <div class="page-header">
                <h1>CATEGORIES</h1>
                <small>CATEGORIES /  EDIT CATEGORY</small>
            </div>
<section class="px-6 py-8">
<x-panel>

            <form method="POST" action="/categories/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-2">
        <x-form.label for="name" :value="__('Name')" />
          <div class="mt-2">
          <x-form.input name="name" :value="old('name', $category->name)" required />
          <x-form.error :messages="$errors->get('name')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-2">
        <x-form.label for="slug" :value="__('Slug')" />
          <div class="mt-2">
            <x-form.input name="slug" :value="old('slug', $category->slug)" required />
            <x-form.error :messages="$errors->get('slug')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-2">
        <x-form.label for="status" :value="__('Status')" />
          <div class="mt-2">
          <x-form.input name="status" :value="old('status', $category->status)" required />
          <x-form.error :messages="$errors->get('status')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-4">
        <x-form.label for="description" :value="__('Description')" />
          <div class="mt-2">
          <x-form.textarea name="description"  rows="2" required>{{ old('description', $category->description) }}</x-form.textarea>
            <x-form.error :messages="$errors->get('description')" class="mt-2" />
          </div>
        </div>
        
        <div class="col-span-2">
        <x-form.label for="thumbnail" :value="__('Thumbnail')" />
          <div class=" flex mt-6">
          <div class="flex-1"> 
          <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $category->thumbnail)" />
          </div>
          <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
          </div>
          <x-form.error :messages="$errors->get('thumbnail')" class="mt-2" />
          </div>
        </div>
          
            <x-form.button>Update</x-form.button>
            </x-panel>
    </section>
  
</x-app>