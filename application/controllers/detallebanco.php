<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detallebanco extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("detallebanco_model");
        $this->load->model("directorio_model");
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Banco",
                "label" => "dir",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_detallebanco_view",
                "detallebanco" => $this->detallebanco_model->get_lista_detallebanco(),
                "totalesB" => $this->detallebanco_model->get_totales_bancolombia(),
                "totalesD" => $this->detallebanco_model->get_totales_davivienda(),

            );

            $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function nuevo_detallebanco(){

        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
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
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function guardar_detallebanco(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->detallebanco_model->guardar_detallebanco();
            redirect('detallebanco', 'refresh');
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
                "menu" => "Banco",
                "label" => "lin",
                "label2" => "list",
                "titulo" => "Editar_Detalle banco",
                "detallebanco" => $this->detallebanco_model->get_info_banco($id),
                "bancos" => $this->detallebanco_model->get_lista_banco(),
                "banco" => $this->detallebanco_model->get_lista_banco(),

                "main_content" => "user/editar_detallebanco_view"
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
            $this->detallebanco_model->del_detallebanco($id);

            redirect('detallebanco', 'refresh');
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    function upd_detallebanco()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $this->detallebanco_model->upd_detallebanco();
            redirect("detallebanco", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function del_detallebanco()
    {
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $this->detallebanco_model->del_detallebanco();
            redirect("detallebanco", "refresh");
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function test(){
        $totales = $this->detallebanco_model->get_totales();
        print_r($totales);
    }
}

