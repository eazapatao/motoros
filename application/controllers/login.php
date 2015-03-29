<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            //If no session, redirect to login page
            redirect('admin', 'refresh');
        }
        else
        {
            $this->load->helper(array('form'));
            $this->load->view('login_view');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('login', 'refresh');
    }

}

