<?php

class Usuario_model extends CI_Model{


    function get_lista_usuario(){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('cargo', 'cargo.car_id = usuario.usu_car_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_lista_cargo(){
        $query = $this->db->get("cargo");

        return $query->result_array();

    }


    function login($username, $password)
    {

        $this -> db -> select('usu_id, usu_nick, usu_contrasena, usu_car_id');
        $this -> db -> from('usuario');
        $this -> db -> where('usu_nick', $username);
        $this -> db -> where('usu_contrasena', MD5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function guardar_usuario(){

        $data = array(
            "usu_nombre" => $this->input->post("nombre"),
            "usu_apellido" => $this->input->post("apellido"),
            "usu_cedula" => $this->input->post("cedula"),
            "usu_direccion" => $this->input->post("direccion"),
            "usu_telefono" => $this->input->post("telefono"),
            "usu_car_id" => $this->input->post("cargo"),
            "usu_nick" => $this->input->post("nick"),
            "usu_contrasena" => $this->input->post("contrasena"),
            "usu_fechaingreso" => $this->input->post("fechai"),
            "usu_fechaegreso" => $this->input->post("fechae"),

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
            "usu_car_id" => $this->input->post("cargo"),
            "usu_nick" => $this->input->post("nick"),
            "usu_contrasena" => $this->input->post("contrasena"),
            "usu_fechaingreso" => $this->input->post("fechai"),
            "usu_fechaegreso" => $this->input->post("fechae"),

        );

        $this->db->where("usu_id", $this->input->post("usu_id"));
        $this->db->update('usuario', $data);

    }

    function del_usuario($id)
    {
        $this->db->where("usu_id", $id);
        $this->db->delete('usuario');

    }


}