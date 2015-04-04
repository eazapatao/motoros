<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("reporte_model");
    }

    public function ver_estadocuentas(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Estado de cuentas",
                "label" => "Rep",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/reporte_estadocuentas_view",
                "estadocuentas" => $this->reporte_model->get_lista_estadocuentas()//Pendiente
            );

            $this->load->view("templates/user_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }


}