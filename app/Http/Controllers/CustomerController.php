<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::latest()->get();
      return view('backend.customer.index', compact('customer'));
     }
  
  
     public function create(){
      return view('backend.customer.create');
     }
  
     public function store(Request $request){
  
      
          $request->validate([
          'title'                 => 'required',
          'description'           => 'required|string',
          'category'              => 'required|string',
          'tags'                  => 'required|array',
          'status'                => 'required|string',
          'featured_image'        => 'required|image',
          ]);
  
  
          //image upload
          if($request->hasFile('featured_image')){
           $image = $request->file('featured_image');
           $fileNameToStore = 'Customer_image'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('image'), $fileNameToStore);
          }
  
          Customer::create([
           'title'              => $request->title,
           'description'        => $request->description,
           'category'           => $request->category,
           'tags'               => $request->tags,
           'status'             => $request->status,
           'featured_image'     => $fileNameToStore,
          ]);
  
          return redirect()->back()->with('success', 'Customer Created Successfully');
     }
  
  
     public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }
  
  
  
     public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit', compact('customer'));
     }
  
  
     public function update(Request $request, $id){
  
      
        $request->validate([
        'title'                 => 'required',
        'description'           => 'required|string',
        'category'              => 'required|string',
        'tags'                  => 'required|array',
        'status'                => 'required|string',
        'featured_image'        => 'nullable|image',
        ]);
  
  
        //image upload
        if($request->hasFile('featured_image')){
         $image = $request->file('featured_image');
         $fileNameToStore = 'Customer_image'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('image'), $fileNameToStore);
        }
        $customer = Customer::findOrFail($id);
  
        $customer->update([
         'title'              => $request->title,
         'description'        => $request->description,
         'category'           => $request->category,
         'tags'               => $request->tags,
         'status'             => $request->status,
         'featured_image'     => $request->hasFile('featured_image')? $fileNameToStore : $customer ->featured_image,
        ]);
  
        return redirect()->back()->with('success', 'Customer  Successfully');
   }
     
     public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
  
        return redirect()->back()->with('success', 'Customer Deleted Successfully');
     }
}