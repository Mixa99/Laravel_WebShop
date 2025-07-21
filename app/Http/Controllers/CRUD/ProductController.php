<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function apiIndex() {
        $products = Product::paginate(5);
        return response()->json(['message' => $products]);
    }

    public function apiShow($id){
        $product = Product::find($id);
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name')
            ->where('comments.product_id', '=', $id)->get();
        if($product){
            return response()->json(['product' => $product, 'comments' => $comments]);
        } else {
            return response()->json('Product not found');
        }
    }

    public function apiStore(ProductRequest $request){
        if($request->hasFile('path')){
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            if($request->category){
                $product->category = $request->category;
            }
            $product->quantity = $request->quantity;
    
            $imageName = $request->file('path')->getClientOriginalName();
            $request->file('path')->storeAs('product-img/', $imageName, 'public');
            $product->path = 'storage/product-img/'.$imageName;
            
            $product->save();
            return response()->json('Product created successfully.'); 
        }
        return response()->json('Product is not created');
    }

    public function apiEdit(ProductRequest $request, $id){
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->path = $request->path;
            $product->price = $request->price;
            if($request->category){
                $product->category = $request->category;
            }
            $product->quantity = $request->quantity;
            $product->save();
            return response()->json('Product updated successfuly');
        } else {
            return response()->json('Product not found');
        }
    }

    public function apiDestroy($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json('Product deleted successfuly');
        } else {
            return response()->json('Product not found');
        }
    }
    
    public function index() {
        $products = Product::paginate(6);
        return view('index', ['products' => $products]);
    }

    public function show($id){
        $product = Product::find($id);
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name')
            ->where('comments.product_id', '=', $id)->get();

        if($product){
            return view('product', compact('product', 'comments'));
        } else {
            return redirect('/');
        }
    }

    public function storeView(){
        return view('layouts.addProduct');
    }

    public function store(ProductRequest $request){

        if($request->hasFile('path')){
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            if($request->category){
                $product->category = $request->category;
            }
            $product->quantity = $request->quantity;
    
            $imageName = $request->file('path')->getClientOriginalName();
            $request->file('path')->storeAs('product-img/', $imageName, 'public');
            $product->path = 'storage/product-img/'.$imageName;

            if($this->productExists($product)){
                $product->save();
                return redirect()->back()->with('success', 'Product created successfully.');
            } else {
                return redirect()->back()->with('error', 'Product is already exists.'); 
            }
            
        } 
        
        return redirect()->back()->with('error', 'Product is not created');    
    }

    
    private function productExists(Product $product)
    {
        return Product::where('name', $product->name)
                  ->where('path', $product->path)
                  ->exists();
    }

    public function edit(ProductRequest $request, $id){
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->path = $request->path;
            $product->price = $request->price;
            if($request->category){
                $product->category = $request->category;
            }
            $product->quantity = $request->quantity;
            $product->save();
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } else {
            return back()->withErrors('Product is not created');
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully.');;
        } else {
            return back()->withErrors('Product is not created');
        }
    }

    

}
