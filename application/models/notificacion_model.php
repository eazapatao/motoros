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
    function get_pagos($dia,$mes,$ano){
//clave es el día
        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );

        $query = $this->db->query("SELECT con_facturacion FROM control_adicional");

        foreach ($query->result_array() as $key){
            if (substr($key['con_facturacion'],0,2) < $dia and substr($key['con_facturacion'],3,2) == $mes and substr($key['con_facturacion'],6,4) == $ano){
                $clave2 = 30 - $dia;
                if($clave2+substr($key['con_facturacion'],0,2) <= 15  ){
                    $result["otros"]++;
                }elseif($clave2+substr($key['con_facturacion'],0,2) <= 2  ){
                    $result["dos"]++;
                }
            }elseif (substr($key['con_facturacion'],0,2) >= $dia){
                if(substr($key['con_facturacion'],0,2)-$dia > 0 && intval(substr($key['con_facturacion'],0,2))-$dia  <= 2  ){
                    $result["dos"]++;
                }elseif(substr($key['con_facturacion'],0,2)-$dia > 2 && substr($key['con_facturacion'],0,2)-$dia <= 29){
                    $result["otros"]++;
                }elseif(substr($key['con_facturacion'],0,2) == $dia) {
                    $result["hoy"]++;
                }
            }

        }
        return $result;

    }
    function get_suspenciones($dia,$mes,$ano){
//clave es el día
        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );

        $query = $this->db->query("SELECT con_suspencion FROM control_adicional");

        foreach ($query->result_array() as $key){
            if (substr($key['con_suspencion'],0,2) < $dia and substr($key['con_suspencion'],3,2) == $mes and substr($key['con_suspencion'],6,4) == $ano){
                $clave2 = 30 - $dia;
                if($clave2+substr($key['con_suspencion'],0,2) <= 15  ){
                    $result["otros"]++;
                }elseif($clave2+substr($key['con_suspencion'],0,2) <= 2  ){
                    $result["dos"]++;
                }
            }elseif (substr($key['con_suspencion'],0,2) >= $dia){
                if(substr($key['con_suspencion'],0,2)-$dia > 0 && intval(substr($key['con_suspencion'],0,2))-$dia  <= 2  ){
                    $result["dos"]++;
                }elseif(substr($key['con_suspencion'],0,2)-$dia > 2 && substr($key['con_suspencion'],0,2)-$dia <= 29){
                    $result["otros"]++;
                }elseif(substr($key['con_suspencion'],0,2) == $dia) {
                    $result["hoy"]++;
                }
            }

        }
        return $result;

    }
    function guardar_programarproxpago(){

        $data = array(
            "prox_cli_id" => $this->input->post("cliente"),
            "prox_lin_corte" => $this->input->post("corte"),
            "prox_fecha" => $this->input->post("fecha"),
            "prox_observaciones" => $this->input->post("observaciones"),
        );

        $this->db->insert("proxpago", $data);
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
    function  get_lista_suspenciones(){
        $clave = intval(date('d'));
        $mes = intval(date('m'));
        $ano = intval(date('Y'));


        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );

        $this->db->select('lin_numero,con_suspencion');
        $this->db->from('linea');
        $this->db->join('control_adicional','control_adicional.con_lin_id=linea.lin_id');

        $query = $this->db->get();
        // $query = $query->result_array();


        // $query = $this->db->query("SELECT lin_numero, con_valorapagar,con_facturacion FROM linea,control_adicional WHERE linea.lin_id = control_adicional.con_lin_id");
        foreach ($query->result_array() as $key){
            $temp=array(
                "lin_numero"=>$key['lin_numero'],
                "con_suspencion"=>$key['con_suspencion'],
            );
            if (substr($key['con_suspencion'],0,2) < $clave && substr($key['con_suspencion'],3,2) == $mes and substr($key['con_suspencion'],6,4) == $ano){
                $clave2 = 30 - $clave;
                if($clave2+substr($key['con_suspencion'],0,2) <= 15  ){

                    array_push($result["otros"], $temp);
                }elseif($clave2+substr($key['con_suspencion'],0,2) <= 2  ){
                    array_push($result["dos"], $temp);
                }
            }elseif (substr($key['con_suspencion'],0,2) >= $clave){
                if(substr($key['con_suspencion'],0,2)-$clave > 0 && intval(substr($key['con_suspencion'],0,2))-$clave  <= 2  ){
                    array_push($result["dos"], $temp);
                }elseif(substr($key['con_suspencion'],0,2)-$clave > 2 && substr($key['con_facturacion'],0,2)-$clave <= 29){
                    array_push($result["otros"],$temp);
                }elseif(substr($key['con_suspencion'],0,2) == $clave) {
                    array_push($result["hoy"], $temp);
                }
            }

        }
        return $result;
    }
    function  get_lista_simcard(){
        $clave = intval(date('d'));
        $mes = intval(date('m'));
        $ano = intval(date('Y'));


        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );

        $this->db->select('*');
        $this->db->from('devolucion_linea');
        $this->db->join('cliente','cliente.cli_id=devolucion_linea.dev_cli_id');
        $this->db->join('linea','linea.lin_id=devolucion_linea.dev_lin_id');
        $this->db->join('usuario','usuario.usu_id=devolucion_linea.dev_usu_id');

        $query = $this->db->get();
        // $query = $query->result_array();


        // $query = $this->db->query("SELECT lin_numero, con_valorapagar,con_facturacion FROM linea,control_adicional WHERE linea.lin_id = control_adicional.con_lin_id");
        foreach ($query->result_array() as $key){
            $temp=array(
                "cli_nombre"=>$key['cli_nombre'],
                "cli_apellido"=>$key['cli_apellido'],
                "lin_numero"=>$key['lin_numero'],
                "dev_fecha"=>$key['dev_fecha'],
                "usu_nombre"=>$key['usu_nombre'],
                "usu_apellido"=>$key['usu_apellido'],
            );
            if (substr($key['dev_fecha'],0,2) < $clave && substr($key['dev_fecha'],3,2) == $mes and substr($key['dev_fecha'],6,4) == $ano){
                $clave2 = 30 - $clave;
                if($clave2+substr($key['dev_fecha'],0,2) <= 15  ){

                    array_push($result["otros"], $temp);
                }elseif($clave2+substr($key['dev_fecha'],0,2) <= 2  ){
                    array_push($result["dos"], $temp);
                }
            }elseif (substr($key['dev_fecha'],0,2) >= $clave){
                if(substr($key['dev_fecha'],0,2)-$clave > 0 && intval(substr($key['dev_fecha'],0,2))-$clave  <= 2  ){
                    array_push($result["dos"], $temp);
                }elseif(substr($key['dev_fecha'],0,2)-$clave > 2 && substr($key['dev_fecha'],0,2)-$clave <= 29){
                    array_push($result["otros"],$temp);
                }elseif(substr($key['dev_fecha'],0,2) == $clave) {
                    array_push($result["hoy"], $temp);
                }
            }

        }
        return $result;
    }
    function  get_lista_pagosprogramados(){
        $clave = intval(date('d'));
        $mes = intval(date('m'));
        $ano = intval(date('Y'));


        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );

        $this->db->select('*');
        $this->db->from('proxpago');
        $this->db->join('cliente','cliente.cli_id=proxpago.prox_cli_id');

        $query = $this->db->get();
        // $query = $query->result_array();


        // $query = $this->db->query("SELECT lin_numero, con_valorapagar,con_facturacion FROM linea,control_adicional WHERE linea.lin_id = control_adicional.con_lin_id");
        foreach ($query->result_array() as $key){
            $temp=array(
                "cli_nombre"=>$key['cli_nombre'],
                "cli_apellido"=>$key['cli_apellido'],
                "prox_observaciones"=>$key['prox_observaciones'],
            );
            if (substr($key['dev_fecha'],0,2) < $clave && substr($key['dev_fecha'],3,2) == $mes and substr($key['dev_fecha'],6,4) == $ano){
                $clave2 = 30 - $clave;
                if($clave2+substr($key['dev_fecha'],0,2) <= 15  ){

                    array_push($result["otros"], $temp);
                }elseif($clave2+substr($key['dev_fecha'],0,2) <= 2  ){
                    array_push($result["dos"], $temp);
                }
            }elseif (substr($key['dev_fecha'],0,2) >= $clave){
                if(substr($key['dev_fecha'],0,2)-$clave > 0 && intval(substr($key['dev_fecha'],0,2))-$clave  <= 2  ){
                    array_push($result["dos"], $temp);
                }elseif(substr($key['dev_fecha'],0,2)-$clave > 2 && substr($key['dev_fecha'],0,2)-$clave <= 29){
                    array_push($result["otros"],$temp);
                }elseif(substr($key['dev_fecha'],0,2) == $clave) {
                    array_push($result["hoy"], $temp);
                }
            }

        }
        return $result;
    }
    function  get_simcard($dia,$mes,$ano){
        //clave es el día
        $result = array(
            "hoy" => 0,
            "dos" => 0,
            "otros" => 0
        );

        $query = $this->db->query("SELECT dev_fecha FROM devolucion_linea");

        foreach ($query->result_array() as $key){
            if (substr($key['dev_fecha'],0,2) < $dia and substr($key['dev_fecha'],3,2) == $mes and substr($key['dev_fecha'],6,4) == $ano){
                $clave2 = 30 - $dia;
                if($clave2+substr($key['dev_fecha'],0,2) <= 15  ){
                    $result["otros"]++;
                }elseif($clave2+substr($key['dev_fecha'],0,2) <= 2  ){
                    $result["dos"]++;
                }
            }elseif (substr($key['dev_fecha'],0,2) >= $dia){
                if(substr($key['dev_fecha'],0,2)-$dia > 0 && intval(substr($key['dev_fecha'],0,2))-$dia  <= 2  ){
                    $result["dos"]++;
                }elseif(substr($key['dev_fecha'],0,2)-$dia > 2 && substr($key['dev_fecha'],0,2)-$dia <= 29){
                    $result["otros"]++;
                }elseif(substr($key['dev_fecha'],0,2) == $dia) {
                    $result["hoy"]++;
                }
            }

        }
        return $result;
    }
    function  get_lista_cortes_only(){
        $fecha=date('d');

        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('alquiler', 'alquiler.alq_cli_id = cliente.cli_id');
        $this->db->join('historialinea', 'historialinea.his_alq_id = alquiler.alq_id');
        $this->db->join('linea', 'linea.lin_id = historialinea.his_lin_id');

        $this->db->where('lin_corte',$fecha);
        $query = $this->db->get();


        return $query->result_array();


    }
    function  get_lista_devolucion(){
        $clave = intval(date('d'));


        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );

        $query = $this->db->query("SELECT * FROM devolucion_linea");

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

    function  get_lista_facturaciones(){
        $clave = intval(date('d'));
        $mes = intval(date('m'));
        $ano = intval(date('Y'));


        $result = array(
            "hoy" => array(),
            "dos" => array(),
            "otros" => array()
        );

        $this->db->select('lin_numero, con_valorapagar,con_facturacion,');
        $this->db->from('control_adicional');
        $this->db->join('linea','linea.lin_id=control_adicional.con_lin_id');
        $query = $this->db->get();
        // $query = $query->result_array();


        // $query = $this->db->query("SELECT lin_numero, con_valorapagar,con_facturacion FROM linea,control_adicional WHERE linea.lin_id = control_adicional.con_lin_id");
        foreach ($query->result_array() as $key){

            $temp=array(
                "lin_numero"=>$key['lin_numero'],
                "con_valorapagar"=>$key['con_valorapagar']

            );
            if (substr($key['con_facturacion'],0,2) < $clave && substr($key['con_facturacion'],3,2) == $mes and substr($key['con_facturacion'],6,4) == $ano){
                $clave2 = 30 - $clave;
                if($clave2+substr($key['con_facturacion'],0,2) <= 15  ){

                    array_push($result["otros"], $temp);
                }elseif($clave2+substr($key['con_facturacion'],0,2) <= 2  ){
                    array_push($result["dos"], $temp);
                }
            }elseif (substr($key['con_facturacion'],0,2) >= $clave){
                if(substr($key['con_facturacion'],0,2)-$clave > 0 && intval(substr($key['con_facturacion'],0,2))-$clave  <= 2  ){
                    array_push($result["dos"], $temp);
                }elseif(substr($key['con_facturacion'],0,2)-$clave > 2 && substr($key['con_facturacion'],0,2)-$clave <= 29){
                    array_push($result["otros"],$temp);
                }elseif(substr($key['con_facturacion'],0,2) == $clave) {
                    array_push($result["hoy"], $temp);
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
            $this->db->select('estcue_debe,estcue_id');
            $this->db->where('estcue_alq_id', $key['id_alq']);
            $query = $this->db->get('estadocuenta');
            $query = $query->result_array();
            $estadocuenta = $query[0]['estcue_id'];
            $debe = $query[0]['estcue_debe'];
            $debe +=  $key['cargo_basico'];
            $cliente=$this->obtenercliente($key['id_alq']);
            $dato= array(
                "estcue_debe" => $debe
            );
            $this->db->where("estcue_alq_id", $key['id_alq']);
            $this->db->update('estadocuenta', $dato);


 //           $fecha=date("d-m-Y");
   //        $data1 = array(
     //          "estcuefec_estcue_id" =>  $estadocuenta,
       //         "estcuefec_estcue_debe" => $debe,
         //      "estcuefec_estcue_abono" => 0,
           //     "estcuefec_estcue_saldo" => 0,
             //  "estcuefec_fecha" => $fecha,
               // "estcuefec_cli_id" => $cliente
     //       );

//            $this->db->insert("estadocuenta_fecha", $data1);
        }
    }

    function obtenercliente($alquiler)
    {
        $this->db->select('cli_id');
        $this->db->from('cliente');
        $this->db->join('alquiler','alquiler.alq_cli_id=cliente.cli_id');
        $this->db->join('estadocuenta','estadocuenta.estcue_alq_id=alquiler.alq_id');
        $this->db->where('estcue_alq_id',$alquiler);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['cli_id'];
    }

function vlrapagar()
{
    $dia=date('d');
    $mes=date('m');
    $ano=date('Y');

    $query = "SELECT sum(con_valorapagar) as total_deben FROM control_adicional WHERE detban_transaccion = 'Ingreso' AND detban_ban_id='1'";
    $result = $this->db->query($query);

    $deben =  $result->result_array();

    $deben = $deben[0]['total_deben'];


    $query = "SELECT sum(detban_valor) as total_haber FROM detalle_banco WHERE detban_transaccion = 'Egreso' AND detban_ban_id='1'";
    $result = $this->db->query($query);

    $haber =  $result->result_array();

    $haber = $haber[0]['total_haber'];

    $total = array (
        "debeb" => $deben,
        "haberb" => $haber,
        "deferenciab" => $deben - $haber
    );

    return $total;
}

function get_lista_proxpago()
    {
        $mes=date('m');
        $ano=date('Y');
        $sql = "SELECT * FROM proxpago JOIN cliente ON cliente.cli_id=proxpago.prox_cli_id
        WHERE SUBSTRING(prox_fecha,4,2) = '$mes' AND SUBSTRING(prox_fecha,7,4) = '$ano'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

}