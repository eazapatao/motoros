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

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function ver_informediario(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Informe diario",
                "label" => "Inf",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/reporte_informediario_view",
                "informesdiarios" => $this->reporte_model->get_lista_informesdiarios(),
                "totales" => $this->reporte_model->get_sumasaldo_totales_hoy(),

            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function lineasxcorte(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Líneas por corte",
                "label" => "Lin",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/lineasxcorte_view",
                "lineasxcorte" => $this->reporte_model->get_total_lineasxcorte(30),
               // "lineasxcortediscriminado" => $this->reporte_model->get_lineasxcorte_discriminado(),
                );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function imprimir_factura(){

        if($this->session->userdata('logged_in')) {



                $content = array(
                    //"data" => $this->apply_model->get_corte($corte_id),
                    "doit" => 'I'
                );
                $this->load->library('Pdf');
                $this->load->view("factura_view");

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


    }

}