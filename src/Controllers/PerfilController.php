<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 14/08/2018
 * Time: 06:13 PM
 */

namespace fmelchor\perfiles\Controllers;
use App\Http\Controllers\Controller;
use fmelchor\perfiles\Models\Cmodule;
use fmelchor\perfiles\Models\Coperation;
use fmelchor\perfiles\Models\Cprofile;
use fmelchor\perfiles\Models\CprofileOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class PerfilController extends Controller
{
    public function index()
    {
        $oProfiles = Cprofile::paginate(10);
        return  view('profiles::index',array('oProfiles'=>$oProfiles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = CModule::with('Coperacion')->get();
        return view('profiles::create',array('modules'=>$modules));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oPerfil = new Cprofile();
        $oPerfil->name = $request->name;
        $oPerfil->save();
        CprofileOperation::where('id_profile', '=', $oPerfil->id)->delete();
        if($request->idOperation != null) {
            foreach ($request->idOperation as $key) {
                $perfilOpercion = new CprofileOperation();
                $perfilOpercion->id_profile = $oPerfil->id;
                $perfilOpercion->id_operation = $key;
                $perfilOpercion->save();
            }
        }
        Session::flash('message', 'Tus datos fueron insertados correctamente');
        return Redirect::route('perfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Cprofile::findOrFail($id);
        $modules = Cmodule::with('Coperacion')->get();
        $rol = CprofileOperation::where('id_profile','=',$profile->id)->get();
        return view('profiles::edit', array('profile'=>$profile,'modules'=>$modules,'rol'=>$rol));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perfil = Cprofile::findOrFail($id);
        $perfil->name = $request->name;
        $perfil->save();
        CprofileOperation::where('id_profile', '=', $perfil->id)->delete();
        if($request->idOperation != null) {
            foreach ($request->idOperation as $key) {
                $perfilOpercion = new CprofileOperation();
                $perfilOpercion->id_profile = $perfil->id;
                $perfilOpercion->id_operation = $key;
                $perfilOpercion->save();
            }
        }
        $mesage = 'El perfil '.$perfil->name.' fue editado';
        if ($request->ajax()) {
            return $mesage;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function permisos($id)
    {
        $modulos = Cmodule::with('Coperacion')->get();
        $perfil = Cprofile::findOrFail($id);

        return view('Perfil.createPermisos', compact('modulos', 'perfil'));
    }
    public function createPermisos(Request $request)
    {
        CprofileOperation::where('idPerfil', '=', $request->idPerfil)->delete();
        foreach ($request->idOperacion as $key) {
            $perfilOpercion = new CprofileOperation();
            $perfilOpercion->idPerfil = $request->idPerfil;
            $perfilOpercion->idOperacion = $key;
            $perfilOpercion->save();
        }

        Session::flash('message', 'Tus permisos de perfil fueron creados correctamente');

        return Redirect::route('admin.perfil.index');
    }

    public function destroy(Request $request, $id)
    {
        $perfil = Cprofile::find($id);
        CprofileOperation::where('id_profile', '=', $perfil->id)->delete();
        $perfil->delete();
        $mesage = 'El perfil '.$perfil->name.' fue eliminado';
        if ($request->ajax()) {
            return $mesage;
        } else {
            return Redirect::route('perfil.index');
        }
    }
}
