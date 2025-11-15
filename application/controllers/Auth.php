<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function proses()
    {
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $this->load->model('Auth_model');
        $user = $this->Auth_model->cek_login($u, $p);

        if ($user) {

            $this->session->set_userdata([
                'id_user' => $user->id_user,
                'nama'    => $user->nama,
                'role'    => $user->role,
                'login'   => true
            ]);

            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
