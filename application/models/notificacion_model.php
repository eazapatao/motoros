<?php

class Notificacion_model extends CI_Model{

    function get_cortes($clave){
        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );
        $query = $this->db->query("SELECT lin_numero, lin_corte FROM linea WHERE lin_estado = 'Alquilada' ");
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

    function get_pagos($clave){
        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );
        $query = $this->db->query("SELECT lin_numero, lin_corte FROM linea WHERE lin_estado = 'Alquilada' ");
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



    function  get_lista_cortes(){
        $clave = intval(date('d'));
        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );
        $query = $this->db->query("SELECT lin_id, lin_numero, lin_corte FROM linea WHERE lin_estado = 'Alquilada' ");
        foreach ($query->result_array() as $key){
            if ($key['lin_corte'] < $clave){
                $clave2 = 30 - $clave;
                if($clave2+$key['lin_corte'] <= 15  ){
                    array_push($result["otros"], $this->get_cliente_linea_id($key['lin_id'], $key['lin_numero']));
                }elseif($clave2+$key['lin_corte'] <= 2  ){
                    array_push($result["dos"], $this->get_cliente_linea_id($key['lin_id'], $key['lin_numero']));
                }
            }elseif ($key['lin_corte'] >= $clave){
                if($key['lin_corte']-$clave > 0 && intval($key['lin_corte'])-$clave  <= 2  ){
                    array_push($result["dos"], $this->get_cliente_linea_id($key['lin_id'], $key['lin_numero']));
                }elseif($key['lin_corte']-$clave > 2 && $key['lin_corte']-$clave <= 29){
                    array_push($result["otros"], $this->get_cliente_linea_id($key['lin_id'], $key['lin_numero']));
                }elseif($key['lin_corte'] == $clave) {
                    array_push($result["hoy"], $this->get_cliente_linea_id($key['lin_id'], $key['lin_numero']));
                }
            }
        }
        return $result;
    }

    function get_cliente_linea_id($lin_id, $lin_num){
        $this->db->select('his_alq_id');
        $this->db->where("his_lin_id", $lin_id);
        $this->db->where("his_estado", "Activo");
        $query = $this->db->get('historialinea');
        $query = $query->result_array();
        $this->db->select('alq_cli_id');
        $this->db->where("alq_id", $query[0]['his_alq_id']);
        $query = $this->db->get('alquiler');
        $query = $query->result_array();
        $this->db->select('cli_nombre, cli_apellido, cli_telefono, cli_celular');
        $this->db->where("cli_id", $query[0]['alq_cli_id']);
        $query = $this->db->get('cliente');
        $result = $query->result_array();
        $result['lin_num'] = $lin_num;
        return $result;
    }


    function get_corte_hoy($dia)
    {
        $query = $this->db->query("SELECT lin_id, lin_corte FROM linea WHERE lin_estado = 'Alquilada' AND lin_corte = $dia ");
        $query = $query->result_array();
        $result = array();
        foreach ($query as $key) {
            $lin_id = $key['lin_id'];
            $cargo = $this->db->query("SELECT his_cargobasico, his_alq_id
                                        FROM historialinea WHERE his_lin_id = $lin_id AND his_estado = 'Activo' ");
            $cargo = $cargo->result_array();
            $result[$lin_id] = array(
                "cargo_basico" => $cargo[0]['his_cargobasico'],
                "id_alq" => $cargo[0]['his_alq_id'],
            );
        }
        foreach ($result as $key) {
            $this->db->select('estcue_debe');
            $this->db->where('estcue_alq_id', $key['id_alq']);
            $query = $this->db->get('estadocuenta');
            $query = $query->result_array();
            $debe = $query[0]['estcue_debe'];
            $debe +=  $key['cargo_basico'];
            $dato= array(
                "estcue_debe" => $debe
            );
            $this->db->where("estcue_alq_id", $key['id_alq']);
            $this->db->update('estadocuenta', $dato);
        }
    }
}