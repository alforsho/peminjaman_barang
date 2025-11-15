<?php
class Auth_model extends CI_Model {

    function cek_login($u, $p)
    {
        return $this->db->get_where('users', [
            'username' => $u,
            'password' => $p
        ])->row();
    }

}
