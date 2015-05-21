<?php
$CI =& get_instance();
$CI->load->model('notificacion_model');

$content = array(
    "cortes" => $CI->notificacion_model->get_cortes(intval(date('d'))),
    "pagos" => $CI->notificacion_model->get_pagos(intval(date('d')),intval(date('m')),intval(date('y'))),
    "user" => $this->session->userdata('logged_in')
);



$this->load->view("templates/head");
$this->load->view("templates/header", $content);
$this->load->view("templates/sidebar");
$this->load->view($main_content);
$this->load->view("templates/footer");

