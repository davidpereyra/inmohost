<?php
include_once '../../config/conecBD.php';
class Propiedades extends DB{
    
    function getPropiedades(){      
        $query = $this->connect()->query("SELECT DISTINCT * FROM propiedades WHERE propiedades.prp_mostrar = 1;");
        return $query;
    }
    

}

?>