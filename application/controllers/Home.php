<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_mahasiswa');

        if($this->session->userdata('status') != 'login')
        {
            $this->session->set_flashdata('success','<div class="alert alert-danger">
              Anda Belum Login
           </div>');
            return redirect('/');
        }

    }

    private $table = "tb_mahasiswa";

    public function index()
    {

        $data = [
            'title' => 'Dashboard Mahasiswa',
            'mahasiswa' => $this->M_mahasiswa->getAll()
        ];
        return $this->load->view('home',$data);
    }

    public function create()
    {
       return $this->load->view('create');
    }

    public function delete($id)
    {
        //echo $id;
        $this->db->where("id",$id);
        $this->db->delete($this->table);
        $this->session->set_flashdata('success','<div class="alert alert-success">
               Berhasil Di Hapus
           </div>');
               return redirect('/');

    }

    public function edit($id)
    {
        $idedit = $this->db->get_where($this->table,['id'=> $id]);
        
        return $this->load->view('edit', [
            "data_edit" => $idedit-> row_array()
        ]);

        
    }

    public function update(){
        
        $this->db->where("id",$this->input->post("id"));
        $result = $this->db->update($this->table,[
            'nama' => $this->input->post("nama"),
            'email' => $this->input->post("email"),
            'nim' => $this->input->post("nim"),
        ]);
        
        if($result)
        {
            $this->session->set_flashdata('success','<div class="alert alert-success">
            Berhasil Di Update
        </div>');
            return redirect('dashboard');
        }else{
            $this->session->set_flashdata('success','<div class="alert alert-danger">
            Gagal Di Tambahkan
        </div>');
            return redirect('dashboard');
        }
        
    }
    public function store()
    {
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('nim','Nim','required|trim');
 
        if($this->form_validation->run() == false)
        {
           return $this->create();
        }else{
           $result = $this->db->insert($this->table,[
            'nama' => $this->input->post("nama"),
            'email' => $this->input->post("email"),
            'nim' => $this->input->post("nim"),
           ]);

           if($result)
           {
               $this->session->set_flashdata('success','<div class="alert alert-success">
               Berhasil Di Tambahkan
           </div>');
               return redirect('dashboard');
            }else{
               $this->session->set_flashdata('errors','<div class="alert alert-danger">
               Maaf Data Gagal Di Tambahkan
                </div>');
               return redirect('dashboard');
               
           }

        }

    }

}
