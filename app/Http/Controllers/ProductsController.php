<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    public function index()
    {
     $products = Products::all();
     return view ('Products', compact('products'));

    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $products = Products::where('id','=',$id)->get();

        return view('update',compact('products'));

    }

    public function update(Request $request)
    {
        $product = Products::find($request->id);
        $product->fill($request->all());
        $product->save();
        return redirect('/product/index');
    }

    public function store(Request $request)
    {
        $product = new Products();
        $product->fill($request->all());
        $product->save();
        return redirect('/product/index');
    }

    public function delete(Request $request)
    {
        $product = Products::find($request->id);
        $product->delete();
        return redirect('/product/index');
    }


}
