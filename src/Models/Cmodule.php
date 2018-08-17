<?php

namespace fmelchor\perfiles\Models;

use Illuminate\Database\Eloquent\Model;

class Cmodule extends Model
{
    protected $table = 'c_module';
    public function Coperacion(){
        return $this->hasMany("fmelchor\perfiles\Models\Coperation","id_module","id");  //primer campo: nombre de clase, segundo: id que no es de este modelo, tecer: campo de este modelo
    }
}
