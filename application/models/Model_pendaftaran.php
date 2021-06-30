<?php

Class Model_pendaftaran extends CI_Model {

    function add() {
        $data = array(

            'id_user' => $this->input->post('id_pasien'),
            // 'nama_pasien' => $this->input->post('nama_pasien'),
            'id_jenis_berobat' => $this->input->post('jenis_pasien'),
            'tanggal_daftar' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            //'no_pasien'=> no_antrian()
        );
        $this->db->insert('tbl_transaksi_pasien',$data);
    }
    
    function update(){
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'alamat' => $this->input->post('alamat'),
            'id_jenis_berobat' => $this->input->post('jenis_pasien'),
            'no_BPJS' => $this->input->post('no_BPJS'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $id_pasien= $this->input->post('id_pasien');
        $this->db->where('id_pasien',$id_pasien);
        $this->db->update('tbl_pasien',$data);
    }

}

?>