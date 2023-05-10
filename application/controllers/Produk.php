<?php

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['judul'] = 'Stok Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        if( $this->input->post('keyword')){
            $data['produk']= $this->Produk_model->pencarian();
        }
        if( $this->input->post('carikategori')){
            $data['produk']= $this->Produk_model->carikategori();
        }
        $data['kategori'] = $this->Produk_model->getAllKategori();
        $data['satuan'] = $this->Produk_model->getAllSatuan();
        $data['kodemasuk'] = $this->Produk_model->masuk_code();
        $data['kodekeluar'] = $this->Produk_model->keluar_code();
        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function tambah()
    {
        $this->form_validation->set_rules('id_penjual', 'ID Penjual', 'required|numeric');
        $this->form_validation->set_rules('id_produk', 'ID Produk', 'trim|required|is_unique[produk.id_produk]');
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required');
        $this->form_validation->set_rules('alamat_penjual', 'Alamat Penjual', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'triim|required|is_unique[produk.nama_produk]');
        $this->form_validation->set_rules('merk', 'Merk Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required|numeric');
        $this->form_validation->set_rules('satuan', 'Satuan Produk', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal', 'required');
        if( $this->form_validation->run() == FALSE)
        {
            $data['judul'] = 'Stok Produk';
            $data['produk'] = $this->Produk_model->getAllProduk();
            if( $this->input->post('keyword')){
                $data['produk']= $this->Produk_model->pencarian();
            }
            if( $this->input->post('carikategori')){
                $data['produk']= $this->Produk_model->carikategori();
            }
            $data['kategori'] = $this->Produk_model->getAllKategori();
            $data['satuan'] = $this->Produk_model->getAllSatuan();
            $data['kodemasuk'] = $this->Produk_model->masuk_code();
            $data['kodekeluar'] = $this->Produk_model->keluar_code();
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Produk_model->tambahDataProduk();
            $this->session->set_flashdata('input', 'Ditambahkan');
            redirect('produk');
        }
    }
    
    public function update()
    {
        $this->form_validation->set_rules('id_penjual', 'ID Penjual', 'required|numeric');
        $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required');
        $this->form_validation->set_rules('alamat_penjual', 'Alamat Penjual', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required|numeric');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal', 'required');
        if( $this->form_validation->run() == FALSE)
        {
            $data['judul'] = 'Stok Produk';
            $data['produk'] = $this->Produk_model->getAllProduk();
            if( $this->input->post('keyword')){
                $data['produk']= $this->Produk_model->pencarian();
            }
            if( $this->input->post('carikategori')){
                $data['produk']= $this->Produk_model->carikategori();
            }
            $data['kategori'] = $this->Produk_model->getAllKategori();
            $data['satuan'] = $this->Produk_model->getAllSatuan();
            $data['kodemasuk'] = $this->Produk_model->masuk_code();
            $data['kodekeluar'] = $this->Produk_model->keluar_code();
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Produk_model->updateDataProduk();
            $this->session->set_flashdata('input', 'Di Update');
            redirect('produk');
        }
    }
    
    public function kirim()
    {
        
        $this->form_validation->set_rules('id_pembeli', 'ID Pembeli', 'required|numeric');
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required');
        $this->form_validation->set_rules('alamat_pembeli', 'Alamat Pembeli', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal', 'required');
        if( $this->form_validation->run() == FALSE)
        {
            $data['judul'] = 'Stok Produk';
            $data['produk'] = $this->Produk_model->getAllProduk();
            if( $this->input->post('keyword')){
                $data['produk']= $this->Produk_model->pencarian();
            }
            if( $this->input->post('carikategori')){
                $data['produk']= $this->Produk_model->carikategori();
            }
            $data['kategori'] = $this->Produk_model->getAllKategori();
            $data['satuan'] = $this->Produk_model->getAllSatuan();
            $data['kodemasuk'] = $this->Produk_model->masuk_code();
            $data['kodekeluar'] = $this->Produk_model->keluar_code();
            $this->load->view('templates/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        }else{
            
            $stok = $this->input->post('stok');
            $jumlah_produk = $this->input->post('jumlah_produk');
            
            if( $stok < $jumlah_produk ){
                
                $this->session->set_flashdata('stok', 'Dikirim');
                $data['judul'] = 'Stok Produk';
                $data['produk'] = $this->Produk_model->getAllProduk();
                if( $this->input->post('keyword')){
                    $data['produk']= $this->Produk_model->pencarian();
                }
                if( $this->input->post('carikategori')){
                    $data['produk']= $this->Produk_model->carikategori();
                }
                $data['kategori'] = $this->Produk_model->getAllKategori();
                $data['satuan'] = $this->Produk_model->getAllSatuan();
                $data['kodemasuk'] = $this->Produk_model->masuk_code();
                $data['kodekeluar'] = $this->Produk_model->keluar_code();
                $this->load->view('templates/header', $data);
                $this->load->view('produk/index', $data);
                $this->load->view('templates/footer');
                
            }else{
                
                $this->Produk_model->kirimProduk();
                $this->session->set_flashdata('input', 'Dikirim');
                redirect('produk');
            }

        }
    }

    public function getpenjual() 
    {
        echo json_encode($this->Produk_model->getPenjualById($_POST['id_penjual']));
    }
    
    public function getpembeli() 
    {
        echo json_encode($this->Produk_model->getPembeliById($_POST['id_pembeli']));
    }

    public function stokupdate() 
    {
        echo json_encode($this->Produk_model->getProdukById($_POST['id_produk']));
    }
    public function kirimproduk() 
    {
        echo json_encode($this->Produk_model->getProdukById($_POST['id_produk']));
    }

}