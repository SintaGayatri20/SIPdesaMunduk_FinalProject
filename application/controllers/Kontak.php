<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function index()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar');
        $this->load->view('pengunjung/kontak');
        $this->load->view('pengunjung/template/footer');
    }

    public function userLoginKontak()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin');
        $this->load->view('pengunjung/userLogin/kontak');
        $this->load->view('pengunjung/template/footer_userLogin');
    }
}
