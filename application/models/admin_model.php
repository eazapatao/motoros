<?php

class Admin_model extends CI_Model{


    function get_totales_mes($dia,$mes,$ano)
    {
        $fecha=$dia+'-'+$mes+'-'+$ano;

        $query = "SELECT sum(ope_valor) as total_deben FROM operacion WHERE ope_tipo = 'Ingreso Cliente'
        OR ope_tipo = 'Ingreso Paga diario' OR ope_tipo = 'Ingreso Préstamo'
        OR ope_tipo = 'Ingreso Tarjeta de credito'
        OR ope_tipo = 'Ingreso Caja fuerte'
        OR ope_tipo = 'Ingreso Cargo'
        OR ope_tipo = 'Ingreso otros'
        AND ope_fecha =$fecha
        ";
        $result = $this->db->query($query);

        $deben =  $result->result_array();

        $deben = $deben[0]['total_deben'];


        $query = "SELECT sum(ope_valor) as total_haber FROM operacion WHERE
         ope_tipo = 'Egreso Cliente' OR ope_tipo = 'Egreso Préstamo'
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
        AND ope_fecha =$fecha
        ";
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


}