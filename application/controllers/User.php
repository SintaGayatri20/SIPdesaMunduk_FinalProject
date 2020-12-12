<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tempatWisata'] = $this->db->get('tb_tempatwisata')->result_array();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/template/navbar', $data);
        $this->load->view('pengunjung/index', $data);
        $this->load->view('pengunjung/template/footer');
    }

    public function userLogin()
    {
        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tempatWisata'] = $this->db->get('tb_tempatwisata')->result_array();
        $data['wisata'] = $this->db->get('tb_tempatwisata')->result_array();



        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/userlogin/wisata', $data);
        $this->load->view('pengunjung/template/footer_userLogin');
    }

    public function formTransaksi($id)
    {
        $dataTransaksi  = $this->Menu_model;
        $dataGuide = $this->Menu_model;
        $data['dtTrs']  = $dataTransaksi->getIdTransakasi($id);
        $data['dataGuide']       = $dataGuide->getByDataGuide();

        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['guide'] = $this->db->get('tb_guide')->result_array();

        $data['guide'] = $this->db->get_where('tb_guide', array('status' => 0))->result_array();

        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/formTransaksi', $data);
        $this->load->view('pengunjung/template/footer_userLogin', $data);
    }

    public function Invoice()
    {
        $this->load->model('Menu_model');
        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Menu_model->getInvoice();
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/invoice', $data);
        $this->load->view('pengunjung/template/footer_userLogin', $data);
    }

    public function detailInvoice($id)
    {
        $this->load->model('Menu_model');
        $data['dtInv'] = $this->Menu_model->getIdInvoice($id);
        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/detail_invoice', $data);
        $this->load->view('pengunjung/template/footer_userLogin', $data);
    }

    public function myOrder()
    {
        $this->load->model('Menu_model');
        $data['title'] = ':: SIP Desa Munduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['myorder'] = $this->Menu_model->detailInvoice();
        $this->load->view('pengunjung/template/header_userLogin', $data);
        $this->load->view('pengunjung/template/navbar_userLogin', $data);
        $this->load->view('pengunjung/myorder', $data);
        $this->load->view('pengunjung/template/footer_userLogin', $data);
    }




    public function insertTrans()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menu_model');
        $id_tps      = $this->input->post('id_tps');
        $user_id      = $this->input->post('user_id');
        $jp         = $this->input->post('jp');
        $total        = $this->input->post('total');
        $tgl_kunjungan    = $this->input->post('tgl_kunjungan');
        $alergi = $this->input->post('alergi');
        $alergi2 = $this->input->post('alergi2');
        $makanan = $this->input->post('makanan');
        $pilih_guide = $this->input->post('pilih_guide');
        $finish = 0;
        $rate_guide = $this->input->post('g_rate');
        $time_order = date('Y-m-d H:i:s');

        if ($alergi == 1) {
            $alergi3 = $alergi2;
        } else {
            $alergi3 = $alergi;
        }

        echo "ID Tempat : " . $id_tps . "<br>";
        echo "User ID :" . $user_id . "<br>";
        echo "J Pengunjung : " . $jp . "<br>";
        echo "Total Biaya : " . $total . "<br>";
        echo "Tgl Kunj : " . $tgl_kunjungan . "<br>";
        echo "Alergi : " . $alergi3 . "<br>";
        echo "Makanan : " . $makanan . "<br>";
        echo "Pilih Guide : " . $pilih_guide . "<br>";
        echo "Rate Guide : " . $rate_guide . "<br>";


        $data = array(

            'id_tps'     => $id_tps,
            'jml_pengunjung'  => $jp,
            'id_user'         => $user_id,
            'total_harga'     => $total + $rate_guide,
            'tgl_kunjungan'   => $tgl_kunjungan,
            'satus_alergi'    => $alergi3,
            'status_makanan'  => $makanan,
            'id_guide'        => $pilih_guide,
            'finish'          => $finish,
            'waktu_order'     => $time_order

        );

        $sql = $this->Menu_model->inputData($data);
        redirect('User/Invoice/');


        /*$this->load->model('Menu_model');
        $id_tps      = $this->input->post('id_tps');
        // $jp         = $this->input->post('jml_pengunjung');
        $total         = $this->input->post('total_harga');
        $tgl_kunjungan         = $this->input->post('tgl_kunjungan');
        // $status         = $this->input->post('status');
        $data = array(

            'id_tps'     => $id_tps,
            // 'jml_pengunjung'        => $jp,
            'total_harga'        => $total,
            'tgl_kunjungan'        => $tgl_kunjungan
            // 'status'        => $status
        );
        $sql = $this->Menu_model->inputData($data);
        redirect('pariwisata/userLoginPariwisata');*/
    }
}
