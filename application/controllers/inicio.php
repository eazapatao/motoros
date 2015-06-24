<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

    function __construct()    {
        parent::__construct();
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in') && $arr['role'] == 2)
        {

            $content = array(
                "menu" => "Motoros",
                "label" => "bienvenida",
                "label2" => "",
                "titulo" => "Panel de control",
                "main_content" => "welcome_view",
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
}

