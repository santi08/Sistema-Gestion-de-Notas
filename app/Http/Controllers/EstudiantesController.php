<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\ModelosNotas\Estudiante;
use App\ModelosSCAD\Horario; 
use App\ModelosSCAD\Periodoacademico; 
use App\ModelosSCAD\Programaacademico;
use Auth;
use Mockery\CountValidator\Exception;
use Hash;
use DB;

class EstudiantesController extends Controller
{
  
    public function index(Request $requests){

     
     $programas= Programaacademico::all();
     $estudiantes= Estudiante::codigo($requests->get('valor'),$requests->get('idPrograma'))->where('estado',1)->paginate(10);

   // $estudiantes= Estudiante::Periodo($requests->get('id'))->paginate(2);
    // $periodosAcademicos = Periodoacademico::all();                               
  
     if($requests->ajax()){
      return response()->json(view('admin.usuarios.part.mostrar',compact('estudiantes'))->render());
     }

     return view('admin.usuarios.index')->with('estudiantes',$estudiantes)->with('programas',$programas);
    }

    public function encontrarProgramaAcademico(string $encontrar){
         
         $resultado;
         for($i=0;$i<count($programa);$i++){
          if($programa[$i]->Id == $encontrar){
            $resultado = $programa[$i]->Id;
          }  
         }

         return $resultado ;
    }

    public function procesarArchivo(Request $request)
    {
      set_time_limit(0);
        if($request->file('file')->isValid()){
          
          try{
            $files = $request->file('file');
            $file = fopen($files,"r");
            $users = array();

            while (!feof($file) ) {
                $line=utf8_encode(fgets($file));
                $line = str_replace('ÿþ','',$line); //caracteres inesperados;
                $parts = explode("\t",$line); // tabulacion;
                $parts = array_map('trim',$parts); // elimina espacios para guardar en BD;
                $apellidos = array_map('mb_strtolower',explode(" ", $parts[2]));
                $apellidos = array_map('trim',$apellidos);
                $apellidos = array_map('ucfirst',$apellidos);
                $nombres = array_map('mb_strtolower',explode(" ", $parts[3]));
                $nombres = array_map('trim',$nombres);
                $nombres = array_map('ucfirst',$nombres);
                try{
                    $user = array();
                    $parts[0]=substr($parts[0],4);

                    $user['codigo']=trim(preg_replace('/\t+/', '', $parts[0])."-".$parts[1]); //armo el codigo;
                    $user['codigo']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['codigo']);

                    //programaAcademico 
                    $user['programa']=trim(preg_replace('/\t+/', '', $parts[1]));
                    $user['programa']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['programa']);
                    //encontrarProgramaAcademico();

                    $user['primerNombre']=trim(preg_replace('/\t+/', '',$nombres[0]));
                    $user['primerNombre']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$nombres[0]);
                    if(!empty($nombres[1])){
                        $user['segundoNombre']=$nombres[1];
                        if(!empty($nombres[2])){

                            $user['segundoNombre']=$user['segundoNombre']." ".$nombres[2];
                        }
                        $user['segundoNombre']=trim(preg_replace('/\t+/','',$user['segundoNombre']));
                        $user['segundoNombre']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['segundoNombre']);
                    }else{
                        $user['segundoNombre']="";
                    }
                    $user['primerApellido']=trim(preg_replace('/\t+/','',$apellidos[0]));
                    $user['primerApellido']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['primerApellido']);
                    if(!empty($apellidos[1])){
                        $user['segundoApellido']=trim(preg_replace('/\t+/','',$apellidos[1]));
                        $user['segundoApellido']=(preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['segundoApellido']));
                        if(!empty($apellidos[2])){
                            $user['segundoApellido']=$user['segundoApellido']." ".$apellidos[2];
                        }

                    }else{
                        $user['segundoApellido']="";
                    }

                    $password="contraseña";

                    if(!empty($parts[4])){
                        $user['email']=trim(preg_replace('/\t+/','',$parts[4]));
                        $user['email']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['email']);
                    }

                    $userDb = Estudiante::firstOrNew(["codigo"=>$user["codigo"]]);

                    $userDb->fill($user);


                    if(empty($userDb->id) and !empty($userDb->email)){
                        $userDb->password=Hash::make(substr($userDb->primerNombre, 0,1).substr($userDb->codigo, 0,7).substr($userDb->primerApellido, 0,1));
                        
                        $users[] = $userDb;

                      $userDb->save();      
                        
                    }

                    

                }catch(\Exception $e){

                }

            }
            
            /*foreach ($users
             as $u) {
              echo($u).'<br>';# code...
            };*/
            //session()->put('users', $users);
            //session()->put('contrasena',bcrypt("contraseña"));
            //Flash::success('Se procesaron '. count($users). 'exitosamente');
            
            $registrados=0;
            $actualizados=0;
            $errores=0;
            foreach($users as $estudiantes){
                try{
                    if(empty($estudiantes->id)) {
                        $estudiantes->password=bcrypt($user->password);
                        $estudiantes->save();
                        $registrados+=1;
                    }else{
                        $actualizados+=1;
                        $estudiantes->save();
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

            dd($mensaje);
            return view('admin.users.index')->with('users',$users);

          }catch(\Exception $e){
              //Flash::error('Se produjo un error, el archivo a procesar parece no contener datos legibles por el sistema.');
            dd('se produjo un error');
              return redirect()->route('admin.users.index');
          }
        }else{

        }

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
        $info=array();
        $programas=Programaacademico::all(); 
        $estudiante=Estudiante::find($id);

        $info[]=$programas;
        $info[]=$estudiante;
        return response()->json(
            $info
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
