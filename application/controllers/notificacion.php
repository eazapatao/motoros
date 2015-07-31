<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('notificacion_model');
        $this->load->model('directorio_model');
    }

    function guardar_programarproxpago()
    {
        $this->notificacion_model->guardar_programarproxpago();
        redirect('notificacion/cortes', 'refresh');
    }

    public function noti_corte(){

        $dias_faltantes = intval(date('d'));

            $this->notificacion_model->get_cortes($dias_faltantes);
    }
    public function noti_pago(){

        $dia = intval(date('d'));
        $mes = intval(date('m'));
        $ano = intval(date('y'));
        $this->notificacion_model->get_pagos($dia,$mes,$ano);
    }

    public function index(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
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

    public function cortes(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Cortes",
                "label2" => "",
                "titulo" => "Cortes proximos",
                "main_content" => "user/cortes_view",
                "data" => $this->notificacion_model->get_lista_cortes()
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function verprogramacionpagos(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Pagos programados",
                "label" => "Cortes",
                "label2" => "",
                "titulo" => "",
                "main_content" => "user/lista_proxpagos_view",
                "data" => $this->notificacion_model->get_lista_proxpago()
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function suspenciones(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Suspenciones",
                "label2" => "",
                "titulo" => "Suspenciones proximas",
                "main_content" => "user/suspenciones_view",
                "data" => $this->notificacion_model->get_lista_suspenciones()
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function proximipago(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Registro de llamadas",
                "label" => "Cortes",
                "label2" => "",
                "titulo" => "",
                "main_content" => "user/programarproxpago_view",
                "data" => $this->notificacion_model->get_lista_cortes_only(),
                "clientes" => $this->directorio_model->get_lista_clientes()
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function sim(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Sim",
                "label2" => "",
                "titulo" => "",
                "main_content" => "user/simcard_view",
                "data" => $this->notificacion_model->get_lista_simcard()
            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function pagos(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Facturación",
                "label2" => "",
                "titulo" => "Próximas facturaciones",
                "main_content" => "user/facturaciones_view",
                "data" => $this->notificacion_model->get_lista_facturaciones(),
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