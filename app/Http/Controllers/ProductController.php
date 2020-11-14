<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        return view('product.index');
    }
    public function read(){
        return "read page";
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
    public function edit(){
        return view('product.edit');
    }
    public function update(){
        return "update page";
    }
    public function delete(){
        return "delete page";
    }
}
