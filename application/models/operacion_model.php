<?php

class operacion_model extends CI_Model{


    function get_lista_operacion(){
        $this->db->select('*');
        $this->db->from('operacion');
        $this->db->join('cliente', 'cliente.cli_id = operacion.ope_cli_id');
        $this->db->join('usuario', 'usuario.usu_id = operacion.ope_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_info_operacion($id){
        $this->db->select('*');
        $this->db->from('operacion');
        $this->db->where('ope_id', $id);
        $this->db->join('cliente', 'cliente.cli_id = operacion.ope_cli_id');
        $this->db->join('usuario', 'usuario.usu_id = operacion.ope_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function guardar_operacion(){
        $data = array(
            "ope_cli_id" => $this->input->post("cliente"),
            "ope_usu_id" => $this->input->post("usuario"),
            "ope_tipo" => $this->input->post("tipo"),
            "ope_valor" => $this->input->post("valor"),
            "ope_fecha" => $this->input->post("fecha"),
            "ope_nfactura" => $this->input->post("nfactura"),
            "ope_observaciones" => $this->input->post("observaciones")
        );
        $this->db->insert("operacion", $data);


        $alquiler = $this->obtener_alquiler($this->input->post("cliente"));
        $debe = $this->obtener_debe( $alquiler[0]['alq_id']);
        $abono = $this->obtener_abono( $alquiler[0]['alq_id']);
        print_r($alquiler);


       if($this->input->post("tipo")== "Ingreso Cliente")
        {

            $data1 = array(
                "estcue_abono" =>  $this->input->post("valor") + $abono[0]['estcue_abono'],
                "estcue_saldo" =>  $debe[0]['estcue_debe'] - ($this->input->post("valor")+$abono[0]['estcue_abono']),

            );

            $this->db->where("estcue_alq_id", $alquiler[0]['alq_id']);
            $this->db->update('estadocuenta', $data1);
        }

    }

    function obtener_alquiler($cliente)
    {
        $this->db->select('alq_id');
        $this->db->from('alquiler');
        $this->db->where('alq_cli_id', $cliente);

        $query = $this->db->get();
        return $query->result_array();
    }
    function obtener_debe($alquiler)
    {
        $this->db->select('estcue_debe');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id', $alquiler);

        $query = $this->db->get();
        return $query->result_array();
    }
    function obtener_abono($alquiler)
    {
        $this->db->select('estcue_abono');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id', $alquiler);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_operacion($id){
        $query = $this->db->get_where('operacion', array('ope_id' => $id));

        return $query->result_array();

    }

    function get_totales_operacion()
    {
        $query = "SELECT sum(ope_valor) as total_deben FROM operacion
 WHERE ope_tipo = 'Ingreso Cliente'
OR ope_tipo = 'Ingreso Prestamo'
OR ope_tipo = 'Ingreso Tarjeta de credito'
OR ope_tipo = 'Ingreso Caja fuerte'
 OR ope_tipo = 'Ingreso Cargo'
  OR ope_tipo = 'Ingreso otros'";
        $result = $this->db->query($query);

        $deben =  $result->result_array();

        $deben = $deben[0]['total_deben'];


        $query = "SELECT sum(ope_valor) as total_haber FROM operacion
WHERE ope_tipo = 'Egreso Cliente'
OR ope_tipo = 'Egreso Préstamo'
OR ope_tipo = 'Egreso Tarjeta de credito'
OR ope_tipo = 'Egreso Caja fuerte'
 OR ope_tipo = 'Egreso Nómina'
OR ope_tipo = 'Egreso Servicios'
   OR ope_tipo = 'Egreso Alejandro'
   OR ope_tipo = 'Egreso Bienes raices'
   OR ope_tipo = 'Egreso Papelería'
   OR ope_tipo = 'Egreso Gasolina'
   OR ope_tipo = 'Egreso Publicidad'
   OR ope_tipo = 'Egreso otros'

  ";
        $result = $this->db->query($query);

        $haber =  $result->result_array();

        $haber = $haber[0]['total_haber'];

        $total = array (
            "debe" => $deben,
            "haber" => $haber,
            "deferencia" => $deben - $haber
        );

        return $total;
    }

    function upd_operacion()
    {
        $data = array(
            "ope_cli_id" => $this->input->post("cliente"),
            "ope_usu_id" => $this->input->post("usuario"),
            "ope_tipo" => $this->input->post("tipo"),
            "ope_valor" => $this->input->post("valor"),
            "ope_fecha" => $this->input->post("fecha"),
            "ope_nfactura" => $this->input->post("nfactura"),
            "ope_observaciones" => $this->input->post("observaciones")
        );

        $this->db->where("ope_id", $this->input->post("ope_id"));
        $this->db->update('operacion', $data);
    }

    function del_operacion($id)
    {

        $this->db->where("ope_id", $id);
        $this->db->delete('operacion');

    }


}