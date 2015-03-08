<?php

class operacion_model extends CI_Model{


    function get_lista_operacion(){
        $this->db->select('*');
        $this->db->from('operacion');
        $this->db->join('cliente', 'cliente.cli_id = operacion.ope_cli_id');
        $this->db->join('usuario', 'usuario.usu_id = operacion.ope_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function guardar_operacion(){
        $data = array(
            "ope_cli_id" => $this->input->post("cliente"),
            "ope_usu_id" => $this->input->post("usuario"),
            "ope_tipo" => $this->input->post("tipo"),
            "ope_valor" => $this->input->post("valor"),
            "ope_fecha" => $this->input->post("fecha"),
            "ope_nfactura" => $this->input->post("nfactura"),
            "ope_observaciones" => $this->input->post("observaciones")
        );

        $this->db->insert("operacion", $data);
    }

    function get_operacion($id){
        $query = $this->db->get_where('operacion', array('ope_id' => $id));

        return $query->result_array();

    }

    function upd_operacion()
    {
        $data = array(
            "ope_cli_id" => $this->input->post("cliente"),
            "ope_usu_id" => $this->input->post("usuario"),
            "ope_tipo" => $this->input->post("tipo"),
            "ope_valor" => $this->input->post("valor"),
            "ope_fecha" => $this->input->post("fecha"),
            "ope_nfactura" => $this->input->post("nfactura"),
            "ope_observaciones" => $this->input->post("observaciones")
        );

        $this->db->where("ope_id", $this->input->post("ope_id"));
        $this->db->update('operacion', $data);
    }

    function del_operacion($id)
    {

        $this->db->where("ope_id", $id);
        $this->db->delete('operacion');

    }


}