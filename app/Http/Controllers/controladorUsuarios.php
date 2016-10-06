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

    	return view('admin.usuarios.create');
    }

    public function store(Request $requests){
    
        $user= new User($requests->all());
        $user->password=bcrypt($requests->password);
        $user->save();
    }

    public function show(Request $requests){
    
    
        }    
}
