<?php

namespace App\Http\Controllers\Admin;

use App\ModelosSCAD\Sesion;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Auth\EloquentUserProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    

     /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $connection= 'docentes';   
    protected $redirectTo = '/admin/estudiantes';
    protected $guard= 'admin';
    protected $loginView ='bienvenido.bienvenido';
    protected $username = 'UsuarioIdentificacion';
    


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd('controlador admin');
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


     public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }

    
     protected function getCredentials(Request $request)
    {
            //
            $entrada= $request->UsuarioIdentificacion;
            $password= $request->password;
          
            $request['UsuarioIdentificacion']=\DB::connection('docentes')->table('usuario')->select('id')->where('correo','=',$entrada)->value('id');
          
        return $request->only($this->loginUsername(), 'password');
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
            'email' => 'required|email|max:255|unique:sesion',
            'password' => 'required|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
