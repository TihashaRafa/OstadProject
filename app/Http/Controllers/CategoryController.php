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

        return redirect()->back()->with('success', 'Category Created Successfully');    
    }


    // public function show($id){
    //     $category = Category::findOrFail($id);
    //     return view('pages.show', compact('category'));
    // }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    // public function update(Request $request, $id){

    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'nullable|string',
    //         'category' => 'required|string',
    //         'tags' => 'nullable|array',
    //         'status' => 'required|string',
    //         'featured_image' => 'nullable|image',
    //     ]);

    //     //Image Upload
    //     if($request->hasFile('featured_image')){
    //         $image = $request->file('featured_image');
    //         $fileNameToStore = 'post_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $fileNameToStore);
    //     }

    //     //Post Save
    //     $post = Post::findOrFail($id);
    //     $post->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'category' => $request->category,
    //         'tags' => $request->tags,
    //         'status' => $request->status,
    //         'featured_image' =>  $request->hasFile('featured_image') ? $fileNameToStore : $post->featured_image,
    //     ]);

    //     return redirect()->back()->with('success', 'Post updated Successfully');    
    // }



    // public function destroy($id){
    //     $post = Post::findOrFail($id);
    //     $post->delete();
    //     return redirect()->back()->with('success', 'Post Deleted Successfully');
    // }
}

