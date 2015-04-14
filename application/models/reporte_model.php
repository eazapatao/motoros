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

    function get_sumasaldo_totales_hoy()
    {
        $fechahoy = date("d-m-Y");
        $query = "SELECT sum(inf_entra) as total_entra FROM informediario JOIN operacion ON operacion.ope_id=informediario.inf_ope_id WHERE operacion.ope_fecha = '$fechahoy'";
        $result = $this->db->query($query);

        $entran =  $result->result_array();

        $entran = $entran[0]['total_entra'];


        $query = "SELECT sum(inf_sale) as total_sale FROM informediario JOIN operacion ON operacion.ope_id=informediario.inf_ope_id WHERE operacion.ope_fecha = '$fechahoy'";
        $result = $this->db->query($query);

        $salen =  $result->result_array();

        $salen = $salen[0]['total_sale'];

        $total = array (
            "entra" => $entran,
            "sale" => $salen,
            "saldo" => $entran - $salen,

        );

        return $total;
    }

    function get_sumasaldo_totales_ayer()
    {
        $fechahoy = date("d-m-Y",time()-86400);
        $query = "SELECT sum(inf_entra) as total_entra FROM informediario JOIN operacion ON operacion.ope_id=informediario.inf_ope_id WHERE operacion.ope_fecha = '$fechahoy'";
        $result = $this->db->query($query);

        $entran =  $result->result_array();

        $entran = $entran[0]['total_entra'];


        $query = "SELECT sum(inf_sale) as total_sale FROM informediario JOIN operacion ON operacion.ope_id=informediario.inf_ope_id WHERE operacion.ope_fecha = '$fechahoy'";
        $result = $this->db->query($query);

        $salen =  $result->result_array();

        $salen = $salen[0]['total_sale'];

        $total = array (
            "entra" => $entran,
            "sale" => $salen,
            "saldo" => $entran - $salen,
        );


                return $total;
    }

    function calcular_saldo()
    {
        $ayer=$this->get_sumasaldo_totales_ayer();
        $hoy=$this->get_sumasaldo_totales_hoy();

        $saldoactual=$ayer['saldo']+$hoy['entra']-$hoy['sale'];
        return $saldoactual;

    }
    function get_sumasaldo_hoy()
    {

    }
}