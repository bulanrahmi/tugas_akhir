<?php

class Pendaftaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pendaftaran');
    }

    function index() {
        $id_user = $this->session->userdata('id');
        $level = $this->session->userdata('level');
        if ($level == 'admin') {
            $data['daftar'] = $this->db->query("
                select tp.id, ps.nama_pasien, tp.tanggal_daftar, tp.keterangan, jb.jenis_pasien from tbl_transaksi_pasien as tp, tbl_pasien as ps, jenis_berobat as jb
                where tp.id_user=ps.id_user and tp.id_jenis_berobat=jb.id
                ")->result();
        } else {
            // $data['daftar'] = $this->db->query("SELECT ts.id_pasien,ts.nama_pasien,ts.alamat,js.jenis_pasien,ts.no_BPJS,ts.no_hp FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_berobat=js.id and ts.id_user = $id_user")->result();

            $data['daftar'] = $this->db->query("
                select tp.id, ps.nama_pasien, tp.tanggal_daftar, tp.keterangan, jb.jenis_pasien from tbl_transaksi_pasien as tp, tbl_pasien as ps, jenis_berobat as jb
                where tp.id_user=ps.id_user and tp.id_jenis_berobat=jb.id and tp.id_user=$id_user
                ")->result();
        }
        // var_dump($data);
        $this->template->load('template', 'pendaftaran/list', $data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->add();
            redirect('Pendaftaran');
        } else {
            $this->template->load('template', 'pendaftaran/list');
        }
    }

    function show_by_id() {
        $id_pasien = $_GET['id_pasien'];
        $sql_pasien = "select * from v_daftar where id_pasien='$id_pasien'";
        $dokter = $this->db->query($sql_pasien)->row_Array();
        $data = array(
            'id_pasien' => $dokter['id_pasien'],
            'nama_pasien' => $dokter['nama_pasien'],
            'alamat' => $dokter['alamat'],
            'jenis_pasien' => $dokter['jenis_pasien'],
            'no_BPJS' => $dokter['no_BPJS'],
            'tanggal' => $dokter['tanggal'],
            'keterangan' => $dokter['keterangan'],
        );
        echo json_encode($data);
    }
    
    
    function update(){
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->update();
            redirect('Pendaftaran');
        } else {
            $this->template->load('template', 'pendaftaran/list');
            
        }
    }
    
    
    function hapus(){
        $id= $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('tbl_transaksi_pasien');
        redirect('Pendaftaran');
    }

}
?>

