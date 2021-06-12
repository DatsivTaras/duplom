<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests;
use App\Models\Questions;
use App\Models\Answer;
use App\Models\SubjectsUsers;
use App\Models\Questions_answers;
use App\Models\Subjects;
use Symfony\Component\Console\Question\Question;

class TestController extends Controller
{
    public function index()
    {
        $tests = Tests::where('user_id','=',auth()->id())->get();
        return view ('test', compact('tests'));

    }

    public function create()
    {
        $userId = auth()->id();
        $tests = Tests::where('user_id', '=', $userId)->get();

        $subjects = Subjects::whereHas('subjectUser', function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();

        return view ('createtests', compact('tests','subjects'));
    }

    public function createadd(Request $request)
    {
        $test = new  Tests();
        $test->fill($request->all());
        $test->user_id = auth()->id();
        $test->subject_id = $request->subject;
        $test->save();
        return redirect('/test');
    }

    public function delete($id)
    {
        $tests = Tests::find($id);
        $tests->delete();
        return redirect('/test');
    }

    public function edit($id)
    {
        $userId = auth()->id();
        $tests = Tests::where('id','=',$id)->get();

        $subjects = Subjects::whereHas('subjectUser', function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();

        return view('updatetests',compact('tests','subjects'));
    }

    public function update(Request $request)
    {
        $test = Tests::find($request->id);
        $test->fill($request->all());
        $test->save();
        return redirect ('/test');
    }
    public function passtest(Request $request, $id)
    {
        $tests = Tests::where('id','=',$request->id)->first();

        $question = Questions::where('id_test','=',$request->id)->get();

        $questionsAnswers = Questions_answers::where('test_id','=',$id)->first();

        return view('passtest',compact('tests','question' ,'questionsAnswers'));
    }

    public function testresult(Request $request,$id)
    {
        $answers = $request->answer;
            foreach ($answers as $question_id => $q) {
                foreach ($q as $answer_id => $a) {
                }
                $questionAnswer = new Questions_answers ();
                $questionAnswer->test_id = $id;
                $questionAnswer->question_id =$question_id ;
                $questionAnswer->answer_id =$answer_id;
                $questionAnswer->user_id =auth()->id();
                $questionAnswer->save();
            }
        return redirect('/test');
    }
}

