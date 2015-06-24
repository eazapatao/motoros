<?php

class Cambios_model extends CI_Model{


    function get_lista_cambios(){
        $query = $this->db->get("cambios");

        return $query->result_array();
    }



        function guardar_cambios(){

        $data = array(

        "cam_nombre" => $this->input->post("nombre"),
        "cam_campo" => $this->input->post("campo"),
        "cam_descripcion" => $this->input->post("descripcion"),
        "cam_estado" => "Pendiente",
         );

        $this->db->insert("cambios", $data);
        }






    function del_cambios($id)
    {

        $this->db->where("cam_id", $id);
        $this->db->delete('cambios');

    }

}