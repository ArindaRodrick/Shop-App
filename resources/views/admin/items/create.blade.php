<x-app>
<div class="page-header">
                <h1>DASHBOARD</h1>
                <small>ITEMS / CREATE NEW ITEM</small>
            </div>
            <section class="px-6 py-8">   
<x-panel>
        <form method="POST" action="/items" enctype="multipart/form-data">
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
        <x-form.error :messages="$errors->get('name')" class="mt-2" />
        </div>
        </div>
        <div class="sm:col-span-2">
        <x-form.label for="quantity" :value="__('Quantity')" />
        <div class="mt-2">
        <x-form.input type="text" name="quantity" required />
        <x-form.error :messages="$errors->get('quantity')" class="mt-2" />
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
        </div>
      </div>
        <div class="sm:col-span-3">
        <x-form.label for="categories" :value="__('Categories')" />
          <div class="mt-2">
            <select  name="category_id" id="category_id" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
            </select>
            <x-form.error :messages="$errors->get('category')" class="mt-2" />
          </div>
        </div>
        <div class="sm:col-span-3">
        <x-form.label for="priorities" :value="__('Priorities')" />
          <div class="mt-2">
            <select name="priority_id" id="priority_id" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            @foreach (\App\Models\Priority::all() as $priority)
                        <option
                            value="{{ $priority->id }}"
                            {{ old('priority_id') == $priority->id ? 'selected' : '' }}
                        >{{ ucwords($priority->name) }}</option>
                    @endforeach
            </select>
            <x-form.error :messages="$errors->get('priority')" class="mt-2" />
</div>
  </div>
</div>
  <x-form.button>Create</x-form.button>
</form>  
 </x-panel> 
            </section>         
</x-app>
