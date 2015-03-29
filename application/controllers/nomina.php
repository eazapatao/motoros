<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nomina extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("nomina_model");
        $this->load->model("usuario_model");
    }


    public function index(){

        $content = array(
            "menu" => "nomina",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_nomina_view",
            "nomina" => $this->nomina_model->get_lista_nomina()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }
    public function verprestamo(){

        $content = array(
            "menu" => "Prestamo",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_prestamo_view",
            "nomina" => $this->nomina_model->get_lista_prestamo()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function conteo(){

        $content = array(
            "menu" => "Conteo",
            "label" => "dir",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/conteo_view",
            //"nomina" => $this->nomina_model->get_lista_prestamo()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }
    public function nuevo_nomina(){
        $content = array(
            "menu" => "Nómina",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo registro de nómina",
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "main_content" => "user/nueva_nomina_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_prestamo(){
        $content = array(
            "menu" => "Nómina",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo registro de prestamo",
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "main_content" => "user/nuevo_prestamo_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_prestamo(){
        $this->nomina_model->guardar_prestamo();
        redirect('nomina', 'refresh');

    }


    function calcular(){
        $this->nomina_model->calcular();
        redirect('nomina/conteo', 'refresh');

    }

    function guardar_nomina(){
        $this->nomina_model->guardar_nomina();
        redirect('nomina', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_Nomina",
            "nomina" => $this->nomina_model->get_info_nomina($id),
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "main_content" => "user/editar_nomina_view"
        );

        $this->load->view("templates/user_template", $content);
    }
    function editarp($id)
    {
        $content = array(
            "menu" => "Prestamo",
            "label" => "pres",
            "label2" => "list",
            "titulo" => "Editar_Prestamo",
            "prestamos" => $this->nomina_model->get_info_prestamo($id),
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "main_content" => "user/editar_prestamo_view"
        );

        $this->load->view("templates/user_template", $content);
    }



    function del($id)
    {
        $this->nomina_model->del_nomina($id);

        redirect("nomina", "refresh");
    }

    function upd_nomina()
    {
        $this->nomina_model->upd_nomina();
        redirect("nomina", "refresh");
    }
    function upd_prestamo()
    {
        $this->nomina_model->upd_prestamo();
        redirect("nomina", "refresh");
    }
    function del_nomina()
    {
        $this->nomina_model->del_nomina();
        redirect("nomina", "refresh");
    }
    function del_prestamo($id)
    {
        $this->nomina_model->del_prestamo($id);
        redirect("nomina/verprestamo", "refresh");
    }
}

