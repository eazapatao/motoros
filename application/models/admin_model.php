<?php

class Admin_model extends CI_Model{


    function get_totales_mes($dia,$mes,$ano)
    {


        $query = "SELECT sum(ope_valor) as total_deben, ope_fecha FROM operacion WHERE ope_tipo = 'Ingreso Cliente'
        OR ope_tipo = 'Ingreso Paga diario' OR ope_tipo = 'Ingreso Préstamo'
        OR ope_tipo = 'Ingreso Tarjeta de credito'
        OR ope_tipo = 'Ingreso Caja fuerte'
        OR ope_tipo = 'Ingreso Cargo'
        OR ope_tipo = 'Ingreso otros'
        AND substr(ope_fecha,3,2)=$mes
        AND substr(ope_fecha,6,4)=$ano
        ";
        $result = $this->db->query($query);

        $deben =  $result->result_array();

        $deben = $deben[0]['total_deben'];


        $query = "SELECT sum(ope_valor) as total_haber, ope_fecha FROM operacion WHERE
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
         AND substr(ope_fecha,3,2)=$mes
        AND substr(ope_fecha,6,4)=$ano
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

    function get_totales_mes_cliente()
    {
        $mes=date('m');
        $ano=date('Y');
        $query = "SELECT sum(ope_valor) as total_deben
        FROM operacion
        WHERE ope_tipo = 'Ingreso Cliente'
        AND SUBSTRING(ope_fecha,4,2) = '$mes' AND SUBSTRING(ope_fecha,7,4) = '$ano'";
        $result = $this->db->query($query);
        $deben =  $result->result_array();
        $deben = $deben[0]['total_deben'];
        $query = "SELECT sum(ope_valor) as total_haber
        FROM operacion
        WHERE ope_tipo = 'Egreso Cliente'
        AND SUBSTRING(ope_fecha,4,2) = '$mes' AND SUBSTRING(ope_fecha,7,4) = '$ano'
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
    function get_totales_facturacionesoperadorcliente()
    {
        $mes=date('m');
        $ano=date('Y');
        $query = "SELECT sum(con_valorapagar) as total_deben
        FROM control_adicional
        WHERE SUBSTRING(con_facturacion,4,2) = '$mes' AND SUBSTRING(con_facturacion,7,4) = '$ano'";
        $result = $this->db->query($query);
        $deben =  $result->result_array();
        $deben = $deben[0]['total_deben'];

        $query = "SELECT sum(his_cargobasico) as total_haber
        FROM historialinea
        WHERE his_estado = 'Activo'

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

    function get_totales_mes_papeleria()
    {
        $mes=date('m');
        $ano=date('Y');
        $query = "SELECT sum(ope_valor) as total_deben
        FROM operacion
        WHERE ope_tipo = 'Egreso Papelería'
        AND SUBSTRING(ope_fecha,4,2) = '$mes' AND SUBSTRING(ope_fecha,7,4) = '$ano'";
        $result = $this->db->query($query);
        $deben =  $result->result_array();
        $deben = $deben[0]['total_deben'];


        $total = array (
            "debeb" => $deben,

        );
        return $total;
    }

    function get_totales_mes_gasolina()
    {
        $mes=date('m');
        $ano=date('Y');
        $query = "SELECT sum(ope_valor) as total_deben
        FROM operacion
        WHERE ope_tipo = 'Egreso Gasolina'
        AND SUBSTRING(ope_fecha,4,2) = '$mes' AND SUBSTRING(ope_fecha,7,4) = '$ano'";
        $result = $this->db->query($query);
        $deben =  $result->result_array();
        $deben = $deben[0]['total_deben'];


        $total = array (
            "debeb" => $deben,

        );
        return $total;
    }
}