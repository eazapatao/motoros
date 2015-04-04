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


}