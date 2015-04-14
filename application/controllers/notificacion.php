<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('notificacion_model');
    }


    public function noti_corte(){

        $dias_faltantes = intval(date('d'));

            $this->notificacion_model->get_cortes($dias_faltantes);
    }


    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in') && $arr['role'] == 1)
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Cortes",
                "label2" => "",
                "titulo" => "Panel de control",
                "main_content" => "admin/dashboard_view",
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }



    //control adicional datos pagos
}