<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $data  = Product::all();
        return view('product.index', [
            'products' => $data,
        ]);
    }
    public function read($id){
        $data = Product::findOrFail($id);
        return view('product.read', [
            'product' => $data
        ]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3'],
            'brand' => ['required'],
            'price' => ['required']
        ]);
        
        if($validator->passes()){
            $product = new Product;
            $product->name = $request['name'];
            $product->brand = $request['brand'];
            $product->price = $request['price'];
            $product->save();
            return redirect()
                    ->back()
                    ->with('message', 'Added Successfully');
        }else{
            return redirect()
                    ->back()
                    ->withErrors($validator->messages())
                    ->withInput();
        }
    }
    public function edit($id){
        $data = Product::findOrFail($id);
        return view('product.edit', [
            'product' => $data
        ]);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3'],
            'brand' => ['required'],
            'price' => ['required']
        ]);
        if($validator->passes()){
            $product = Product::find($id);
            $product->name = $request['name'];
            $product->brand = $request['brand'];
            $product->price = $request['price'];
            $product->save();
            return redirect()
                    ->back()
                    ->with('message', 'Updated Successfully');
        }else{
            return redirect()
                    ->back()
                    ->withErrors($validator->messages())
                    ->withInput();
        }
    }
    public function delete($id){
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect()
                    ->route('home')
                    ->with('message', 'Deleted Successfully');
    }
}
