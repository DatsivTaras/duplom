<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answer;
class QuestionsController extends Controller
{
    public function createquestion($id)
    {
        return view ('createquestion',compact('id'));
    }

    public function question($id)
    {
        $questions = Questions::where('id_test', '=', $id)->get();

        return view('question', compact('questions', 'id'));
    }

    public function addquestion(Request $request)
    {

        $question = new  Questions();
        $question->fill($request->all());
        $question->save();
        $answers = $request->answer;
        if (isset($answers['name']) && is_array($answers['name'])) {
            foreach ($answers['name'] as $key => $name) {
                $checkanswer = 0;
                if (isset($answers['check']) && isset($answers['check'][$key])) {
                    $checkanswer = 1;
                }
                $answer = new Answer ();
                $answer->id_question = $question->id;
                $answer->name = $name;
                $answer->checkanswer = $checkanswer;
                $answer->save();
            }
        }

        return redirect()->route('test/question', [$question->id_test]);
    }
    public function updatequestion(Request $request )
    {

        $questions = Questions::find($request->id);
        $questions->fill($request->all());
        $questions->save();

        $deleteanswer = Answer::where('id_question', $request->id)->delete();
        $answers = $request->answer;
        if (isset($answers['name']) && is_array($answers['name'])) {
            foreach ($answers['name'] as $key => $name) {
                $checkanswer = 0;
                if (isset($answers['check']) && isset($answers['check'][$key])) {
                    $checkanswer = 1;
                }
                $answer = new Answer ();
                $answer->id_question = $questions->id;
                $answer->name = $name;
                $answer->checkanswer = $checkanswer;
                $answer->save();
            }
        }
        return redirect()->route('test/question',[$questions->id_test]);
    }
    public function editquestion($id)
    {
        $question = Questions::where('id',$id)->first();

        return view('updatequestion',compact('question'));

    }
    public function questiondelete(Request $request)
    {
        $tests = Questions::find($request->id);
        $tests->delete();
        return redirect()->route('test/question',[$tests->id_test]);
    }



}
