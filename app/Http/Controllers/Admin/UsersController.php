<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::role([RoleEnum::TEACHER, RoleEnum::STUDENT])->orderBy('id')->paginate(10);
        return view ('/admin/users/index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function approve($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return [
            'status' => $user->approve()
        ];
    }

    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('/admin/users/show', [
            'user' => $user
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
        return redirect('/admin/users');
    }
}
