<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linea extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("linea_model");
    }

    public function index(){

        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_lineas_view",
            "lineas" => $this->linea_model->get_lista_lineas()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nueva_linea(){
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "new",
            "titulo" => "Nueva_linea",
            "main_content" => "user/nueva_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_historial()
    {
        $content = array(
            "menu" => "Historial linea",
            "label" => "his",
            "label2" => "new",
            "titulo" => "Nuevo_historial",
            "main_content" => "user/nuevo_historial_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_linea(){
        $this->linea_model->guardar_linea();
        redirect('linea', 'refresh');

    }
    function guardar_historial(){
        $this->linea_model->guardar_historial();
        redirect('linea', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_linea",
            "linea" => $this->linea_model->get_linea($id),
            "main_content" => "user/editar_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }
    function editar_historial($id)
    {
        $content = array(
            "menu" => "Historial",
            "label" => "his",
            "label2" => "list",
            "titulo" => "Editar_historial",
            "historial" => $this->linea_model->get_historial($id),
            "main_content" => "user/editar_historial_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Linea",
            "label" => "lin",
            "label2" => "del",
            "titulo" => "Eliminar_Linea",
            "linea" => $this->linea_model->get_linea($id),
            "main_content" => "user/eliminar_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }
    function del_historial($id)
    {
        $content = array(
            "menu" => "historial",
            "label" => "lin",
            "label2" => "del",
            "titulo" => "Eliminar_Linea",
            "linea" => $this->linea_model->get_linea($id),
            "main_content" => "user/eliminar_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_linea()
    {
       $this->linea_model->upd_linea();
        redirect("linea", "refresh");
    }

    function del_linea()
    {
        $this->linea_model->del_linea();
        redirect("linea", "refresh");
    }
}