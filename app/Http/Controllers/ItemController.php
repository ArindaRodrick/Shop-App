<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Validation\Rule;
class ItemController extends Controller
{
    public function index()
    {
$user = auth()->user();
return view('admin.items.index', [
            'items' => Item::where('user_id',$user->id)->sortByNameAsc()->filter(
                        request(['search','category', 'author'])
                    )->paginate(6)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('admin.items.create');
    }
    public function store() 
    {
        Item::create(array_merge($this->validateItem(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        
        ]));
           
            return redirect('/');
    }
    public function edit(Item $item) 
    {
        return view('admin.items.edit',['item' => $item]);
    }
    public function update(Item $item)
    {
        $attributes = $this->validateItem($item);
    
        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
       
        $item->update($attributes);
            return redirect('/')->with('success', 'Item Updated!');; 
    }
    public function destroy(Item $item)
    {
           $item->delete();
           return back()->with('success', 'Item Deleted!');
    }
    protected function validateItem(?Item $item = null): array
    {
        $item ??= new Item();

        return request()->validate([
            'name' => 'required',
             'slug' => ['required', Rule::unique('items', 'slug')->ignore($item)],
            'quantity' => 'required',
            'description' => 'required',
            'thumbnail' => $item->exists ? ['image'] : ['required', 'image'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'priority_id' => ['required', Rule::exists('priorities', 'id')],
           
        ]);
    }
}
