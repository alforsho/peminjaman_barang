<?php
class Barang_model extends CI_Model {

    public function getAll(){
        return $this->db->get('barang')->result();
    }

    public function insert($data){
        return $this->db->insert('barang', $data);
    }

    public function getById($id){
        return $this->db->get_where('barang', ['id_barang' => $id])->row();
    }

    public function update($id, $data){
        return $this->db->update('barang', $data, ['id_barang' => $id]);
    }

    public function delete($id){
        return $this->db->delete('barang', ['id_barang' => $id]);
    }
}
?>
