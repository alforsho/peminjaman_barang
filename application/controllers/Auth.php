<?php
class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index(){
        $this->load->view('auth/login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->getByUsername($username);

        // cek password tanpa hash
        if($user && $password == $user->password){

            $this->session->set_userdata([
                'id'        => $user->id,
                'nama'      => $user->nama,
                'role'      => $user->role,
                'logged_in' => TRUE
            ]);

            if($user->role == 'peminjam'){
                redirect('dashboard/peminjam');
            } else {
                redirect('dashboard/pengawas');
            }

        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
?>
