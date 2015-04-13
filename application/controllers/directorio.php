<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directorio extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("directorio_model");
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Directorio",
                "label" => "dir",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_clientes_view",
                "clientes" => $this->directorio_model->get_lista_clientes()//Pendiente
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nuevo_cliente(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Directorio",
                "label" => "dir",
                "label2" => "new",
                "titulo" => "Nuevo cliente",
                "main_content" => "user/nuevo_cliente_view"
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function guardar_cliente(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->directorio_model->guardar_cliente();
            redirect('directorio', 'refresh');
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
                "menu" => "Directorio",
                "label" => "lin",
                "label2" => "list",
                "titulo" => "Editar_Cliente",
                "cliente" => $this->directorio_model->get_cliente($id),
                "main_content" => "user/editar_cliente_view"
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
            $this->directorio_model->del_cliente($id);
            redirect('directorio', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function upd_cliente()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->directorio_model->upd_cliente();
            redirect("directorio", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function del_cliente()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->directorio_model->del_cliente();
            redirect("directorio", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}

