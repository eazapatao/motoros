<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("reporte_model");
        $this->load->model("directorio_model");
        $this->load->model("operacion_model");
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
    public function ver_estadocuentasxfecha(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Estado de cuentas por fecha",
                "label" => "Rep",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/estadodecuentaxfecha_view",
                "clientes" => $this->directorio_model->get_lista_clientes(),

            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function estadocuentasxfecha($fecha,$cliente){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Estado de cuentas por fecha",
                "label" => "Lin",
                "label2" => "list",
                "titulo" => "",
                "ecxfecha" => $this->reporte_model->get_estadocuentasxfecha($fecha,$cliente),
                "main_content" => "user/lista_estadocuentasxfecha_view",


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
    public function morosos(){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Clientes morosos",
                "label" => "Inf",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/morosos_view",
                "morosos" => $this->reporte_model->get_lista_morosos(),

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


            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
    public function lineasxcortediscriminado($corte){
        $arr = $this->session->userdata('logged_in');
        if($this->session->userdata('logged_in'))
        {
            $content = array(
                "menu" => "Líneas por corte",
                "label" => "Lin",
                "label2" => "list",
                "titulo" => "",
                "main_content" => "user/lista_lineasxcortediscriminado_view",
                "lineasxcorte" => $this->reporte_model->get_lineasxcorte_discriminado($corte),
                "numerodelineas" => $this->reporte_model->get_totallineasporcorte($corte),
                "numerodelineasmys" => $this->reporte_model->get_totallineasporcortemys($corte),
                "numerodelineasalejandro" => $this->reporte_model->get_totallineasporcortealejandro($corte),

            );

            $this->load->view("templates/admin_template", $content);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');

        }

    }

    public function imprimir_factura($corte)
    {
        $arr = $this->session->userdata('logged_in');
        if ($this->session->userdata('logged_in')) {
            $content = array(
                //"data" => $this->apply_model->get_corte($corte_id),
                "doit" => 'I',
                "facturacion" => $this->reporte_model->get_facturacion($corte),
            );
            $this->load->library('Pdf');
            $this->load->view("factura_view", $content);
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
    public function imprimir_operacion($operacion)
    {
        $arr = $this->session->userdata('logged_in');
        if ($this->session->userdata('logged_in')) {
            $content = array(
                //"data" => $this->apply_model->get_corte($corte_id),
                "doit" => 'I',
                "operacion" => $this->operacion_model->get_operacion1($operacion),
            );
            $this->load->library('Pdf');
            $this->load->view("facturaoperacion_view", $content);
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
}