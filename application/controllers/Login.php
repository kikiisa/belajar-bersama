<?php 



class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index()
    {
       $this->load->view('login');
    }


    public function store()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $auth = $this->M_login->authenticate($username,$password);
        
        if($auth->num_rows() > 0)
        {
            $check = $auth->row_array();
            if($check['password'] == md5($password))
            {
                $this->session->set_userdata('status','login');
                $this->session->set_flashdata('success','<div id="peng" class="alert alert-success">
                Selamat Datang...
                </div>');
                return redirect('dashboard');
            }
        }else{
            $this->session->set_flashdata('success','<div class="alert alert-danger">
            Password dan Username Salah
            </div>');
            return redirect('/');
        }
    }

    public function log()
    {
        $this->session->sess_destroy();
        return redirect('/');

    }

}




?>