<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests;
use App\Models\User;
use App\Models\Questions;
use App\Models\Answer;
use App\Models\SubjectsUsers;
use App\Models\Questions_answers;
use App\Models\Subjects;

class ProfileController extends Controller
{

    public function profile() {

        // $profile = Tests::where('id',auth()->id())->find();
        $profile = User::where('id','=',auth()->id())->first();

        $userId = auth()->id();
        $subjects = Subjects::whereHas('subjectUser', function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();

        return view('profile',compact('profile','subjects'));

    }
    public function edit() {

        $subjects = Subjects::get();


        $profile = User::where('id','=',auth()->id())->first();
        $userId = auth()->id();




        return view('editprofile',compact('profile','subjects'));
    }
    public function update(Request $request,$id) {

        $profile = User::find($id);
        $profile->fill($request->all());
        $profile->save();
        return redirect('/profile');

    }

}
