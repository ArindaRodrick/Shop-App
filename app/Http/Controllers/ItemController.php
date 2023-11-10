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
return view('items.index', [
            'items' => Item::where('user_id',$user->id)->sortByNameAsc()->filter(
                        request(['search','category', 'author'])
                    )->paginate(6)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('items.create');
    }
    public function store() 
    {
        $attributes = request()->validate(
            [
                'name' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
                'priority_id' => ['required', Rule::exists('priorities', 'id')]
               
            ]
            );
            $attributes['user_id'] = auth()->id();
            Item::create($attributes);
            return redirect('/dashboard');
    }
    public function edit(Item $item) 
    {
        return view('items.edit',['item' => $item]);
    }
    public function update(Item $item)
    {
        $attributes = request()->validate(
            [
                'name' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
                'priority_id' => ['required', Rule::exists('priorities', 'id')]
               
            ]
            );
            $item->update($attributes);
            return redirect('/dashboard')->with('success', 'Item Updated!');; 
    }
    public function destroy(Item $item)
    {
           $item->delete();
           return back()->with('success', 'Item Deleted!');
    }
}
