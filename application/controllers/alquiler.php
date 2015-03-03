<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alquiler extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("alquiler_model");
        $this->load->model("directorio_model");
    }

    public function index(){

        $content = array(
            "menu" => "Alquiler",
            "label" => "alq",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_alquiler_view",
            "alquiler" => $this->alquiler_model->get_lista_alquiler()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_alquiler(){
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "new",
            "titulo" => "Nuevo alquiler",
            "clientes" => $this->directorio_model->get_lista_clientes(),
            "main_content" => "user/nuevo_alquiler_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_alquiler(){

        $last_id = $this->alquiler_model->guardar_alquiler();
        //$last_id = $this->alquiler_model->get_last();
        //redirect('alquiler', 'refresh');

        echo $last_id;

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Alquiler",
            "label" => "alq",
            "label2" => "list",
            "titulo" => "Editar_Alquiler",
            "alquiler" => $this->alquiler_model->get_alquiler($id),
            "main_content" => "user/editar_alquiler_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Alquiler",
            "label" => "alq",
            "label2" => "del",
            "titulo" => "Eliminar_Alquiler",
            "linea" => $this->alquiler_model->get_alquiler($id),
            "main_content" => "user/eliminar_alquiler_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_alquiler()
    {
       $this->alquiler_model->upd_alquiler();
        redirect("alquiler", "refresh");
    }

    function del_alquiler()
    {
        $this->alquiler_model->del_alquiler();
        redirect("alquiler", "refresh");
    }
}