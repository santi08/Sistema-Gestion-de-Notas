<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\ModelosNotas\Estudiante;
use App\ModelosNotas\Matricula;
use App\ModelosSCAD\Horario; 
use App\ModelosSCAD\Periodoacademico; 
use App\ModelosSCAD\Programaacademico;
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
        $periodos = Periodoacademico::orderBy('Id','DESC')->get();
        $id_estudiante = $request->id;
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
              $asignaturasUltimoPeriodo[]= array('nombre_asignatura' => $matricula->horario->programaAcademicoAsignatura->asignatura->Nombre,'matricula_id'=>$matricula->id,'definitiva'=>$matricula->definitiva);
            }
        }
        
         return response()->json(compact('asignaturasUltimoPeriodo'));
   
    }

    public function notas_asignatura(Request $request){

        $id_matricula= $request->matricula;
        $matricula= Matricula::find($id_matricula);

        $notas_matricula = array();
        $notas_item = array();
        
        if(count($matricula->items) > 0){
            foreach ($matricula->items as $item){
              if(!is_null($item->pivot->nota)){
                 $notas_item = ['nombre_item' => $item->nombre, 'nota' => $item->pivot->nota,'item_id'=>$item->id];
              }else{
                $notas_item = ['nombre_item' => $item->nombre, 'nota' => 'NR','item_id'=>$item->id];
              }
              
                $notas_matricula[]= $notas_item;
            }
        }
        
        return response()->json(compact('notas_matricula'));
    }
    
}
