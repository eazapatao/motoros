<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("usuario_model");
    }

    public function index(){

        $content = array(
            "menu" => "Directorio",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_usuario_view",
            "usuario" => $this->usuario_model->get_lista_usuario()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_usuario(){
        $content = array(
            "menu" => "Directorio",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo Usuario",
            "main_content" => "user/nuevo_usuario_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_usuario(){
        $this->usuario_model->guardar_usuario();
        redirect('usuario', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_Cliente",
            "usuario" => $this->usuario_model->get_usuario($id),
            "main_content" => "user/editar_usuario_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "del",
            "titulo" => "Eliminar_Cliente",
            "usuario" => $this->usuario_model->get_usuario($id),
            "main_content" => "user/eliminar_usuario_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_usuario()
    {
        $this->usuario_model->upd_usuario();
        redirect("usuario", "refresh");
    }

    function del_usuario()
    {
        $this->usuario_model->del_usuario();
        redirect("usuario", "refresh");
    }
}

