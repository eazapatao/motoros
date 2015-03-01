<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("plan_model");
    }

    public function index(){

        $content = array(
            "menu" => "Plan",
            "label" => "pla",
            "label2" => "list",
            "titulo" => "Lista",
            "main_content" => "user/lista_plan_view",
            "plan" => $this->plan_model->get_lista_plan()//Pendiente
        );

        $this->load->view("templates/user_template", $content);
    }

    public function nuevo_plan(){
        $content = array(
            "menu" => "Directorio",
            "label" => "pla",
            "label2" => "new",
            "titulo" => "Nuevo_plan",
            "main_content" => "user/nuevo_plan_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function guardar_plan(){
        $this->plan_model->guardar_plan();
        redirect('plan', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "PLan",
            "label" => "pla",
            "label2" => "list",
            "titulo" => "Editar_plan",
            "plan" => $this->plan_model->get_plan($id),
            "main_content" => "user/editar_plan_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function del($id)
    {
        $content = array(
            "menu" => "Plan",
            "label" => "pla",
            "label2" => "del",
            "titulo" => "Eliminar_Plan",
            "plan" => $this->plan_model->get_linea($id),
            "main_content" => "user/eliminar_plan_view"
        );

        $this->load->view("templates/user_template", $content);
    }

    function upd_plan()
    {
       $this->plan_model->upd_plan();
        redirect("plan", "refresh");
    }

    function del_plan()
    {
        $this->plan_model->del_plan();
        redirect("plan", "refresh");
    }
}