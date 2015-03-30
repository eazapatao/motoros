<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('notificacion_model');
    }


    public function noti_corte(){


            $this->notificacion_model->get_cortes(30 - intval(date('d')));
    }
}