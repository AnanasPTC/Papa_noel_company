<?php

namespace App\Http\Controllers\Auth;

require_once(app_path() . '\Utils\computeImage.php');

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\User;
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
    protected $redirectTo = '/';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'birthdate' => ['required'],
            'picture' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        logger('Données pour la création de l\'utilisateur:', $data);

        $picture_filename = computeFilename($data['picture']);
        $data['picture']->storeAs('uploads', $picture_filename);

        $user = User::create([
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'job' => $data['job'],
            'birthdate' => $data['birthdate'],
            'picture' => $picture_filename,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($data['hobbies']){
            foreach ($data['hobbies'] as $hobby){
                $user->hobbies()->attach($hobby);
            }
        }

        return $user;
    }

    protected function showRegistrationForm()
    {
        $hobbies = hobby::all();
        return view('auth.register', compact('hobbies'));
    }
}
