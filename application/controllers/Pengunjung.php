<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{

    public function index()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';

        $data['tempatWisata'] = $this->db->get('tb_tempatwisata')->result_array();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar', $data);
        $this->load->view('pengunjung/index', $data);
        $this->load->view('pengunjung/template/footer');
    }
}
