<?php
class Barang extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function index(){
        $data['barang'] = $this->Barang_model->getAll();
        $this->load->view('barang/index', $data);
    }

    public function tambah(){
        $this->load->view('barang/tambah');
    }

    public function simpan(){
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
        ];

        $this->Barang_model->insert($data);
        redirect('barang');
    }

    public function edit($id){
        $data['barang'] = $this->Barang_model->getById($id);
        $this->load->view('barang/edit', $data);
    }

    public function update($id){
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
        ];

        $this->Barang_model->update($id, $data);
        redirect('barang');
    }

    public function hapus($id){
        $this->Barang_model->delete($id);
        redirect('barang');
    }
}
?>
