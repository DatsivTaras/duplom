<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        $subjects = Subjects::paginate(10);
        return view ('/admin/subjects/index', [
            'subjects' => $subjects
        ]);

    }

    public function create()
    {

        return view('createadminsubjects');
    }

    public function store(Request $request)
    {
        $subjects = new  Subjects();
        $subjects->fill($request->all());
        $subjects->save();
        return redirect('/admin/subjects');
    }

    public function edit($id)
    {
        $subject = Subjects::where('id', $id)->first();

        return view('updatesubjects',compact('subject'));
    }

    public function update(Request $request)
    {
        return 'dggd';
    }


    public function destroy($id)
    {

        $subject = Subjects::find($id);
        $subject->delete();
        return redirect('/admin/subjects');

    }
}
