<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductContrtoller extends Controller
{
    public function index(){
        $product = product::all();
        return view('backend.category.index', compact('category'));
    }

    // public function add(){
    //     return view('backend.category.add');
    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //     ]);
    //     product::create([
    //         'name' => $request->name,
    //         'user_id' => $request->user_id,
    //     ]);

    //     return redirect()->route('admin.category.index');    
    // }

    // public function edit($id)
    // {
    //     $category = product::findOrFail($id);
    //     return view('backend.category.edit', compact('category'));
    // }

    // public function update(Request $request, $id){

    //     $request->validate([
    //         'name' => 'required',

    //     ]);

    //     //Post Save
    //     $category = product::findOrFail($id);
    //     $category->update([
    //         'name' => $request->name,
    //         'user_id' => $request->user_id,
    //     ]);
    //     return redirect()->route('admin.category.index');    
    // }


    // public function destroy($id){
    //     $category = product::findOrFail($id);
    //     $category->delete();
    //     return redirect()->back()->with('success', 'Post Deleted Successfully');
    // }
}
