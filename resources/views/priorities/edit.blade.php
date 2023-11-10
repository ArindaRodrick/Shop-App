<x-layout>
<form method="POST" action="/priorities/{{ $priority->id }}">
            @csrf
            @method('PATCH')
            
            <x-form.input name="name" :value="old('name', $priority->name)" required />
            <x-form.input name="slug" :value="old('slug', $priority->slug)" required />
            <x-form.button>Update</x-form.button>
</x-layout>