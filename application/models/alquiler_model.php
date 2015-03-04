<?php

class alquiler_model extends CI_Model{


    function get_lista_alquiler(){
        $query = $this->db->get("alquiler");

        return $query->result_array();

    }

    function guardar_alquiler(){

        $data = array(
            "alq_cli_id" => $this->input->post("cliente"),
            "alq_observaciones" => $this->input->post("observaciones"),
            "alq_tipo" => $this->input->post("tipo"),
            "alq_fecha" => $this->input->post("fecha"),
            "alq_fechafin" => $this->input->post("fechafin")
        );

        $this->db->insert("alquiler", $data);

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
            "alq_fechafin" => $this->input->post("fechafin")
        );

        $this->db->where("alq_id", $this->input->post("alq_id"));
        $this->db->update('alquiler', $data);
    }

    function del_alquiler()
    {

        $this->db->where("alq_id", $this->input->post("alq_id"));
        $this->db->delete('alquiler');

    }



}