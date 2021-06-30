<?php  
Class Model_user extends CI_Model{
    
    protected $table = 'tbl_user';

    function chek_login($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $user= $this->db->get('tbl_user')->row_array();
        return $user;
    }

    public function daftar($data_user)
    {
    	$this->db->insert($this->table, $data_user);
    	return $insert_id = $this->db->insert_id();
    }

    public function daftar_detail($data_detail)
    {
    	$this->db->insert('tbl_pasien', $data_detail);
    }
}