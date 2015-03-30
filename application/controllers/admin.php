<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('directorio_model');

    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in') && $arr['role'] == 1)
        {

            $content = array(
                "menu" => "Dashboard",
                "label" => "dash",
                "label2" => "",
                "titulo" => "Resumen",
                "main_content" => "admin/dashboard_view",
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

