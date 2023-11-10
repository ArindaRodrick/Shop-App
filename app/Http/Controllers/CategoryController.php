<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    
        public function index()
        {
            return view('categories.index', [
                'categories' => Category::paginate(50)
            ]);
        }
    
        public function create()
        {
            return view('categories.create');
        }
    
        public function store()
        {
            Category::create(array_merge($this->validateCategory(), [
                'user_id' => request()->user()->id,
            
            ]));
    
            return redirect('/categories');
        }
    
        public function edit(Category $category)
        {
            return view('categories.edit', ['category' => $category]);
        }
    
        public function update(Category $category)
        {
            $attributes = $this->validateCategory($category);
    
           
            $category->update($attributes);
    
            return redirect('/categories')->with('success', 'Category Updated!');
        }
    
        public function destroy(Category $category)
        {
            $category->delete();
    
            return redirect('/categories')->with('success', 'Category Deleted!');
        }
    
        protected function validateCategory(?Category $category = null): array
        {
            $category ??= new Category();
    
            return request()->validate([
                'name' => 'required',
                'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
               
            ]);
        }
    }

