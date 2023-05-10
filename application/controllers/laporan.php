<?php 

class laporan extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['judul'] = 'Laporan Produk Masuk';
        $data['join'] = $this->Laporan_model->joinmasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function produkKeluar()
    {
        $data['judul'] = 'Data Pengiriman';
        $data['join'] = $this->Laporan_model->joinkeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/produkkeluar', $data);
        $this->load->view('templates/footer');
    }

}