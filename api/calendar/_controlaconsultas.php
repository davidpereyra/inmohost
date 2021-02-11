<?php

include_once 'class/propiedades.php';

    function obtenerPropiedades(){
        $propiedades = new Propiedades();
        $citas = array();
        $res = $propiedades->getPropiedades();
        return $res;
    }    
?>