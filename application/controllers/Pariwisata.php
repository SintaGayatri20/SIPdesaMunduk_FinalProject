<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pariwisata extends CI_Controller
{

    public function index()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $data['tempatWisata'] = $this->db->get('tb_tempatwisata')->result_array();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar', $data);
        $this->load->view('pengunjung/pariwisata', $data);
        $this->load->view('pengunjung/template/footer');
    }

    public function wisata()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['wisata'] = $this->menu->getWisata();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar');
        $this->load->view('pengunjung/wisata');
        $this->load->view('pengunjung/template/footer');
    }

    public function restoran()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['restoran'] = $this->menu->getRestoran();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar');
        $this->load->view('pengunjung/restoran');
        $this->load->view('pengunjung/template/footer');
    }

    public function hotel()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['hotel'] = $this->menu->getHotel();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar');
        $this->load->view('pengunjung/hotel');
        $this->load->view('pengunjung/template/footer');
    }

    //////////////////////////////// USER LOGIN ///////////////////////////////////////////

    public function userLoginPariwisata()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $data['tempatWisata'] = $this->db->get('tb_tempatwisata')->result_array();

        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/userLogin/pariwisata', $data);
        $this->load->view('pengunjung/template/footer_userLogin');
    }

    public function userLoginWisata()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['wisata'] = $this->menu->getWisata();

        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin');
        $this->load->view('pengunjung/userLogin/wisata');
        $this->load->view('pengunjung/template/footer_userLogin');
    }

    public function userLoginRestoran()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['restoran'] = $this->menu->getRestoran();
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin');
        $this->load->view('pengunjung/userLogin/restoran');
        $this->load->view('pengunjung/template/footer_userLogin');
    }

    public function userLoginHotel()
    {
        $data['title'] = ':: Pariwisata Desa Munduk';
        $this->load->model('Menu_model', 'menu');

        $data['hotel'] = $this->menu->getHotel();
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin');
        $this->load->view('pengunjung/userLogin/hotel');
        $this->load->view('pengunjung/template/footer_userLogin');
    }
}
