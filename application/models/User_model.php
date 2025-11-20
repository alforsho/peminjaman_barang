<?php
class User_model extends CI_Model {

    public function getByUsername($u){
        return $this->db->get_where('users', ['username' => $u])->row();
    }
}
?>
