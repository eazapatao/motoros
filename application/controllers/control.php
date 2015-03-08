<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("control_model");
        $this->load->model("linea_model");
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Control de adicionales",
                "label" => "com",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_control_view",
                "controles" => $this->control_model->get_lista_controles(),//Pendiente

            );

            $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nuevo_control(){

        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Control",
                "label" => "con",
                "label2" => "new",
                "titulo" => "Registro Control de adicionales",
                "controles" => $this->control_model->get_lista_controles(),
                "lineas" => $this->linea_model->get_lista_lineas(),//Pendiente
                "main_content" => "user/nuevo_control_view"
        );

        $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function guardar_control(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->control_model->guardar_controles();
            redirect('control', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


    }

    function editar($id)
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Control",
                "label" => "con",
                "label2" => "list",
                "titulo" => "Editar_control",
                "controles" => $this->control_model->get_control($id),
                "main_content" => "user/editar_control_view"
            );

            $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function del($id)
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function upd_control()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->detallebanco_model->upd_control();
            redirect("control", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function del_control()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->detallebanco_model->del_detallebanco();
            redirect("control", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
}

