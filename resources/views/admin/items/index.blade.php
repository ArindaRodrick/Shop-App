<x-app>     
            <div class="page-header">
                <h1>DASHBOARD</h1>
                <small>ITEMS/ All ITEMS</small>
            </div>
            
            <div class="page-content">
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            
                            <button> <a href="/items/create">Add Item</a>
                          </button>
                        </div>

                        <div class="browse">
                       
                           <form method="GET" action="/">
                           @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
         <input type="search"
                       name="search"
                       placeholder="Search by name"
                       class="record-search"
                       value="{{ request('search') }}"
                >
            </form>
            
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="las la-sort"></span> NAME</th>
                                    <th><span class="las la-sort"></span> QUANTITY</th>
                                    <th><span class="las la-sort"></span> DESCRIPTION</th>
                                    <th><span class="las la-sort"></span> PRIORITIES</th>
                                    <th><span class="las la-sort"></span> EDIT ITEMS</th>
                                    <th><span class="las la-sort"></span>DELETE ITEMS</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($items->count())
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img">
                                           <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Blog Post illustration"">

                                           </div>
                                            <div class="client-info">
                                                <h4> {{ $item->name }}</h4>
                                                <small> <x-category-button :category="$item->category"  /></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    {{ $item->quantity }}
                                    </td>
                                    <td>
                                    {{ $item->description }}
                                    </td>
                                    <td>
                                    <div class="text-sm font-medium text-gray-900">
                                           <x-priority-button :priority="$item->priority" />
                                           </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                   <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="/items/{{ $item->id }}/edit">Edit</a>
                                       </button>
                                   </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="">
                                            <form  method="POST" action="/items/{{ $item->id }}">
                                           @csrf
                                           @method('DELETE')

                                           <button  class=" px-3 py-2 bg-red-500 rounded-xl" type ="submit" class ="btn-delete" onclick="return confirmDeleteItem()">Delete</button>
                                       </form>
                                            </span>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                @endforeach
                            {{ $items->links() }}
        @else
        <tr>
        <td colspan="2">{{__('No Items Found')}}</td> 
        </tr>
           
        @endif
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        
</x-app>