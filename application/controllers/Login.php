<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('M_login','m_login');
    }
    function index(){
        $this->load->view('v_login');
    }
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('email')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['role_id']=='1'){
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['id_user'];
            $user_nama=$xcadmin['nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('level',$xcadmin['role_id']);
            echo $this->session->set_flashdata('msg','success');
            redirect('Task');
         }else{
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['id_user'];
             $user_nama=$xcadmin['nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
             $this->session->set_userdata('level',$xcadmin['role_id']);
             echo $this->session->set_flashdata('msg','success');
             redirect('Task');
         }

       }else{
         echo $this->session->set_flashdata('msg','error');
         redirect('Login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
