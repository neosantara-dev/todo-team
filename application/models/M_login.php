<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
	


    function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM tbl_user WHERE email='$u' AND _password =md5('$p')");
        return $hasil;
    }

}


/* End of file M_login.php */
/* Location: ./application/models/M_login.php */