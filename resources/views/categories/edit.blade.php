<x-layout>
<form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('slug', $category->slug)" required />
            <x-form.button>Update</x-form.button>
</x-layout>