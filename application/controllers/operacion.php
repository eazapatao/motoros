<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operacion extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("operacion_model");
        $this->load->model("usuario_model");
        $this->load->model("directorio_model");
    }

    public function index(){

        $content = array(
            "menu" => "Operacion",
            "label" => "ope",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_operacion_view",
            "operacion" => $this->operacion_model->get_lista_operacion(),//Pendiente
            "totales" => $this->operacion_model->get_totales_operacion()

        );

        $this->load->view("templates/admin_template", $content);
    }

    public function nuevo_operacion(){
        $content = array(
            "menu" => "Operación",
            "label" => "ope",
            "label2" => "new",
            "titulo" => "Nueva operación",
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "clientes" => $this->directorio_model->get_lista_clientes(),
            "main_content" => "user/nuevo_operacion_view"
        );

        $this->load->view("templates/admin_template", $content);
    }

    function guardar_operacion()
    {
        $this->operacion_model->guardar_operacion();
        redirect('operacion', 'refresh');
    }

    function editar($id)
    {
        $content = array(
            "menu" => "Operación",
            "label" => "ope",
            "label2" => "list",
            "titulo" => "Editar_operacion",
            "operacion" => $this->operacion_model->get_info_operacion($id),
            "clientes" => $this->directorio_model->get_lista_clientes(),
            "usuarios" => $this->usuario_model->get_lista_usuarios(),
            "main_content" => "user/editar_operacion_view"
        );

        $this->load->view("templates/admin_template", $content);
    }

    function del($id)
    {
        $this->operacion_model->del_operacion($id);
        redirect("operacion", "refresh");
    }

    function upd_operacion()
    {
        $this->operacion_model->upd_operacion();
        redirect("operacion", "refresh");
    }

    function del_operacion()
    {
        $this->operacion_model->del_operacion();
        redirect("operacion", "refresh");
    }
}