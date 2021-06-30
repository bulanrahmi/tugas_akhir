<?php

Class Depan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_user', 'muser');
    }

    function index() {
        //$data['dokter'] = $this->db->get('tbl_dokter')->result();
        $this->load->view('depan');
    }

    public function daftar()
    {
    	$user = $this->input->post('uname');
    	$password = $this->input->post('password');
    	$nama = $this->input->post('nama');
    	$no_bpjs = $this->input->post('no_bpjs');
    	$alamat = $this->input->post('alamat');
    	$no = $this->input->post('no_hp');

    	$data_user = array(
    		'username' => $user,
    		'password' => sha1($password),
    		'level' => 'user'
    	);
    	$id_user = $this->muser->daftar($data_user);

    	$data_detail_user = array(
    		'id_user' => $id_user,
    		'nama_pasien' => $nama,
    		'no_BPJS' => $no_bpjs,
    		'alamat' => $alamat,
    		'no_hp' => $no,
    	);
    	$this->muser->daftar_detail($data_detail_user);
    	$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan. Silahkan Login');
    	return redirect(site_url('depan#df'));
    }
}