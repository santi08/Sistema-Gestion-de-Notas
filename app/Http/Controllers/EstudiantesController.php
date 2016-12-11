<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelosNotas\Estudiante;
use App\ModelosSCAD\Horario; 
use App\ModelosSCAD\Periodoacademico; 
use App\ModelosSCAD\Programaacademico;
use App\ModelosNotas\Matricula;
use Auth;
use Mockery\CountValidator\Exception;
use Hash;
use DB;


class EstudiantesController extends Controller
{
    public $alerta;

    public function listarAsignaturas($id){
       $periodos = Periodoacademico::orderBy('Id','DESC')->get();
       $ultimo_periodo=$periodos->first();
       $id_periodo= $ultimo_periodo->Id;
        //array para guardar las materias del ultimo periodo academico
        $asignaturasUltimoPeriodo=array();

        //Capturar el ultimo Periodo para listarlo por defecto
          
      $estudiante= Estudiante::find($id);
      $asignaturas=$estudiante->matriculas;

       //Buscar las matriculas en el periodo Capturado
        foreach ($asignaturas as $asignatura) {
          if($asignatura->horario->PeriodoAcademicoId == $id_periodo){
              $asignaturasUltimoPeriodo[]= $asignatura; 
            }
        }
      $nombre = $estudiante->primerNombre." ".$estudiante->primerApellido;

      return response()->json(view('admin.usuarios.part.listarAsignaturas',compact('asignaturasUltimoPeriodo'),compact('nombre'))->render());

    }

    public function index(Request $requests){

     $programas= Programaacademico::all();
     

     if((!empty($requests->get('idPrograma'))) and (!empty($requests->get('valor')))){

       $e = Estudiante::codigo($requests->get('valor'),$requests->get('idPrograma'))->orderBy('primerApellido','ASC')->where('estado',1)->paginate(10);

      if($requests->ajax()){
        return response()->json(view('admin.usuarios.part.mostrar2',compact('e'))->render()); 
      };
     }
     
    if(!empty($requests->get('idPrograma')) and empty($requests->get('valor'))){

       $e= Estudiante::codigo($requests->get('valor'),$requests->get('idPrograma'))->orderBy('primerApellido','ASC')->where('estado',1)->paginate(10);

      if($requests->ajax()){
        return response()->json(view('admin.usuarios.part.mostrar',compact('e'))->render()); 
      };

    }else {
      $estudiantes = Estudiante::codigo($requests->get('valor'),$requests->get('idPrograma'))->orderBy('primerApellido','ASC')->where('estado',1)->paginate(10);

      if($requests->ajax()){
         return response()->json(view('admin.usuarios.part.mostrar1',compact('estudiantes'))->render()); 
      
      }
     
      
      return view('admin.usuarios.index')->with('estudiantes',$estudiantes)->with('programas',$programas);
    }

 


 }
      
    public function procesarArchivo(Request $request)
    {
      $alerta= new alertas();
      set_time_limit(0);
      $programa = Programaacademico::all();
      
        if($request->file('file')->isValid()){
          
          DB::table('Estudiantes')->update(['estado'=> 0]);

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
                   $user['id_programaAcademico']=trim(preg_replace('/\t+/', '', $parts[1]));
                   $user['id_programaAcademico']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['id_programaAcademico']);

                    $user['email']=trim(preg_replace('/\t+/','',$parts[4]));
                    $user['email']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['email']);
                
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
                 
                    $userDb= Estudiante::firstOrNew(["codigo"=>$user["codigo"]]);
                    $userDb->fill($user);

                    if(empty($userDb->id)){
                     $userDb->password=Hash::make(substr($userDb->primerNombre, 0,1).substr($userDb->codigo, 0,7).substr($userDb->primerApellido, 0,1));   
                    }  
                    $users[] = $userDb;
                }catch(\Exception $e){

                }

            }
            
            $registrados=0;
            $actualizados=0;
            $errores=0;
            foreach($users as $estudiantes){
                try{
                    if(empty($estudiantes->id)) {
                        $registrados+=1;
                        $estudiantes->save();     
                    }else{
                        $actualizados+=1;
                        $estudiantes->save();
                    }

                }catch(\Exception $e){
                    $e->getMessage();
                }
            }

            $mensaje="";
            if($registrados>0){
                $mensaje.="Han sido registrados ". $registrados ." Estudiantes";
            }
             if($actualizados>0){
                $mensaje.="Han sido actualizados ". $actualizados ."Estudiantes";
             }
            if($errores>0){
                $mensaje.="No pudieron ser registrados ". $errores ." Estudiantes, es probable que no cuenten".
                " con los campos obligatorios completos";
            }
             flash($mensaje, 'success');
          
            return redirect()->route('admin.estudiantes.index');

          }catch(\Exception $e){
           flash('El archivo no se pudo procesar, por favor escoge el archivo adecuado', 'warning'); 
           return redirect()->route('admin.estudiantes.index');                  
          }
        }else{

        }

    }

    public function create(){

    	return view('admin.usuarios.index');
    }

   public function store(Request $requests){

      $this->validate($requests, [
        'primerNombre' => 'required',
        'primerApellidor' => 'required',
        'email' => 'required',
        'codigo' => 'required',
        'id_programaAcademico' => 'required',
      ]);

      $user= new Estudiante($requests->all());
      $contrasena=$this->crearContrasena($user);
      $user->password=bcrypt($contrasena);
      $user->save();
    

      flash('Estudiante registrado con exito', 'success');
      return redirect()->route('admin.estudiantes.index');  
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
    flash('Estudiante editado con exito', 'success');
    return redirect()->route('admin.estudiantes.index');
     
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
     
      flash('Estudiante eliminado con exito', 'success');
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

    public function asignaturasEstudiante(Request $request){
        $periodos = Periodoacademico::orderBy('Id','DESC')->get();
        $id_estudiante = \Auth::user()->id;
        $matriculas= Matricula::where('estudiante_id',$id_estudiante)->get();

        $ultimo_Periodo=$periodos->first();
        $id_periodo=$ultimo_Periodo->Id;
        //array para guardar las materias en un determinado periodo academico
        $asignaturas=array();
        //array para guardar las materias en el ultimo periodo academico
        $asignaturasUltimoPeriodo=array();

        //Buscar las matriculas en el periodo Capturado
        foreach ($matriculas as $matricula) {
          if($matricula->horario->PeriodoAcademicoId == $id_periodo){
              $asignaturasUltimoPeriodo[]= $matricula; 
            }
        }
        
        if($request->ajax()){
          
          $id_periodo= $request->get('idPeriodo');

          foreach ($matriculas as $matricula) {
            if($matricula->horario->PeriodoAcademicoId == $id_periodo){
              $asignaturas[]= $matricula; 
            }
          }
          
          return response()->json(view('admin.usuarios.part.asignaturasEstudiante',compact('asignaturas'))->render());  
        }
        
    return view('admin.usuarios.asignaturas.asignaturasEstudiante')->with('periodos',$periodos)->with('asignaturas',$asignaturasUltimoPeriodo);
    }    
}
