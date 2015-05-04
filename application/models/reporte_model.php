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
        $this->db->select('sal_saldo');
            $this->db->from('saldos');
            $this->db->where('sal_fecha', $fechahoy);
            $query = $this->db->get();
            $result=$query->result_array();

        return $result;
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