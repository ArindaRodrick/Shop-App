<x-layout>
        <form method="POST" action="/items/{{ $item->id }}" >
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $item->name)" required />
            <x-form.input name="quantity" :value="old('quantity', $item->quantity)" required />
            <x-form.textarea name="description" required>{{ old('description', $item->description) }}</x-form.textarea>
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            
            <x-form.field>
                <x-form.label name="priority"/>

                <select name="priority_id" id="priority_id" required>
                    @foreach (\App\Models\Priority::all() as $priority)
                        <option
                            value="{{ $priority->id }}"
                            {{ old('priority_id', $item->priority_id) == $priority->id ? 'selected' : '' }}
                        >{{ ucwords($priority->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="priority"/>
            </x-form.field>
            <x-form.button>Update</x-form.button>
        </form>
</x-layout>
