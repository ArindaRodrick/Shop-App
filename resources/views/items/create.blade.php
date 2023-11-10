<x-layout>
        <form method="POST" action="/items">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="quantity" required />
            <x-form.textarea name="description" required /> 
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                            {{ old('priority_id') == $priority->id ? 'selected' : '' }}
                        >{{ ucwords($priority->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="priority"/>
            </x-form.field> 
            <x-form.button>Create</x-form.button>
             
</x-layout>
