<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{
    public function getCari($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_barang', $keyword);
        }
        return $this->db->get('tb_aset')->result_array();
    }
}
