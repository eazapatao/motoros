<?php

class Notificacion_model extends CI_Model{

    function get_cortes($clave){

        $result = array(
            "5" => array(),
            "10" => array(),
            "15" => array()
        );

        $query = $this->db->query('SELECT lin_numero, lin_corte FROM linea');

        foreach ($query->result_array() as $key){
            if($key['lin_corte']+$clave <= 5){
                array_push($result[5], $key);
            }elseif($key['lin_corte']+$clave > 5 && $key['lin_corte']+$clave <= 10){
                array_push($result[10], $key);
            }elseif($key['lin_corte']+$clave > 10 && $key['lin_corte']+$clave <= 15){
                array_push($result[15], $key);
            };
        }

        return $result;

    }

}