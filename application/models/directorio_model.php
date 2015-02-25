<?php

class Directorio_model extends CI_Model{


    function get_lista_clientes(){
        $query = $this->db->get("cliente");

        return $query->result_array();

    }

    function guardar_cliente(){

        $data = array(
            "cli_cedula" => $this->input->post("cedula"),
            "cli_nombre" => $this->input->post("nombre"),
            "cli_apellido" => $this->input->post("apellido"),
            "cli_direccion" => $this->input->post("direccion"),
            "cli_barrio" => $this->input->post("barrio"),
            "cli_telefono" => $this->input->post("telefono"),
            "cli_celular" => $this->input->post("celular"),
            "cli_ciudad" => $this->input->post("ciudad"),
            "cli_tipo" => $this->input->post("tipo"),
            "cli_observaciones" => $this->input->post("observaciones")
        );

        $this->db->insert("cliente", $data);
    }

    function get_cliente($id){
        $query = $this->db->get_where('cliente', array('cli_id' => $id));

        return $query->result_array();

    }

    function upd_cliente()
    {
        $data = array(
            "cli_cedula" => $this->input->post("cedula"),
            "cli_nombre" => $this->input->post("nombre"),
            "cli_apellido" => $this->input->post("apellido"),
            "cli_direccion" => $this->input->post("direccion"),
            "cli_barrio" => $this->input->post("barrio"),
            "cli_telefono" => $this->input->post("telefono"),
            "cli_celular" => $this->input->post("celular"),
            "cli_ciudad" => $this->input->post("ciudad"),
            "cli_tipo" => $this->input->post("tipo"),
            "cli_observaciones" => $this->input->post("observaciones")

        );

        $this->db->where("cli_id", $this->input->post("cli_id"));
        $this->db->update('cliente', $data);

    }

    function del_cliente()
    {

        $this->db->where("cli_id", $this->input->post("cli_id"));
        $this->db->delete('cliente');

    }


}