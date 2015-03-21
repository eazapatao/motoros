<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linea extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("linea_model");
        $this->load->model("plan_model");
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
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
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function verhistorial(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Historial",
                "label" => "his",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_historial_view",
                "historial" => $this->linea_model->get_lista_historial()//Pendiente
            );

            $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nueva_linea(){
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "new",
            "titulo" => "Nueva_linea",
            "planes" => $this->plan_model->get_lista_planes(),
            "main_content" => "user/nueva_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_historial($id_ticket)
    {
        $content = array(
            "menu" => "Historial linea",
            "label" => "his",
            "label2" => "new",
            "titulo" => "Nuevo_historial",
            "lineas" => $this->linea_model->get_lista_lineas_disponibles(),
            "main_content" => "user/nuevo_historial_view",
            "id_ticket" => $id_ticket
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_linea(){
        $this->linea_model->guardar_linea();
        redirect('linea', 'refresh');

    }
    function guardar_historial(){

       $this->linea_model->guardar_historial();

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_linea",
            "linea" => $this->linea_model->get_info_linea($id),
            "plan" => $this->plan_model->get_lista_plan(),
            "main_content" => "user/editar_linea_view"
        );

        $this->load->view("templates/user_template", $content);
    }
    function editarh($id)
    {
        $content = array(
            "menu" => "Historial",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_historial",
            "historial" => $this->linea_model->get_historial($id),
            "main_content" => "user/editar_historial_view"
        );

        $this->load->view("templates/user_template", $content);
    }


    function del($id)
    {
       $this->linea_model->del_linea($id);
       redirect("linea", "refresh");

    }
    function delh($id)
    {
        $content = array(
            "menu" => "Historial",
            "label" => "his",
            "label2" => "del",
            "titulo" => "Eliminar_Historial",
            "historial" => $this->linea_model->get_historial($id),
            "main_content" => "user/eliminar_historial_view"
        );

        $this->load->view("templates/user_template", $content);
    }
    function upd_linea()
    {
       $this->linea_model->upd_linea();
       redirect("linea", "refresh");
    }
    function upd_historial()
    {
        $this->linea_model->upd_historial();
        redirect("linea/verhistorial", "refresh");
    }


    function del_linea()
    {
        $this->linea_model->del_linea();
        redirect("linea/verhistorial", "refresh");
    }
    function del_historial()
    {
        $this->linea_model->del_historial();
        redirect("linea/verhistorial", "refresh");
    }
}