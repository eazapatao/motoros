<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('directorio_model');
        $this->load->model('linea_model');
        $this->load->model('reporte_model');
        $this->load->model('notificacion_model');
        $this->load->model('operacion_model');
        $this->load->model('admin_model');
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
                "totalesM" => $this->admin_model->get_totales_mes(date('d'),date('m'),date('Y')),
                "totalesMCliente" => $this->admin_model->get_totales_mes_cliente(),
                "totalesMPapeleria" => $this->admin_model->get_totales_mes_papeleria(),
                "totalesminvend" => $this->admin_model->get_totales_facturacionesoperadorcliente(),
                "totalesMgasolina" => $this->admin_model->get_totales_mes_gasolina(),

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

       //print_r($this->reporte_model->get_lineasxcorte_discriminado(31));
        print_r($this->reporte_model->get_estadocuentasxfecha('22-06-2015',765));

    }
}

