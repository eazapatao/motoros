<?php

class linea_model extends CI_Model{


    function get_lista_lineas(){
        $query = $this->db->get("linea");

        return $query->result_array();

    }

    function guardar_linea(){

        $data = array(
            "lin_pla_id" => $this->input->post("plan"),
            "lin_numero" => $this->input->post("numero"),
            "lin_corte" => $this->input->post("corte"),
            "lin_estado" => $this->input->post("estado"),
            "lin_operador" => $this->input->post("operador"),
            "lin_vlorminvend" => $this->input->post("vlorminvend")

        );

        $this->db->insert("linea", $data);
    }

    function get_linea($id){
        $query = $this->db->get_where('linea', array('lin_id' => $id));

        return $query->result_array();

    }

    function upd_linea()
    {
        $data = array(
            "lin_pla_id" => $this->input->post("plan"),
            "lin_numero" => $this->input->post("numero"),
            "lin_corte" => $this->input->post("corte"),
            "lin_estado" => $this->input->post("estado"),
            "lin_operador" => $this->input->post("operador"),
            "lin_vlorminvend" => $this->input->post("vlorminvend")
        );

        $this->db->where("lin_id", $this->input->post("lin_id"));
        $this->db->update('linea', $data);
    }

    function del_linea()
    {

        $this->db->where("lin_id", $this->input->post("lin_id"));
        $this->db->delete('linea');

    }


}