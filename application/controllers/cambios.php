<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cambios extends CI_Controller{

    function __construct()    {
        parent::__construct();
        $this->load->model("cambios_model");

    }


    public function index(){


            $content = array(
                "menu" => "Cambios",
                "label" => "alq",
                "label2" => "list",
                "titulo" => "Lista",
                "main_content" => "user/lista_cambios_view",
                "cambios" => $this->cambios_model->get_lista_cambios()//Pendiente
            );

            $this->load->view("templates/admin_template", $content);


    }

    public function nuevo_cambios(){
        $content = array(
            "menu" => "Cambios",
            "label" => "dir",
            "label2" => "new",
            "titulo" => "Nuevo registro de cambios",
            "cambios" => $this->cambios_model->get_lista_cambios(),
            "main_content" => "user/nuevo_cambio_view"
        );

        $this->load->view("templates/admin_template", $content);
    }




    function guardar_cambios(){
        $this->cambios_model->guardar_cambios();
        redirect('cambios', 'refresh');

    }

    function editar($id)
    {
        $content = array(
            "menu" => "Directorio",
            "label" => "lin",
            "label2" => "list",
            "titulo" => "Editar_Nomina",
            "nomina" => $this->nomina_model->get_info_cambios($id),
            "main_content" => "user/editar_nomina_view"
        );

        $this->load->view("templates/admin_template", $content);
    }
     function del($id)
    {
        $this->cambios_model->del_cambios($id);

        redirect("cambios", "refresh");
    }

    function upd_cambios()
    {
        $this->cambios_model->upd_cambios();
        redirect("cambios", "refresh");
    }


}

