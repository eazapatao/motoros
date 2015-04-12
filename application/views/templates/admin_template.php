<?php
$CI =& get_instance();
$CI->load->model('notificacion_model');

$content = array(
    "cortes" => $CI->notificacion_model->get_cortes(intval(date('d')))
);
$this->load->view("templates/head");
$this->load->view("templates/header", $content);
$this->load->view("templates/admin_sidebar");
$this->load->view($main_content);
$this->load->view("templates/footer");

