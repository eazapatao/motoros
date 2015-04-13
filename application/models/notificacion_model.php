<?php

class Notificacion_model extends CI_Model{

    function get_cortes($clave){

        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );

        $query = $this->db->query('SELECT lin_numero, lin_corte FROM linea');

        foreach ($query->result_array() as $key){
            if ($key['lin_corte'] < $clave){
                $clave2 = 30 - $clave;
                if($clave2+$key['lin_corte'] <= 15  ){
                    $result["otros"]++;
                }elseif($clave2+$key['lin_corte'] <= 2  ){
                    $result["dos"]++;
                }
            }elseif ($key['lin_corte'] >= $clave){
                if($key['lin_corte']-$clave > 0 && intval($key['lin_corte'])-$clave  <= 2  ){
                    $result["dos"]++;
                }elseif($key['lin_corte']-$clave > 2 && $key['lin_corte']-$clave <= 29){
                    $result["otros"]++;
                }elseif($key['lin_corte'] == $clave) {
                    $result["hoy"]++;
                }
            }

        }
        return $result;

    }

}