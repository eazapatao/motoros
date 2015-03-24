<?php

class Control_model extends CI_Model{


    function get_lista_controles(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('control_adicional', 'control_adicional.con_lin_id = linea.lin_id');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $query = $this->db->get();
        return $query->result_array();

    }


    function guardar_controles(){

        $data = array(

            "con_lin_id" => $this->input->post("linea"),
            "con_fecha" => $this->input->post("fecha"),
            "con_facturacion" => $this->input->post("facturacion"),
            "con_descuentos" => $this->input->post("descuentos"),

        );

        $this->db->insert("control_adicional", $data);

    }

    function get_control($id){
        $query = $this->db->get_where('control_adicional', array('con_id' => $id));

        return $query->result_array();

    }
    function get_info_control($id){
        $this->db->select('*');
        $this->db->from('control');
        $this->db->where('con_id', $id);
        $this->db->join('linea', 'linea.lin_id = control.con_lin_id');
        $query = $this->db->get();
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