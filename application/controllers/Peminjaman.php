<?php
class Peminjaman extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Peminjaman_model');
        $this->load->model('Barang_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }
    }

    // ---------------------------------------------------
    // PEMINJAM: MELIHAT RIWAYAT PEMINJAMAN
    // ---------------------------------------------------
    public function index(){

        // Jika user adalah peminjam → tampilkan miliknya saja
        if ($this->session->userdata('role') == 'peminjam') {

            $id_user = $this->session->userdata('id');

            $data['peminjaman'] = $this->Peminjaman_model->getByUser($id_user);

            $this->load->view('peminjaman/index', $data);

        } else {

            // Jika pengawas → tampilkan semua pengajuan
            $data['peminjaman'] = $this->Peminjaman_model->getAll();

            $this->load->view('peminjaman/peminjaman_list', $data);
        }
    }

    // ---------------------------------------------------
    // PEMINJAM: HALAMAN FORM PENGAJUAN
    // ---------------------------------------------------
    public function ajukan(){

        if ($this->session->userdata('role') != 'peminjam') {
            redirect('dashboard/pengawas');
        }

        $data['barang'] = $this->Barang_model->getAll();
        $this->load->view('peminjaman/ajukan', $data);
    }

    // ---------------------------------------------------
    // PEMINJAM: SIMPAN PENGAJUAN
    // ---------------------------------------------------
    public function simpan(){

          $data = [
        'id_user'        => $this->session->userdata('id'),
        'id_barang'      => $this->input->post('id_barang'),
        'jumlah'         => $this->input->post('jumlah'),   // ← FIX
        'tanggal_pinjam' => date('Y-m-d'),
        'status'         => 'Menunggu'
    ];

        $this->Peminjaman_model->insert($data);

        redirect('peminjaman');
    }

    // ---------------------------------------------------
    // PENGAWAS: SETUJU PENGAJUAN
    // ---------------------------------------------------
    public function approve($id){

        if ($this->session->userdata('role') != 'pengawas')
            redirect('dashboard/peminjam');

        $this->Peminjaman_model->setStatus(
            $id,
            'Disetujui',
            $this->session->userdata('id')
        );

        redirect('peminjaman');
    }

    // ---------------------------------------------------
    // PENGAWAS: TOLAK PENGAJUAN
    // ---------------------------------------------------
    public function tolak($id){

        if ($this->session->userdata('role') != 'pengawas')
            redirect('dashboard/peminjam');

        $alasan = $this->input->post('alasan');

        $this->Peminjaman_model->tolak(
            $id,
            $alasan,
            $this->session->userdata('id')
        );

        redirect('peminjaman');
    }
}
?>
