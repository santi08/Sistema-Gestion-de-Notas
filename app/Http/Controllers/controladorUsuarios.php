<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;




class controladorUsuarios extends Controller
{
    
    public function index(){
     $users= User::orderby('id','ASC')->paginate(10);
     return view('admin.usuarios.index')->with('users',$users);

    }

    public function create(){

    	return view('admin.usuarios.index');
    }

    public function store(Request $requests){
    
<<<<<<< HEAD
    $user= new User($requests->all());
    $contraseña=$this->crearContraseña($user);
    //$user->password=bcrypt($contraseña);
    $user->password=$contraseña;
    $user->save();

    $users= User::orderby('id','ASC')->paginate(10);
    return view('admin.usuarios.index')->with('users',$users);
=======
        $user= new User($requests->all());
        $contraseña=$this->crearContraseña($user);
        $user->password=bcrypt($contraseña);
        $user->save();
>>>>>>> 554334423b04acbd61eee25b27a0e9bbd946bf68

        $users= User::orderby('id','ASC')->paginate(10);
        return view('admin.usuarios.index')->with('users',$users);
    }

    public function destroy($id){

    }


    



    public function show(Request $requests){
    
    }

    public function crearContraseña($user){
     $nombre = $user->firstname;
     $codigo = $user->codigo;
     $apellido= $user->lastname;

     $contraseña= $nombre[0].$codigo.$apellido[0];

     return $contraseña;
    }    
}
