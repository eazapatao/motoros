<?php

class linea_model extends CI_Model{


    function get_lista_lineas(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_lista_lineas_disponibles(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $this->db->where('lin_estado',"Disponible");
        $query = $this->db->get();
        return $query->result_array();

    }


    function get_lista_historial(){
        $sql = "select *
from alquiler join (cliente, historialinea, linea) on
(cliente.cli_id=alq_cli_id AND historialinea.his_alq_id=alq_id AND historialinea.his_lin_id = linea.lin_id)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function guardar_linea(){

        $data = array(
            "lin_pla_id" => $this->input->post("plan"),
            "lin_numero" => $this->input->post("numero"),
            "lin_corte" => $this->input->post("corte"),
            "lin_estado" => $this->input->post("estado"),
            "lin_operador" => $this->input->post("operador"),
            "lin_minutosconsumidos" => $this->input->post("minutos"),
            "lin_pasaminutos" => $this->input->post("pasaminutos"),


        );

        $this->db->insert("linea", $data);

    }

    function guardar_historial(){

        $data = array(
            "his_lin_id" => $this->input->post("linea"),
            "his_alq_id" => $this->input->post("alquiler"),
            "his_valor_minvend" => $this->input->post("vlorminvend"),

        );

        $this->db->insert("historialinea", $data);
        $dato= array(
            "lin_estado" => "Alquilada"
        );
        $this->db->where("lin_id", $this->input->post("linea"));
        $this->db->update('linea', $dato);
    }

    function get_linea($id){
        $query = $this->db->get_where('linea', array('lin_id' => $id));

        return $query->result_array();

    }
    function get_historial($id){
        $query = $this->db->get_where('historialinea', array('his_id' => $id));

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
            "lin_minutosconsumidos" => $this->input->post("minutos"),
            "lin_pasaminutos" => $this->input->post("pasaminutos"),
        );

        $this->db->where("lin_id", $this->input->post("lin_id"));
        $this->db->update('linea', $data);
    }
    function upd_historial()
    {

        $data = array(
            "his_lin_id" => $this->input->post("linea"),
            "his_alq_id" => $this->input->post("alquiler"),
            "his_valor_minvend" => $this->input->post("vlorminvend"),
        );

        $this->db->where("his_id", $this->input->post("his_id"));
        $this->db->update('historialinea', $data);
    }


    function del_linea($id)
    {

        $this->db->where("lin_id", $id);
        $this->db->delete('linea');

    }

    function del_historial()
    {

        $this->db->where("his_id", $this->input->post("his_id"));
        $this->db->delete('historialinea');

    }



}