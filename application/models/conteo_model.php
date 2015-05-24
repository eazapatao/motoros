<?php

class Conteo_model extends CI_Model{


    function get_lista_conteo(){
        $query = $this->db->get("denominacion");

        return $query->result_array();

    }

    function guardar_conteo(){

        $data = array(
            "den_fecha" => $this->input->post("fecha"),
            "den_detalle" => $this->input->post("detalle"),
            "den_50" => $this->input->post("50"),
            "den_100" => $this->input->post("100"),
            "den_200" => $this->input->post("200"),
            "den_500" => $this->input->post("500"),
            "den_1000" => $this->input->post("1000"),
            "den_2000" => $this->input->post("2000"),
            "den_5000" => $this->input->post("5000"),
            "den_10000" => $this->input->post("10000"),
            "den_20000" => $this->input->post("20000"),
            "den_50000" => $this->input->post("50000"),
            "den_total" => $this->input->post("50")*50+$this->input->post("100")*100+$this->input->post("200")*200+$this->input->post("500")*500+$this->input->post("1000")*1000+$this->input->post("2000")*2000
            +$this->input->post("5000")*5000+$this->input->post("10000")*10000+$this->input->post("20000")*20000+$this->input->post("50000")*50000,
        );

        $this->db->insert("denominacion", $data);
    }

    function get_conteo($id){
        $query = $this->db->get_where('denominacion', array('den_id' => $id));

        return $query->result_array();

    }

    function upd_conteo()
    {
        $data = array(
            "den_fecha" => $this->input->post("fecha"),
            "den_detalle" => $this->input->post("detalle"),
            "den_50" => $this->input->post("50"),
            "den_100" => $this->input->post("100"),
            "den_200" => $this->input->post("200"),
            "den_500" => $this->input->post("500"),
            "den_1000" => $this->input->post("1000"),
            "den_2000" => $this->input->post("2000"),
            "den_5000" => $this->input->post("5000"),
            "den_10000" => $this->input->post("10000"),
            "den_20000" => $this->input->post("20000"),
            "den_50000" => $this->input->post("50000"),
            "den_total" => $this->input->post("50")*50+$this->input->post("100")*100+$this->input->post("200")*200+$this->input->post("500")*500+$this->input->post("1000")*1000+$this->input->post("2000")*2000
                +$this->input->post("5000")*5000+$this->input->post("10000")*10000+$this->input->post("20000")*20000+$this->input->post("50000")*50000,
        );

        $this->db->where("den_id", $this->input->post("den_id"));
        $this->db->update('denominacion', $data);

    }

    function del_conteo($id)
    {

        $this->db->where("den_id", $id);
        $this->db->delete('denominacion');

    }


}