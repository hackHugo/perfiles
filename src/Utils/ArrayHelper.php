<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/08/2018
 * Time: 05:51 PM
 */

namespace fmelchor\perfiles\Utils;


class ArrayHelper
{
    /*
    Realiza una busqueda en un arreglo enviandole el atributo en el cual se buscara
    */
    public static function BuscaEnArregloPorAtributo($arreglo,$valor,$atributo){

        foreach($arreglo as $elemento)
        {
            //si se encuentra el valor en el elemento regresamos true
            if($elemento[$atributo]==$valor){
                return true;
            }
        }
        return false;
    }

    /*
    Regresa la cantidad total de los elementos encontrados bajo un criterio recibiendo un valor  y atributo
    */
    public static function ObtieneCantidadElementosPorValorABuscar($arreglo,$valor,$atributo){


        $cantidad=0;
        foreach($arreglo as $elemento)
        {
            echo $valor;
            //si se encuentra el valor en el elemento regresamos true
            if($elemento[$atributo]==$valor){
                $cantidad++;
            }
        }
        return $cantidad;
    }
}
