<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use Laravel\Ui\Presets\React;

class SubjectController extends Controller
{
    public function subjects()
    {
        $subjects = Subjects::all();


        return view ('subject',compact('subjects'));

    }

    public function createsubject()
    {
        return view ('createsubject');
    }

    public function addsubject(Request $request)
    {
        $subjects = new  Subjects();
        $subjects->fill($request->all());
        $subjects->save();

        return redirect('/test/subjects');
    }

    public function delete($id)
    {
        $tests = Subjects::find($id);
        $tests->delete();

        return redirect('/test/subjects');
    }

    public function editsubject($id)
    {
        $subject = Subjects::find($id);

        return view('updatesubjects',compact('subject'));
    }
    public function updatesubject(Request $request, $id)
    {




        exit;
        $subject = Subjects::find($id);
        $subject->fill($request->all());
        $subject->save();

        return redirect('/test/subjects');
    }
}

