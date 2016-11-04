<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\ModelosNotas\Estudiante;
use App\ModelosSCAD\Horario; 
use App\ModelosSCAD\Periodoacademico; 
use Auth;


use Mockery\CountValidator\Exception;
use Hash;
use DB;




class EstudiantesController extends Controller
{
   
    
    public function index(Request $requests){

     $estudiantes= Estudiante::codigo($requests->get('valor'),$requests->get('ide'))->where('estado',1)->paginate(10);

   // $estudiantes= Estudiante::Periodo($requests->get('id'))->paginate(2);
     $periodosAcademicos = Periodoacademico::all();                               
  
     if($requests->ajax()){
      return response()->json(view('admin.usuarios.part.mostrar',compact('estudiantes'))->render());
     }

     return view('admin.usuarios.index')->with('estudiantes',$estudiantes)->with('periodosAcademicos',$periodosAcademicos);
    }



    public function create(){

    	return view('admin.usuarios.index');
    }

    public function store(Request $requests){
    

    $user= new Estudiante($requests->all());
    $contrasena=$this->crearContrasena($user);
    $user->password=bcrypt($contrasena);
    //$user->password=$contraseña;
    $user->save();
     
    return redirect(route('admin.estudiantes.index'));

       
    }

    public function guardarEstudiante(Request $requests){

      if($requests->file('file')->isValid()){
           try{

            $files = $requests->file('file');
            $file = fopen($files,"r");
            $users = array();

            while (!feof($file) ) {
                
             
                $line=utf8_encode(fgets($file));
                $line = str_replace('ÿþ', '',$line);
                $parts = explode("\t", $line);

                $parts = array_map('trim',$parts);
                $apellidos = array_map('mb_strtolower',explode(" ", $parts[2]));
                $apellidos = array_map('trim',$apellidos);
                $apellidos = array_map('ucfirst',$apellidos);
                $nombres = array_map('mb_strtolower',explode(" ", $parts[3]));
                $nombres = array_map('trim',$nombres);
                $nombres = array_map('ucfirst',$nombres);
                try{
                    $user = array();
                    $parts[0]=substr($parts[0],4);

                    $user['codigo']=trim(preg_replace('/\t+/', '', $parts[0]."-".$parts[1]));
                    $user['codigo']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['codigo']);

                    $user['firstname']=trim(preg_replace('/\t+/', '',$nombres[0]));
                    $user['firstname']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$nombres[0]);
                    if(!empty($nombres[1])){
                        $user['secondname']=$nombres[1];
                        if(!empty($nombres[2])){

                            $user['secondname']=$user['secondname']. " ".$nombres[2];
                        }
                        $user['secondname']=trim(preg_replace('/\t+/', '',$user['secondname']));
                        $user['secondname']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['secondname']);
                    }else{
                        $user['secondname']="";
                    }
                    $user['lastname']=trim(preg_replace('/\t+/', '',$apellidos[0]));
                    $user['lastname']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['primerapellido']);
                    if(!empty($apellidos[1])){
                        $user['secondlastname']=trim(preg_replace('/\t+/', '',$apellidos[1]));
                        $user['secondlastname']=(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$user['secondlastname']));
                        if(!empty($apellidos[2])){
                            $user['secondlastname']=$user['secondlastname']. " ".$apellidos[2];
                        }

                    }else{
                        $user['secondlastname']="";
                    }

                    $password="password";
                    if(!empty($parts[4])){
                        $user['email']=trim(preg_replace('/\t+/', '',$parts[4]));
                        $user['email']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['email']);
                    }
                    $user['idrol']=3;

                    $userDb = User::firstOrNew(["codigo"=>$user["codigo"]]);

                    $userDb->fill($user);
                    if(empty($userDb->id) and !empty($userDb->email)){
                        $userDb->password=substr($userDb->primernombre, 0,1).substr($userDb->codigo, 0,7).substr($userDb->primerapellido, 0,1);

                        $users[] = $userDb;
                    }

               }catch(\Exception $e){

                }

            }
            session()->put('users', $users);
            session()->put('contrasena',bcrypt("contraseña"));
            dd('se procesaron'.count($users));
            //Flash::success('Se procesaron '. count($users). 'exitosamente');
            return view('admin.usuarios.index')->with('users',$users);
          }catch(\Exception $e){
            dd('Se produjo un error, el archivo a procesar parece no contener datos legibles por el sistema.');
              //Flash::error('Se produjo un error, el archivo a procesar parece no contener datos legibles por el sistema.');
              return redirect()->route('admin.estudiantes.index');
          }
        }else{

        } 

    
    }

    public function GuardarDatos(){
        
            $usuariosaprocesar = session('users');
            set_time_limit(0);
            $registrados=0;
            $actualizados=0;
            $errores=0;
            foreach($usuariosaprocesar as $user){
                try{
                    if(empty($user->id)) {
                        $user->password=bcrypt($user->password);
                        $user->save();
                        $registrados+=1;
                    }else{
                        $actualizados+=1;
                        $user->save();
                    }

                }catch(\Exception $e){
                    $e->getMessage();
                }
            }
            $mensaje="Se han procesado los datos exitosamente";
            if($registrados>0){
                $mensaje.=", se han guardado ". $registrados ." usuarios";
            }
             if($actualizados>0){
                    $mensaje.=", se han actualizado ". $actualizados ." usuarios";
             }
            if($errores>0){
                $mensaje.=", no pudiero almacenarse ". $errores ." usuarios, lo mas probable es que estos no cuenten".
                " con los campos obligatorios completos";
            }
           // Flash::success($mensaje.".");
        
    }

    public function destroy($id){
     $estudiante = Estudiante::find($id);
    
     return response()->json(
        $estudiante->toArray()
     );

    }

   

    public function editar(Request $requests){
     
     $user = Estudiante::find($requests->id);
     $user->fill($requests->all());
     $user->save();
     
     return redirect(route('admin.estudiantes.index'));
     
    } 
    
    public function edit($id){

        $estudiante=Estudiante::find($id);

        return response()->json(
            $estudiante->toArray()
            );
    } 

    public function destroyupdate(Request $requests,$id){
     $user= Estudiante::find($id);
     $user->estado=0;
     $user->save();
     
     return response()->json(["mensaje"=>"listo"]);
    }

    public function show(Request $requests){
    
    }

    public function crearContrasena($user){

     $nombre = $user->primerNombre;
     $nombre = strtoupper($nombre); 
     $codigo = $user->codigo;
     $apellido= $user->primerApellido;
     $apellido= strtoupper($apellido);

     $contrasena= $nombre[0].$codigo.$apellido[0];

     return $contrasena;
    }    
}
