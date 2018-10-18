<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 17/10/2018
 * Time: 07:01 PM
 */
namespace fmelchor\perfiles\Middleware;
use fmelchor\perfiles\Models\Cmodule;
use fmelchor\perfiles\Models\Coperation;
use fmelchor\perfiles\Models\Cprofile;
use fmelchor\perfiles\Models\CprofileOperation;
use Closure;
class RoleMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param $idModule
     * @param $idOperacion
     * @return \Illuminate\Http\Response|mixed
     */
    public function handle($request, Closure $next, $idModule, $idOperacion)
    {
        $user = $request->user();
        $oPerfilOperation = CprofileOperation::where(['idProfile' => $user->idProfile, 'idOperation' => $idOperacion])->first();
        if ($oPerfilOperation) {
            return $next($request);
        }
        $nameOperation = $this->getNameOperation($idOperacion);
        $nameModule = $this->getNameModule($idModule);
        if($request->ajax()){
             response()->json(['status'=>0,'message'=>'no tienes autorizacion para realizar esta accion','data'=>['nameOperation' => $nameOperation, 'nameModule' => $nameModule]]);
        }else {
            return response()->view('errors.401', array('nameOperation' => $nameOperation, 'nameModule' => $nameModule));
        }
    }

    /**
     * @param $idOperacion
     * @return string
     */
    public function getNameOperation($idOperacion)
    {
        $nombreOperacion = Coperation::where('id', $idOperacion)->first();
        if ($nombreOperacion) {
            return $nombreOperacion->name;
        } else {
            return $nombreOperacion = "";
        }

    }

    /**
     * @param $idModulo
     * @return string
     */
    public function getNameModule($idModulo)
    {
        $nombreModulo = Cmodule::where('id', $idModulo)->first();
        if ($nombreModulo) {
            return $nombreModulo->name;
        } else {
            return $nombreModulo = "";
        }
    }
}
