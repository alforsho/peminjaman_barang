<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // lebih aman daripada 'auth'
        }
    }

    // Dashboard peminjam
    public function peminjam(){
        $this->load->view('dashboard/peminjam');
    }

    // Dashboard pengawas
    public function pengawas(){
        $this->load->view('dashboard/pengawas');
    }
}
