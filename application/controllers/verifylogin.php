<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation and select the rle an redirect for users
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_view');
        }
        else
        {
            //Go to private area
            $arr = $arr = $this->session->userdata('logged_in');
            if ($arr['role'] == 1){

                redirect('admin', 'refresh');

            }elseif($arr['role'] == 2){

                redirect('inicio', 'refresh');

            }
        }

    }

    function check_database($password)
    {

        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->usuario_model->login($username, $password);
        print_r($result);
        if($result)
        {
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->usu_id,
                    'username' => $row->usu_nick,
                    'role' => $row->usu_contrasena,
                    'user_state' => $row->usu_tipo
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}
?>