<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('adminlte::auth.register');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            // 'name'     => 'required|max:255',
            // 'username' => 'sometimes|required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            // 'terms'    => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['role'] = "member";

        $member = User::create($data);

        return $member;
    }

    public function registerVendor(Request $request)
    {
        $uncrypt_password = $request->password;

        $request['first_name'] = "";
        $request['last_name'] = "";
        $request['password'] = bcrypt($request['password']);
        $request['role'] = "vendor";

        // dd($request->all());

        $this->validator($request->all());

        $registerVendor = \DB::transaction(function () use ($request, $uncrypt_password) {

            $vendor =  User::create($request->all());

            if (!empty($request->metas)) {
                $metas = [];
                foreach ($request->metas as $key => $value) {
                    array_push($metas, ['key' => $key, 'value' => $value]);
                }


                $vendor->metas()->createMany($metas);
            }

            $isLogin = auth()->attempt(['email' => $vendor->email, 'password' => $uncrypt_password]);

            if ($isLogin) {
                return true;
            }

            return false;
        });

        if ($registerVendor) {
            return redirect()->to("/")->with('message','ahaiiii sukses'); 
        }

        return redirect()->to("/")->with('errors', 'Maaf, sepertinya ada yang salah'); 

    }


}
