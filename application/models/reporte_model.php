<?php

class Reporte_model extends CI_Model{


    function get_lista_estadocuentas(){
        $this->db->select('*');
        $this->db->from('estadocuenta');
        $this->db->join('alquiler', 'alquiler.alq_id = estadocuenta.estcue_alq_id');
        $this->db->join('cliente', 'cliente.cli_id = alquiler.alq_cli_id');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_lista_informesdiarios(){
        $this->db->select('*');
        $this->db->from('operacion');
        $this->db->join('informediario', 'informediario.inf_ope_id = operacion.ope_id');
        $this->db->join('cliente', 'cliente.cli_id = operacion.ope_cli_id');
        $this->db->join('usuario', 'usuario.usu_id = operacion.ope_usu_id');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_sumasaldo_ayer()
    {
        $query = "SELECT sum(detban_valor) as total_deben FROM detalle_banco WHERE detban_transaccion = 'Ingreso' AND detban_ban_id='1'";
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

    function get_sumasaldo_hoy()
    {

    }
}