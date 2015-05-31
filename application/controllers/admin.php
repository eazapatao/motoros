<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('directorio_model');
        $this->load->model('linea_model');
        $this->load->model('reporte_model');
        $this->load->model('notificacion_model');
        $this->load->model('operacion_model');
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in') && $arr['role'] == 1)
        {

            $content = array(
                "menu" => "Motoros",
                "label" => "bienvenida",
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


    function upd_estado_cuenta_corte()
    {
        $dia = intval(date('d'));

        $this->notificacion_model->get_corte_hoy($dia);

    }

    public function test(){
//        echo $this->linea_model->obtener_preciodatos(48).'<br>';

       // print_r($this->operacion_model->obtener_saldo_ayer()) ;
       // echo $this->operacion_model->verificar_existencia_saldo();
        //print_r( $this->notificacion_model->get_lista_facturaciones());
       // print_r(date('d/m/y')) ;

        echo $this->reporte_model->get_total_lineasxcorte(16);

    }
}

