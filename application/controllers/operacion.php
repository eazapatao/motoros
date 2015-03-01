<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operacion extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("operacion_model");
    }

    public function index(){

        $content = array(
            "menu" => "Operacion",
            "label" => "ope",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_operacion_view",
            "operacion" => $this->operacion_model->get_lista_operacion()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_operacion(){
        $content = array(
            "menu" => "Operación",
            "label" => "ope",
            "label2" => "new",
            "titulo" => "Nueva operación",
            "main_content" => "user/nuevo_operacion_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_operacion(){
        $this->operacion_model->guardar_operacion();
        redirect('operacion', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Operación",
            "label" => "ope",
            "label2" => "list",
            "titulo" => "Editar_operacion",
            "operacion" => $this->operacion_model->get_operacion($id),
            "main_content" => "user/editar_operacion_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Operacion",
            "label" => "ope",
            "label2" => "del",
            "titulo" => "Eliminar_operacion",
            "operacion" => $this->operacion_model->get_operacion($id),
            "main_content" => "user/eliminar_operacion_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_operacion()
    {
       $this->operacion_model->upd_operacion();
        redirect("operacion", "refresh");
    }

    function del_operacion()
    {
        $this->operacion_model->del_operacion();
        redirect("operacion", "refresh");
    }
}