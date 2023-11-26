<x-app>     
            <div class="page-header">
                <h1>PRIORITIES</h1>
                <small>PRIORITIES /ALL PRIORITIES</small>
            </div>
            
            <div class="page-content">
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <button><a href="/priorities/create">Add Priority</a>
                          </button>
                        </div>

                        <div class="browse">
                           <input type="search" placeholder="Search" class="record-search">
                           
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="las la-sort"></span> NAME</th>
                                    <th><span class="las la-sort"></span> DESCRIPTION</th>
                                    <th><span class="las la-sort"></span> EDIT ITEMS</th>
                                    <th><span class="las la-sort"></span>DELETE ITEMS</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($priorities->count())
                            @foreach ($priorities as $priority)
                                <tr>
                                    
                                    <td>
                                    {{ $priority->name }}
                                    </td>
                                    <td>
                                    {{ $priority->description }}
                                    </td>
                                   
                                    <td>
                                        <div class="actions">
                                            <span class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                   <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="/priorities/{{ $priority->id }}/edit">Edit</a>
                                       </button>
                                   </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="">
                                            <form  method="POST" action="/priority/{{ $priority->id }}">
                                           @csrf
                                           @method('DELETE')

                                           <button  class=" px-3 py-2 bg-red-500 rounded-xl" type ="submit" class ="btn-delete" onclick="return confirmDeletePriority()">Delete</button>
                                       </form>
                                            </span>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                @endforeach
                            {{ $priorities->links() }}
        @else
        <tr>
        <td colspan="2">{{__('No Priorities Found')}}</td> 
        </tr>
           
        @endif
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        
</x-app>