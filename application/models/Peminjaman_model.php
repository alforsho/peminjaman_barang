<?php
class Peminjaman_model extends CI_Model {

    // Insert data peminjaman
    public function insert($data){
        return $this->db->insert('peminjaman', $data);
    }

    // Ambil data berdasarkan ID user
    public function getByUser($id){
        $this->db->select("peminjaman.*, barang.nama_barang");
        $this->db->from("peminjaman");
        $this->db->join("barang", "barang.id_barang = peminjaman.id_barang");
        $this->db->where("id_user", $id);
        return $this->db->get()->result();
    }

    // Ambil semua data peminjaman untuk admin/pengawas
    public function getAll(){
        $this->db->select("peminjaman.*, users.nama, barang.nama_barang");
        $this->db->from("peminjaman");
        $this->db->join("users", "users.id = peminjaman.id_user");
        $this->db->join("barang", "barang.id_barang = peminjaman.id_barang");
        return $this->db->get()->result();
    }

    // Set status (Disetujui / Dipinjam / Selesai)
    public function setStatus($id, $status, $idPengawas=null){
        return $this->db->update("peminjaman", [
            "status" => $status,
            "pengawas_penyetuju" => $idPengawas
        ], ["id_peminjaman" => $id]);
    }

    // Tolak peminjaman
    public function tolak($id, $alasan, $idPengawas){
        return $this->db->update("peminjaman", [
            "status" => "Ditolak",
            "alasan_penolakan" => $alasan,
            "pengawas_penyetuju" => $idPengawas
        ], ["id_peminjaman" => $id]);
    }

    // Alias dari getByUser
    public function getByPeminjam($id){
        return $this->getByUser($id);
    }

    // 🔥 Ambil data berdasarkan status (Menunggu/Disetujui/Ditolak/Dipinjam/Selesai)
    public function getByStatus($status){
        $this->db->select("peminjaman.*, users.nama, barang.nama_barang");
        $this->db->from("peminjaman");
        $this->db->join("users", "users.id = peminjaman.id_user");
        $this->db->join("barang", "barang.id_barang = peminjaman.id_barang");
        $this->db->where("status", $status);
        return $this->db->get()->result();
    }

    // 🔥 Detail satu peminjaman
    public function getDetail($id){
        $this->db->select("peminjaman.*, users.nama, barang.nama_barang");
        $this->db->from("peminjaman");
        $this->db->join("users", "users.id = peminjaman.id_user");
        $this->db->join("barang", "barang.id_barang = peminjaman.id_barang");
        $this->db->where("id_peminjaman", $id);
        return $this->db->get()->row();
    }

    // 🔥 Update pengembalian barang (peminjaman selesai)
    public function updatePengembalian($id, $tanggalKembali){
        return $this->db->update("peminjaman", [
            "status" => "Selesai",
            "tanggal_kembali" => $tanggalKembali
        ], ["id_peminjaman" => $id]);
    }

    // 🔥 Hitung semua peminjaman
    public function hitungTotalPeminjaman(){
        return $this->db->count_all("peminjaman");
    }

    // 🔥 Hitung peminjaman per status (untuk dashboard)
    public function hitungStatus($status){
        $this->db->where("status", $status);
        return $this->db->count_all_results("peminjaman");
    }
}
?>
