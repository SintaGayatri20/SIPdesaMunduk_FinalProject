<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Menu_model');
        $this->load->helper('url');
    }


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }

    public function updateUserMenu($id)
    {
        $usermenu = $this->Menu_model;
        $data['usermenu'] = $usermenu->getId($id);

        $data['title'] = 'Edit User Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/updateUserMenu', $data);
        $this->load->view('templates/footer');
    }

    public function newUpdateMenu()
    {

        $menu   = $this->input->post('menu');
        $id     = $this->input->post('id');

        $data = array(
            'menu' => $menu,
        );

        $where = array('id' => $id);

        $this->Menu_model->newUpdateMenu($where, $data, 'user_menu');

        redirect('menu/index');
    }

    public function deleteuserMenu($id)
    {
        $where = array('id' => $id);
        $this->Menu_model->delete($where, 'user_menu');
        redirect('menu/index');
    }


    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['totPengunjung'] = $this->menu->getDataPengunjung();
        $data['totTps'] = $this->menu->getDataTotTPS();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/dashboard', $data);
        $this->load->view('templates/footer');
    }



    ///////////////////////////////////////////////////// CRUD SUB MENU ///////////////////////////////////////////////////////////////////

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title'     => $this->input->post('title'),
                'menu_id'   => $this->input->post('menu_id'),
                'url'       => $this->input->post('url'),
                'icon'      => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('menu/submenu');
        }
    }

    public function deleteSubmenu($id)
    {
        $where = array('id' => $id);
        $this->Menu_model->delete($where, 'user_sub_menu');
        redirect('menu/submenu');
    }

    public function editSubMenu($id)
    {
        $subMenu = $this->Menu_model;
        $userMenu = $this->Menu_model;
        $data['subMenu'] = $subMenu->getByIdSubMenu($id);
        $data['userMenu'] = $userMenu->getByUserMenu();
        $data['title'] = 'Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/updateSubMenu', $data);
        $this->load->view('templates/footer');
    }

    public function newUpdateSubMenu()
    {
        $menu       = $this->input->post('menu_id');
        $title      = $this->input->post('title');
        $url        = $this->input->post('url');
        $icon       = $this->input->post('icon');
        $is_active  = $this->input->post('is_active');
        $id         = $this->input->post('id_s');


        $data = array(

            'menu_id' => $menu,
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active,


        );
        $where = array('id' => $id);

        $this->Menu_model->newUpdateSubMenu($where, $data, 'user_sub_menu');

        redirect('menu/submenu');
    }

    ///////////////////////////////////////////////////// END CRUD SUB MENU ////////////////////////////////////////

    ///////////////////////////////////////////////////// CRUD SUB MENU ////////////////////////////////////////

    public function dataTempatWisata()
    {
        $data['title'] = 'Data Tempat Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['dataTPS'] = $this->menu->getDataTPS();
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        // $this->form_validation->set_rules('tarif ', 'Tarif', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tgl_upload', 'Tanggal Upload', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('link_berita', 'Link Berita', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dataTempatWisata', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );
            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
            $data = [
                'id_kategori'     => $this->input->post('id_kategori'),
                'tarif'           => $this->input->post('tarif'),
                'keterangan'      => $this->input->post('keterangan'),
                'tgl_upload'      => $this->input->post('tgl_upload'),
                'lokasi'          => $this->input->post('lokasi'),
                'link_berita'     => $this->input->post('link_berita'),
                'foto'            => $_FILES['image']['name']
            ];

            $this->db->insert('tb_tempatwisata', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('menu/dataTempatWisata');
        }
    }

    public function deleteDataTempatWisata($id)
    {
        $where = array('id_tps' => $id);
        $this->Menu_model->delete($where, 'tb_tempatwisata');
        redirect('menu/dataTempatWisata');
    }

    public function editDataTPS($id)
    {
        $tempatWisata = $this->Menu_model;
        $kategori = $this->Menu_model;
        $data['newdataTPS'] = $tempatWisata->getByIdDataTPS($id);
        $data['newKategori'] = $kategori->getByKategori();


        $data['title'] = 'Edit Data Tempat Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editDataTPS', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataTPS()
    {
        $id_kategori    = $this->input->post('id_kategori');
        $tarif          = $this->input->post('tarif');
        $keterangan     = $this->input->post('keterangan');
        $tgl_upload     = $this->input->post('tgl_upload');
        $lokasi         = $this->input->post('lokasi');
        $link_berita    = $this->input->post('link_berita');
        $foto           = $_FILES['image']['name'];
        $id             = $this->input->post('id_tps');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(

            'id_kategori'   => $id_kategori,
            'tarif'         => $tarif,
            'keterangan'    => $keterangan,
            'tgl_upload'    => $tgl_upload,
            'lokasi'        => $lokasi,
            'link_berita'   => $link_berita,
            'foto'          => $image_cek,


        );
        $where = array('id_tps' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_tempatwisata');

        redirect('menu/dataTempatWisata');
    }

    ///////////////////////////////////////////////////// END CRUD SUB MENU ////////////////////////////////////////

    ///////////////////////////////////////////////////// CRUD KATEGORI ////////////////////////////////////////

    public function dataKategori()
    {
        $data['title'] = 'Kategori Tempat Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataKategori'] = $this->db->get('tb_kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dataKategori', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $this->db->insert('tb_kategori', ['kategori' => $this->input->post('kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu/dataKategori');
        }
    }

    public function editDataKategori($id)
    {
        $datakategori = $this->Menu_model;
        $data['datakategori'] = $datakategori->getIdKategori($id);

        $data['title'] = 'Edit Kategori Tempat Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editKategori', $data);
        $this->load->view('templates/footer');
    }

    public function newEditKategori()
    {

        $kategori       = $this->input->post('kategori');
        $id             = $this->input->post('id_kategori');

        $data = array(
            'kategori' => $kategori,
        );

        $where = array('id_kategori' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_kategori');

        redirect('menu/dataKategori');
    }

    public function deleteDataKategori($id)
    {
        $where = array('id_kategori' => $id);
        $this->Menu_model->delete($where, 'tb_kategori');
        redirect('menu/dataKategori');
    }

    ///////////////////////////////////////////////////// END CRUD KATEGORI ////////////////////////////////////////

    ///////////////////////////////////////////////////// CRUD DATA GUIDE ////////////////////////////////////////

    public function dataGuide()
    {
        $data['title'] = 'Data Guide';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['guide'] = $this->db->get('tb_guide')->result_array();

        $this->form_validation->set_rules('nama_guide', 'Nama Guide', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('guide_rate', 'Guide Rate', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dataGuide', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );
            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');

            $this->db->insert('tb_guide', [
                'nama_guide'    => $this->input->post('nama_guide'),
                'no_hp'         => $this->input->post('no_hp'),
                'email'         => $this->input->post('email'),
                'guide_rate'    => $this->input->post('guide_rate'),
                'status'        => $this->input->post('status'),
                'foto_profile'  => $_FILES['image']['name']

            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu/dataGuide');
        }
    }

    public function deleteDataGuide($id)
    {
        $where = array('id_guide' => $id);
        $this->Menu_model->delete($where, 'tb_guide');
        redirect('menu/dataGuide');
    }

    public function editDataGuide($id)
    {
        $dataguide = $this->Menu_model;
        $data['dataGuide'] = $dataguide->getByIdDataGuide($id);


        $data['title'] = 'Edit Data Guide';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editDataGuide', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataGuide()
    {
        $nama_guide     = $this->input->post('nama_guide');
        $no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        $guide_rate     = $this->input->post('guide_rate');
        $status         = $this->input->post('status');
        $foto_profile   = $_FILES['image']['name'];
        $id             = $this->input->post('id_guide');

        $gambar         = $this->input->post('gambar');

        if ($foto_profile == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto_profile;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(

            'nama_guide'    => $nama_guide,
            'no_hp'         => $no_hp,
            'email'         => $email,
            'guide_rate'    => $guide_rate,
            'status'        => $status,
            'foto_profile'  => $image_cek,


        );
        $where = array('id_guide' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_guide');

        redirect('menu/dataGuide');
    }

    ///////////////////////////////////////////////////// END CRUD DATA GUIDE ////////////////////////////////////////

    ///////////////////////////////////////////////////// CRUD DATA TRANSAKSI////////////////////////////////////////

    public function dataTransaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['dataTransaksi'] = $this->menu->getDataTransaksi();


        // $data['tempatWisata'] = $this->menu->getTempatWisata();
        // $data['dataGuide'] = $this->menu->getDataGuide();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/dataTransaksi', $data);
        $this->load->view('templates/footer_tabel');
    }



    public function detailTransaksi($id)
    {
        $detailTransaksi = $this->Menu_model;
        $dataTPS = $this->Menu_model;
        $dataGuide = $this->Menu_model;
        $data['detailTransaksi'] = $detailTransaksi->getByIdDetailTransaksi($id);
        $data['dataTPS']         = $dataTPS->getByTPS();
        $data['dataGuide']       = $dataGuide->getByGuide();


        $data['title'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detailTransaksi', $data);
        $this->load->view('templates/footer');
    }

    public function updateVerify($id)
    {
        $data = array('verifikasi' => 1);
        $where = array('id_transaksi' => $id);
        $this->Menu_model->updateVerify($where, $data, 'tb_transaksi');
        redirect('menu/dataTransaksi');
    }

    public function updateFinished($id)
    {
        $data = array('finish' => 1);
        $where = array('id_transaksi' => $id);
        $this->Menu_model->updateFinished($where, $data, 'tb_transaksi');
        redirect('menu/dataTransaksi');
    }
}
