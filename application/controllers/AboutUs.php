<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{

    public function index()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar');
        $this->load->view('pengunjung/aboutUs');
        $this->load->view('pengunjung/template/footer');
    }
    public function userLoginAbout()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin');
        $this->load->view('pengunjung/userLogin/aboutUs');
        $this->load->view('pengunjung/template/footer_userLogin');
    }
}
