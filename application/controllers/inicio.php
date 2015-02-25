<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

    function __construct()    {
        parent::__construct();
    }

    public function index(){

        $content = array(
            "main_content" => "welcome_view"

        );

        $this->load->view("templates/user_template", $content);
    }
}

