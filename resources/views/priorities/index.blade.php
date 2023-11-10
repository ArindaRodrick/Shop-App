<x-layout>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-4xl">
                                                    Name
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-4xl">
                                                   Slug
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-4xl">
                                                    Edit
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-4xl">
                                                    Delete
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                @foreach ($priorities as $priority)
                                
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    
                                                        {{ $priority->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900"> 
                                                        {{ $priority->slug }}
                                                </div>
                                            </div>
                                        </td>
                                        
                                      

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="  px-3 py-2 text-blue-500  hover:text-blue-600 "><a href="/priorities/{{ $priority->id }}/edit">Edit</a>
                                        </td></button>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form  method="POST" action="/priorities/{{ $priority->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button  class=" px-3 py-2 bg-red-500 rounded-xl" type ="submit" class ="btn-delete" onclick="return confirmDelete()">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{ $priorities->links() }}
                    </div>
                </div>
            </div>
        </div>
</x-layout>
