<x-layout>
<form method="POST" action="/priorities">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="slug" required />  
            <x-form.button>Create</x-form.button>
</x-layout>