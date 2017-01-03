<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\ModelosNotas\Estudiante;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{

	public function __construct(){


		$this->middleware('jwt.auth',['except'=>['authenticate']]);
	}
    

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('codigo', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $estudiante = Estudiante::where('codigo',$request->codigo)->get();
        // all good so return the token
        return response()->json(['estudiante'=>$estudiante,'token'=>$token]);
    }

    public function notas(Request $request){
        $id=$request->only('id');

        $estudiante=Estudiante::find($id);
        
        return response()->json(compact('estudiante'));
    }
}
