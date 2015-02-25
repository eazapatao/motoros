<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directorio extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("directorio_model");
    }

    public function index(){

        $content = array(
            "menu" => "Directorio",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_clientes_view",
            "clientes" => $this->directorio_model->get_lista_clientes()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_cliente(){
        $content = array(
            "menu" => "Directorio",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo cliente",
            "main_content" => "user/nuevo_cliente_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_cliente(){
        $this->directorio_model->guardar_cliente();
        redirect('directorio', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_Cliente",
            "cliente" => $this->directorio_model->get_cliente($id),
            "main_content" => "user/editar_cliente_view"
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
            "clientes" => $this->directorio_model->get_cliente($id),
            "main_content" => "user/eliminar_cliente_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_cliente()
    {
        $this->directorio_model->upd_cliente();
        redirect("directorio", "refresh");
    }

    function del_cliente()
    {
        $this->directorio_model->del_cliente();
        redirect("directorio", "refresh");
    }
}

