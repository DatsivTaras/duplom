<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\ClassesUsers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Subjects;
use App\Models\SubjectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'subjects' => ['required'],
            'classes' => ['required'],
            'clas' => ['required_if:role,==,student'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function showRegistrationForm()
    {
        $subjects = Subjects::all();
        $classes = Classes::all();
        $roles = [RoleEnum::TEACHER, RoleEnum::STUDENT];
        return view('auth.register', [
            'subjects' => $subjects,
            'classes' => $classes,
            'roles' => $roles
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['role']) {
            $user->assignRole($data['role']);
        }

        if ($data['clas']) {
            $classUsers = new ClassesUsers();
            $classUsers->user_id = $user->id;
            $classUsers->class_id = $data['clas'];
            $classUsers->save();
        }

        if ($data['classes']) {
            foreach($data['classes'] as $class){
                $classUsers = new ClassesUsers();
                $classUsers->user_id = $user->id;
                $classUsers->class_id = $class;
                $classUsers->save();
            }
        }

        if ($data['subjects']) {
            foreach($data['subjects'] as $subject){
                $answer = new SubjectsUsers();
                $answer->user_id = $user->id;
                $answer->subject_id = $subject;
                $answer->save();
            }
        }

        return $user;
    }
}
