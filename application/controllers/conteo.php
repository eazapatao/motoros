<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conteo extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("conteo_model");
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Conteo",
                "label" => "cont",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_conteo_view",
                "conteo" => $this->conteo_model->get_lista_conteo()//Pendiente
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nuevo_conteo(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Conteo",
                "label" => "cont",
                "label2" => "new",
                "titulo" => "Nuevo conteo",
                "main_content" => "user/nuevo_conteo_view"
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function guardar_conteo(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->conteo_model->guardar_conteo();
            redirect('conteo', 'refresh');
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
                "menu" => "Conteo",
                "label" => "cont",
                "label2" => "list",
                "titulo" => "Editar_Conteo",
                "conteo" => $this->conteo_model->get_conteo($id),
                "main_content" => "user/editar_conteo_view"
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function del($id)
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            echo $id;
            $this->conteo_model->del_conteo($id);
            redirect('conteo', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function upd_conteo()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->conteo_model->upd_conteo();
            redirect("conteo", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function del_conteo()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->conteo_model->del_conteo();
            redirect("conteo", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}

