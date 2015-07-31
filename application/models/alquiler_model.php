<?php

class alquiler_model extends CI_Model{


    function get_lista_alquiler(){

        $this->db->select('*');
        $this->db->from('alquiler');
        $this->db->join('cliente', 'cliente.cli_id = alquiler.alq_cli_id');
        $query = $this->db->get();
        return $query->result_array();


    }
    function get_info_alquiler($id){
        $this->db->select('*');
        $this->db->from('alquiler');
        $this->db->where('alq_id', $id);
        $this->db->join('cliente', 'cliente.cli_id = alquiler.alq_cli_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function guardar_alquiler(){
//verificar funcion que envia parametro de id de alquiler para relacionar una nueva linea a ese alquiler
        $data = array(
            "alq_cli_id" => $this->input->post("cliente"),
            "alq_observaciones" => $this->input->post("observaciones"),
            "alq_tipo" => $this->input->post("tipo"),
            "alq_fecha" => $this->input->post("fecha"),
            "alq_fechafin" => $this->input->post("fechafin"),
        );

        $this->db->insert("alquiler", $data);

        $last = $this->db->insert_id();
        $verificarexistencia = $this->verificarexistencia();

        if($verificarexistencia==0)
        {

         return $last;
        }
        else
        {
            $this->db->select('alq_id');
            $this->db->from('alquiler');
            $this->db->where('alq_cli_id', $this->input->post("cliente"));
            $query = $this->db->get();
            $result = $query->result_array();

            $this->db->where('alq_id', $last);
            $this->db->delete('alquiler');
            return $result[0]['alq_id'];
        }
    }
function verificarexistencia()
{
    $sql = "SELECT alq_cli_id, count(alq_cli_id) FROM alquiler GROUP BY alq_cli_id HAVING count(alq_cli_id) > 1 ";
    $result = mysql_query($sql);
    $numero = mysql_num_rows($result);
    return $numero;
}
    function get_alquiler($id){

        $query = $this->db->get_where('alquiler', array('alq_id' => $id));

        return $query->result_array();

    }

    function upd_alquiler()
    {
        $data = array(
            "alq_cli_id" => $this->input->post("cliente"),
            "alq_observaciones" => $this->input->post("observaciones"),
            "alq_tipo" => $this->input->post("tipo"),
            "alq_fecha" => $this->input->post("fecha"),
            "alq_fechafin" => $this->input->post("fechafin"),
        );

        $this->db->where("alq_id", $this->input->post("alq_id"));
        $this->db->update('alquiler', $data);
    }
    function upd_adddatos()
    {
        // hacer insercion $debef = $this->obtenerdebe_estadocuentaf();
        $alquiler = $this->obtener_alquiler($this->input->post("cliente"));
        $debe = $this->obtenerdebe_estadocuenta($alquiler);
        $cargobasico = $this->obtener_cargobasico($alquiler);
        $preciodatos=$this->obtener_preciodatos($this->input->post("datos"));
        $estadocuenta=$this->obtener_estadocuenta($alquiler);
        $add="Agregar datos";
        $dell="Quitar datos";
        if($this->input->post("opcion")==$add)
        {
            //actualizar historialinea
            $data = array(

                "his_dat_id" => $this->input->post("datos"),
                "his_cargobasico" => $cargobasico+$preciodatos,
            );

            $this->db->where("his_alq_id",$alquiler);
            $this->db->update('historialinea', $data);
            //actualizar estadocuenta
            $data = array(
                "estcue_debe" => $debe+$preciodatos,
                "estcue_saldo" => $debe+$preciodatos,

            );

            $this->db->where("estcue_alq_id",$alquiler);
            $this->db->update('estadocuenta', $data);
            //insertar en estado cuenta fecha
            $fecha=date("d-m-Y");
            $data1 = array(
                "estcuefec_estcue_id" =>  $estadocuenta,
                "estcuefec_cli_id" => $this->input->post("cliente"),
                "estcuefec_estcue_debe" => $preciodatos,
                "estcuefec_estcue_abono" => 0,
                "estcuefec_estcue_saldo" => 0,
                "estcuefec_fecha" => $fecha,

            );
            $this->db->insert("estadocuenta_fecha", $data1);
        }
        else
        {
            //actualizar historialinea
            $data = array(

                "his_dat_id" => $this->input->post("datos"),
                "his_cargobasico" => $cargobasico-$preciodatos,
            );

            $this->db->where("his_alq_id",$alquiler);
            $this->db->update('historialinea', $data);

        }


    }
    function obtener_alquiler($cliente)
    {
        $this->db->select('alq_id');
        $this->db->from('alquiler');
        $this->db->where('alq_cli_id',$cliente);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['alq_id'];
    }  function obtener_estadocuenta($alquiler)
    {
        $this->db->select('estcue_id');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id',$alquiler);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['estcue_id'];
    }
    function obtenerdebe_estadocuenta($alquiler)
    {
        $this->db->select('estcue_debe');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id',$alquiler);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['estcue_debe'];
    }
    function obtener_cargobasico($alquiler)
    {
        $this->db->select('his_cargobasico');
        $this->db->from('historialinea');
        $this->db->where('his_alq_id',$alquiler);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['his_cargobasico'];
    }
    function obtener_preciodatos($datos)
    {
        $this->db->select('dat_precio');
        $this->db->from('datos');
        $this->db->where('dat_id',$datos);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['dat_precio'];
    }

    function del_alquiler($id)
    {

        $this->db->where("alq_id", $id);
        $this->db->delete('alquiler');

    }



}