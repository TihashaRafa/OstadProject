<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    public function add(){
        return view('backend.category.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.category.index');    
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',

        ]);

        //Post Save
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('admin.category.index');    
    }


    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Post Deleted Successfully');
    }
}

