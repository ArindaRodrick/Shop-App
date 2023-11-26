<x-app>     
            <div class="page-header">
                <h1>CATEGORIES</h1>
                <small>CATEGORIES / CREATE NEW CATEGORY</small>
            </div>
            <section class="px-6 py-8">     
<x-panel>
            <form method="POST" action="/categories"enctype="multipart/form-data">
            @csrf

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-2">
        <x-form.label for="name" :value="__('Name')" />
        <div class="mt-2">
        <x-form.input type="text" name="name" required />
        <x-form.error :messages="$errors->get('name')" class="mt-2" />
        </div>
        </div>
        <div class="sm:col-span-2">
        <x-form.label for="slug" :value="__('Slug')" />
        <div class="mt-2">
        <x-form.input type="text" name="slug" required />
        <x-form.error :messages="$errors->get('slug')" class="mt-2" />
        </div>
        </div>
        <div class="sm:col-span-2">
        <x-form.label for="status" :value="__('Status')" />
        <div class="mt-2">
        <x-form.input type="text" name="status" required />
        <x-form.error :messages="$errors->get('status')" class="mt-2" />
        </div>
        </div>
        <div class="sm:col-span-4">
        <x-form.label for="description" :value="__('Description')" />
          <div class="mt-2">
          <x-form.textarea type="text" rows="2" name="description" required />
            <x-form.error :messages="$errors->get('description')" class="mt-2" />
          </div>
        </div>
        <div class="col-span-2">
          <x-form.label for="thumbnail" :value="__('Thumbnail')" />
          <div class="mt-2">
          <x-form.input type="file" name="thumbnail" required />
          <x-form.error :messages="$errors->get('thumbnail')" class="mt-2" />
          </div>
        </div>
            </div>

            <x-form.button>Create</x-form.button>
          
            </form> 
        </x-panel>
            </section>
</x-app>
