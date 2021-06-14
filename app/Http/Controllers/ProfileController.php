<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subjects;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::where('id', '=', auth()->id())->first();

        $userId = auth()->id();
        $subjects = Subjects::whereHas('subjectUser', function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();

        return view('profile.show', compact('profile','subjects'));

    }

    public function edit()
    {
        $subjects = Subjects::get();

        $profile = User::where('id','=',auth()->id())->first();
        $userId = auth()->id();

        return view('profile.edit', compact('profile','subjects'));
    }

    public function update(Request $request,$id) {

        $profile = User::find($id);
        $profile->fill($request->all());
        $profile->save();

        return redirect('/profile');
    }
}
