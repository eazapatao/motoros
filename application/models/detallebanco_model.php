<?php

class Detallebanco_model extends CI_Model{


    function get_lista_detallebanco(){
        $query = $this->db->get("detalle_banco");

        return $query->result_array();

    }

    function guardar_detallebanco(){

        $data = array(

            "detban_ban_id" => $this->input->post("banco"),
            "detban_cli_id" => $this->input->post("cliente"),
            "detban_fecha" => $this->input->post("fecha"),
            "detban_transaccion" => $this->input->post("transaccion"),
            "detban_valor" => $this->input->post("valor"),
            "detban_detalle" => $this->input->post("detalle"),

        );

        $this->db->insert("detalle_banco", $data);

    }

    function get_detallebanco($id){
        $query = $this->db->get_where('detalle_banco', array('detban_id' => $id));

        return $query->result_array();

    }

    function upd_detallebanco()
    {
        $data = array(
            "detban_ban_id" => $this->input->post("banco"),
            "detban_cli_id" => $this->input->post("cliente"),
            "detban_fecha" => $this->input->post("fecha"),
            "detban_transaccion" => $this->input->post("transaccion"),
            "detban_valor" => $this->input->post("valor"),
            "detban_detalle" => $this->input->post("detalle"),
        );

        $this->db->where("detban_id", $this->input->post("detban_id"));
        $this->db->update('detalle_banco', $data);

    }

    function del_detallebanco()
    {

        $this->db->where("detban_id", $this->input->post("detban_id"));
        $this->db->delete('detalle_banco');

    }


}