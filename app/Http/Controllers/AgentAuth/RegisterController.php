<?php

namespace App\Http\Controllers\AgentAuth;

use App\Agent;
use App\Store;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/agent/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:agents',
            'password' => 'required|min:6|confirmed',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Agent
     */
    protected function create(Request $data)
    {
        $agent=new Agent;
        $agent->name = $data['name'];
        $agent->email= $data['email'];
        $agent->password = bcrypt($data['password']);
        $agent->save();
        dump($agent);
        $store=new Store;
        $store->address =$data['address'];
        $store->lat = $data['lat'];
        $store->lng = $data['lng'];
        $store->postal = $data['postcode'];
        $store->agent_id=$agent->id;
        $store->phone = $data['telephone'];
        $store->name = $data['businessname'];
        $store->state =$data['state'];
        $store->city =$data['city'];
        $store->agent_id=$agent->id;
        $store->hours1 =$data['hours1'];
        $store->hours2 =$data['hours2'];
        $store->hours3 =$data['hours3'];
        $store->save();
        dump($store);
        
        return redirect('/agent/login'); 
         

    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('agent.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('agent');
    }
}
