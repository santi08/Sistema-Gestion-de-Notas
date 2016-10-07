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
    

    $user= new User($requests->all());
    $contraseña=$this->crearContraseña($user);
    //$user->password=bcrypt($contraseña);
    $user->password=$contraseña;
    $user->save();

    $users= User::orderby('id','ASC')->paginate(10);
    return view('admin.usuarios.index')->with('users',$users);

       
    }

    public function destroy($id){
     $user = User::find($id);
     $user->estado = 0;
     $user->save();
     
     $users= User::orderby('id','ASC')->paginate(10);
     return view('admin.usuarios.index')->with('users',$users);

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
