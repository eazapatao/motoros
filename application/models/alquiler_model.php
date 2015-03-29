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

        $data = array(
            "alq_cli_id" => $this->input->post("cliente"),
            "alq_observaciones" => $this->input->post("observaciones"),
            "alq_tipo" => $this->input->post("tipo"),
            "alq_fecha" => $this->input->post("fecha"),
            "alq_fechafin" => $this->input->post("fechafin"),
        );

        $this->db->insert("alquiler", $data);
        $last_id = $this->db->insert_id();
        return $last_id;
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

    function del_alquiler($id)
    {

        $this->db->where("alq_id", $id);
        $this->db->delete('alquiler');

    }

    function get_last()
    {
        $this->db->select('alq_id');
        $this->db->from('alquiler');

        $query = $this->db->get();
    }

}