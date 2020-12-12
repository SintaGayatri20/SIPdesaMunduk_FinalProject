<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    function get_lokasi()
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $lokasi = $this->db->get('tb_lokasi')->result_array();
        return $lokasi;
    }

    function get_lokasi_byId($id)
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->where('id_lokasi=', $id);
        $lokasi = $this->db->get('tb_lokasi')->row_array();
        return $lokasi;
    }

    function get_aset_byId($id)
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('kode_aset=', $id);
        $aset = $this->db->get('tb_aset')->row_array();
        return $aset;
    }

    function get_aset()
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $aset = $this->db->get('tb_aset')->result_array();
        return $aset;
    }

    public function get_Pelaporan()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        return $this->db->get('tb_pelaporan')->result_array();
    }

    public function getPelaporan()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        return $this->db->get('tb_pelaporan')->result_array();
    }
    public function getPelaporanLaboran()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        $this->db->where('tb_pelaporan.id_user', $this->session->userdata('id_user'));
        return $this->db->get('tb_pelaporan')->result_array();
    }
    function get_pelaporan_byId($id)
    {
        // $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('id_pelaporan', $id);
        $pelaporan = $this->db->get('tb_pelaporan')->row_array();
        return $pelaporan;
    }
    function get_user_byId($id)
    {
        $this->db->where('id_user=', $id);
        $user = $this->db->get('tb_user')->row_array();
        return $user;
    }

    function get_lokasi_aset()
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_aset', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->group_by('tb_lokasi.id_lokasi', 'ASC');
        $this->db->order_by('tb_prodi.fakultas', 'ASC');
        return $data = $this->db->get('tb_lokasi')->result_array();
    }


    //========================= ASET =========================
    public function save_aset()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|jpg|JPEG|jpeg|PNG|png|pdf|doc|docx|gif|ico',
            // 'file_name' => $_POST['nama'],
            'upload_path' => realpath('./upload/barang')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('userfile');


        $data = array(
            'id_lokasi' => $_POST['id_lokasi'],
            'nama_barang' => $_POST['barang'],
            'spesifikasi' => $_POST['spesifikasi'],
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'keterangan' => $_POST['keterangan'],
            'foto' => $_FILES['userfile']['name']
        );
        $this->db->insert('tb_aset', $data);
    }

    public function update_aset()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|JPEG|jpg|jpeg|png|gif|ico',
            // 'file_name' => $_POST['nama'],
            'upload_path' => realpath('./upload/barang')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('foto');


        $data = array(
            'id_lokasi' => $_POST['id_lokasi'],
            'nama_barang' => $_POST['barang'],
            'spesifikasi' => $_POST['spesifikasi'],
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'keterangan' => $_POST['keterangan'],
            'foto' => $_FILES['userfile']['name']
        );

        $this->db->where('md5(kode_aset)', $_POST['kode_aset']);
        $this->db->update('tb_aset', $data);
    }
    //======================= END ASET =======================


    // ======================= LOKASI ===========================
    function save_lokasi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_lab' => $_POST['lab']
        );
        $this->db->insert('tb_lokasi', $data);
    }

    function update_lokasi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_lab' => $_POST['lab']
        );
        $this->db->where('id_lokasi', $_POST['id']);
        $this->db->update('tb_lokasi', $data);
    }
    // ====================== END LOKASI ========================

    //========================= PRODI ===========================
    function save_prodi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_prodi' => $_POST['nama_prodi'],
            'jurusan' => $_POST['jurusan'],
            'fakultas' => $_POST['fakultas'],
        );
        $this->db->insert('tb_prodi', $data);
    }

    function update_prodi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_prodi' => $_POST['nama_prodi'],
            'jurusan' => $_POST['jurusan'],
            'fakultas' => $_POST['fakultas'],
        );

        $this->db->where('md5(id_prodi)', $_POST['id_prodi']);
        $this->db->update('tb_prodi', $data);
    }
    //========================= END PRODI ===========================

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //======================== DASHBOARD ============================
}
