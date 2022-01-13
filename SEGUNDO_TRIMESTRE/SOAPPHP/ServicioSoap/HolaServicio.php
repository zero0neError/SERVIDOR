<?php
require_once "../BD.php";
class HolaServicio
{
    
   /**
     * @soap
     * @param int $posicion
     * @return string
     */
    public function traeUsuarios($posicion){

        return BD::traeUsuarios()[$posicion]->nombre;       
        
    }


    /**
     * @soap
     * @param int $a
     * @param int $b
     * @return int
     */
    public function resta($a,$b){

        return $a - $b;
        
    }

    /**
     * @soap
     * @param int $a
     * @param int $b
     * @return int
     */
    public function suma($a,$b){

        return $a + $b;
        
    }


}
