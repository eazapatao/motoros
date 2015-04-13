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
            "usuario" => $this->usuario_model->get_lista_usuarios(),//Pendiente

        );

        $this->load->view("templates/admin_template", $content);
    }

    public function nuevo_usuario(){
        $content = array(
            "menu" => "Directorio",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo Usuario",
            "main_content" => "user/nuevo_usuario_view",
            "cargos" => $this->usuario_model->get_lista_cargo()
        );

        $this->load->view("templates/admin_template", $content);
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
            "usuario" => $this->usuario_model->get_info_usuario($id),
            "cargos" => $this->usuario_model->get_lista_cargo(),
            "main_content" => "user/editar_usuario_view",

        );

        $this->load->view("templates/admin_template", $content);
    }

    function del($id)
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            echo $id;
            $this->usuario_model->del_usuario($id);
            redirect('usuario', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
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

