<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::paginate(10);
        return view ('/admin/classes/index', [
            'classes' => $classes
        ]);
    }



    public function create()
    {

        return view('create');
    }

    public function store(Request $request)
    {

        $classes = new  Classes();
        $classes->fill($request->all());
        $classes->save();
        return redirect('/admin');
    }




    public function show($id)
    {
        $class = Classes::where('id', $id)->firstOrFail();
        return view('/admin/classes/show', [
            'class' => $class
        ]);
    }

    /*
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

*/

    public function destroy(Request $request, $id)
    {
        $class = Classes::find($id);
        $class->delete();
        return redirect('/admin/classes');
    }
}
