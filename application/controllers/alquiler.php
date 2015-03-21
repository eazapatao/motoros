<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alquiler extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("alquiler_model");
        $this->load->model("directorio_model");
    }

    public function index(){

        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
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
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nuevo_alquiler(){

        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
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
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function guardar_alquiler(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $last_id = $this->alquiler_model->guardar_alquiler();
            //$last_id = $this->alquiler_model->get_last();
            //redirect('alquiler', 'refresh');

            echo $last_id;
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
                "menu" => "Alquiler",
                "label" => "alq",
                "label2" => "list",
                "titulo" => "Editar_Alquiler",
                "alquiler" => $this->alquiler_model->get_info_alquiler($id),
                "clientes" => $this->directorio_model->get_lista_clientes(),
                "main_content" => "user/editar_alquiler_view"
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
            $this->alquiler_model->del_alquiler($id);
            redirect('alquiler', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function upd_alquiler()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->alquiler_model->upd_alquiler();
            redirect("alquiler", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function del_alquiler()
    {$arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->alquiler_model->del_alquiler();
            redirect("alquiler", "refresh");

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}