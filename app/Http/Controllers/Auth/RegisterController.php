<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $file = $data['image'];
        $unique_name = hexdec(uniqid());//generates unique hex key
        $img_extension = strtolower($file->getClientOriginalExtension());//get the extension of the uploaded file
        
        $new_file_name = $unique_name . '.' . $img_extension; //new file name
        $upload_location = "admin/images/"; // upload location
        $uploaded_file_path = $upload_location.$new_file_name; //file path
        $file->move($upload_location, $new_file_name); // moving the file from the form to the location

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $uploaded_file_path,
            'role_id' => 2,
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
