<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detallebanco extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("detallebanco_model");
        $this->load->model("directorio_model");
    }

    public function index(){

        $content = array(
            "menu" => "Banco",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_detallebanco_view",
            "detallebanco" => $this->detallebanco_model->get_lista_detallebanco()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_detallebanco(){
        $content = array(
            "menu" => "Banco",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Registro Bancario",
            "clientes" => $this->directorio_model->get_lista_clientes(),
            "bancos" => $this->detallebanco_model->get_lista_banco(),
            "main_content" => "user/nuevo_detallebanco_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_detallebanco(){
        $this->detallebanco_model->guardar_detallebanco();
        redirect('detallebanco', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Banco",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_Detalle banco",
            "detallebanco" => $this->detallebanco_model->get_detallebanco($id),
            "main_content" => "user/editar_detallebanco_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "del",
            "titulo" => "Eliminar_Detalle_Banco",
            "detallebanco" => $this->detallebanco_model->get_detallebanco($id),
            "main_content" => "user/eliminar_detallebanco_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_detallebanco()
    {
        $this->detallebanco_model->upd_detallebanco();
        redirect("detallebanco", "refresh");
    }

    function del_detallebanco()
    {
        $this->detallebanco_model->del_detallebanco();
        redirect("detallebanco", "refresh");
    }
}

