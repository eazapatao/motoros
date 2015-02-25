<?php

class Usuario_model extends CI_Model{


    function get_lista_usuario(){
        $query = $this->db->get("usuario");

        return $query->result_array();

    }

    function guardar_usuario(){

        $data = array(
            "usu_nombre" => $this->input->post("nombre"),
            "usu_apellido" => $this->input->post("apellido"),
            "usu_cedula" => $this->input->post("cedula"),
            "usu_fotografia" => $this->input->post("fotografia"),
            "usu_direccion" => $this->input->post("direccion"),
            "usu_telefono" => $this->input->post("telefono"),
            "usu_nick" => $this->input->post("nick"),
            "usu_contrasena" => $this->input->post("contrasena"),
            "usu_fechaingreso" => $this->input->post("fechai"),
            "usu_fechaegreso" => $this->input->post("fechae"),
            "usu_tipo" => $this->input->post("tipo")
        );

        $this->db->insert("usuario", $data);
    }

    function get_usuario($id){
        $query = $this->db->get_where('usuario', array('usu_id' => $id));

        return $query->result_array();

    }

    function upd_usuario()
    {
        $data = array(
            "usu_nombre" => $this->input->post("nombre"),
            "usu_apellido" => $this->input->post("apellido"),
            "usu_cedula" => $this->input->post("cedula"),
            "usu_fotografia" => $this->input->post("fotografia"),
            "usu_direccion" => $this->input->post("direccion"),
            "usu_telefono" => $this->input->post("telefono"),
            "usu_nick" => $this->input->post("nick"),
            "usu_contrasena" => $this->input->post("contrasena"),
            "usu_fechaingreso" => $this->input->post("fechai"),
            "usu_fechaegreso" => $this->input->post("fechae"),
            "usu_tipo" => $this->input->post("tipo")
        );

        $this->db->where("usu_id", $this->input->post("usu_id"));
        $this->db->update('usuario', $data);

    }

    function del_usuario()
    {

        $this->db->where("usu_id", $this->input->post("usu_id"));
        $this->db->delete('usuario');

    }


}