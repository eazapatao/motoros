<?php

class plan_model extends CI_Model{


    function get_lista_plan(){
        $query = $this->db->get("plan");

        return $query->result_array();

    }


    function guardar_plan(){

        $data = array(
            "pla_nombre" => $this->input->post("nombre"),
            "pla_totalmin" => $this->input->post("minutos"),
            "pla_vlrmin" => $this->input->post("vlrmin"),
            "pla_cargobasico" => $this->input->post("cargobasico")

        );

        $this->db->insert("plan", $data);
    }


    function get_plan($id){
        $query = $this->db->get_where('plan', array('pla_id' => $id));

        return $query->result_array();

    }


    function get_lista_planes(){
        $query = $this->db->get('plan');

        return $query->result_array();
    }


    function upd_plan()
    {
        $data = array(
            "pla_nombre" => $this->input->post("nombre"),
            "pla_totalmin" => $this->input->post("minutos"),
            "pla_vlrmin" => $this->input->post("vlrmin"),
            "pla_cargobasico" => $this->input->post("cargobasico")
        );

        $this->db->where("pla_id", $this->input->post("pla_id"));
        $this->db->update('plan', $data);
    }

    function del_plan($id)
    {

        $this->db->where("pla_id", $id);
        $this->db->delete('plan');

    }


}