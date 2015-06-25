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
    public function sim(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {

            $content = array(
                "menu" => "Notificaciones",
                "label" => "Sin",
                "label2" => "",
                "titulo" => "",
                "main_content" => "user/devolucionsim_view",
                "data" => $this->notificacion_model->get_lista_devolucion()
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
                "data" => $this->notificacion_model->get_lista_facturaciones()
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