<x-app>     
            <div class="page-header">
                <h1>CATEGORIES</h1>
                <small>CATEGORIES / All CATEGORIES</small>
            </div>
            
            <div class="page-content">
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <button> <a href="/categories/create">Add Category</a>
                          </button>
                        </div>

                        <div class="browse">
                           <form method="GET" action="/categories">
         <input type="search"
                       name="search"
                       placeholder="Search by name"
                       class="record-search"
                       value="{{ request('categories') }}"
                >
            </form>
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="las la-sort"></span> NAME</th>
                                    <th><span class="las la-sort"></span> STATUS</th>
                                    <th><span class="las la-sort"></span> DESCRIPTION</th>
                                    <th><span class="las la-sort"></span> EDIT CATEGORIES</th>
                                    <th><span class="las la-sort"></span>DELETE CATEGORIES</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($categories->count())
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img">
                                           <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Blog Post illustration"">

                                           </div>
                                            <div class="client-info">
                                                <h4> {{ $category->name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    {{ $category->status }}
                                    </td>
                                    <td>
                                    {{ $category->description }}
                                    </td>
                                   
                                    <td>
                                        <div class="actions">
                                            <span class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                   <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="/categories/{{ $category->id }}/edit">Edit</a>
                                       </button>
                                   </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <span class="">
                                            <form  method="POST" action="/category/{{ $category->id }}">
                                           @csrf
                                           @method('DELETE')

                                           <button  class=" px-3 py-2 bg-red-500 rounded-xl" type ="submit" class ="btn-delete" onclick="return confirmDeleteCategory()">Delete</button>
                                       </form>
                                            </span>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                @endforeach
                            {{ $categories->links() }}
        @else
        <tr>
        <td colspan="2">{{__('No Categories Found')}}</td> 
        </tr>
           
        @endif
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        
</x-app>