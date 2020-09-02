<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request,$user)
    {
        try{
            $input = $request->toArray();
            $http = new Client();
            $data = [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('API_CLIENT_ID'),
                    'client_secret' => env('API_CLIENT_SECRET'),
                    'username' => $input[$this->username()],
                    'password' =>$input['password'],
                    'scope' => '',
                ],
            ];
            $response = $http->post(env('APP_URL').'/oauth/token', $data);
            $token_api = json_decode((string) $response->getBody(), true);
            session()->put('api_token',$token_api);
        }catch(Exception $e){
            $this->logout($request);
            dd($e->getMessage());
        }

    }
}
