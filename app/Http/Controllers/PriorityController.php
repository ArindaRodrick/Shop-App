<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;
use Illuminate\Validation\Rule;
class PriorityController extends Controller
{
    public function index()
    {
        return view('priorities.index', [
            'priorities' => Priority::paginate(50)
        ]);
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store()
    {
        Priority::create(array_merge($this->validatePriority(), [
            'user_id' => request()->user()->id,
        
        ]));

        return redirect('/');
    }

    public function edit(Priority $priority)
    {
        return view('priorities.edit', ['priority' => $priority]);
    }

    public function update(Priority $priority)
    {
        $attributes = $this->validatePriority($priority);

       
        $priority->update($attributes);

        return redirect('/priorities')->with('success', 'Priority Updated!');
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect('/priorities')->with('success', 'Priority Deleted!');
    }

    protected function validatePriority(?Priority $priority = null): array
    {
        $priority ??= new Priority();

        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('priorities', 'slug')->ignore($priority)],
        ]);
    } 
}
