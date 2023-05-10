<?php

class Produk_model extends CI_model {
    function __construct()
    {
        parent::__construct();
    }

    public function getAllProduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('satuan', 'produk.id_satuan=satuan.id_satuan');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function carikategori()
    {
        $carikategori= $this->input->post('carikategori');
        $this->db->like('id_kategori', $carikategori);
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('satuan', 'produk.id_satuan=satuan.id_satuan');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function pencarian()
    {
        $keyword= $this->input->post('keyword');
        $this->db->like('id_produk', $keyword);
        $this->db->or_like('nama_produk', $keyword);
        $this->db->or_like('merk', $keyword);
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('satuan', 'produk.id_satuan=satuan.id_satuan');
        $query=$this->db->get();
        return $query->result_array();
    }



    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }
    public function getAllSatuan()
    {
        return $this->db->get('satuan')->result_array();
    }
    public function tambahDataProduk()
    {
        $data = [

            "id_produk" => $this->input->post('id_produk', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "harga" => $this->input->post('harga', true),
            "merk" => $this->input->post('merk', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "stok" => $this->input->post('stok'),
            "id_satuan" => $this->input->post('satuan', true)
        ];
        
        $this->db->insert('produk', $data);
        
        $data = [
            "no_masuk" => $this->input->post('no_masuk', true),
            "id_produk" => $this->input->post('id_produk', true),
            "id_penjual" => $this->input->post('id_penjual', true),
            "tgl_masuk" => $this->input->post('tgl_masuk', true),
            "stok" => $this->input->post('stok', true),
            "harga" => $this->input->post('harga', true)
            
        ];
        $this->db->insert('barangmasuk', $data);

        $data = [
            "id_penjual" => $this->input->post('id_penjual', true),
            "nama_penjual" => $this->input->post('nama_penjual', true),
            "alamat_penjual" => $this->input->post('alamat_penjual', true)
        ];
        $this->db->replace('penjual', $data);

    }
    

    public function updateDataProduk()
    {
        $stok = $this->input->post('stok');
        $id_produk = $this->input->post('id_produk');
        $tambahstok = $this->input->post('tambahstok');
        $this->db->set('stok', $stok + $tambahstok);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');
        
        $data = [
            "no_masuk" => $this->input->post('no_masuk', true),
            "id_produk" => $this->input->post('id_produk', true),
            "id_penjual" => $this->input->post('id_penjual', true),
            "tgl_masuk" => $this->input->post('tgl_masuk', true),
            "stok" => $this->input->post('stok', true),
            "harga" => $this->input->post('harga', true)
            
        ];
        $this->db->insert('barangmasuk', $data);

        $data = [
            "id_penjual" => $this->input->post('id_penjual', true),
            "nama_penjual" => $this->input->post('nama_penjual', true),
            "alamat_penjual" => $this->input->post('alamat_penjual', true)
        ];
        $this->db->replace('penjual', $data);

    }
    
    public function kirimProduk()
    {
 
        $stok = $this->input->post('stok');
        $jumlah_produk = $this->input->post('jumlah_produk');
        $id_produk = $this->input->post('id_produk');

        $this->db->set('stok', $stok-$jumlah_produk);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');

        $data = [
            "no_keluar" => $this->input->post('no_keluar', true),
            "id_pembeli" => $this->input->post('id_pembeli', true),
            "id_produk" => $this->input->post('id_produk', true),
            "tgl_keluar" => $this->input->post('tgl_keluar', true),
            "jumlah_produk" => $this->input->post('jumlah_produk', true),
            "total_harga" => $this->input->post('total_harga', true)
            
        ];
        $this->db->insert('barangkeluar', $data);

        if ($jumlah_produk !=0||$jumlah_produk!=''){
            $raws= $this->db->select('id_produk', 'stok')->from('produk')->where('id_produk', $id_produk)->get()->row();
            if($jumlah_produk > $raws->stok){
                echo ('stok tidak cukup');
            }else{
                $this->db->set('stok', $raws->stok - $jumlah_produk);
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk');
            }
        }

        $data = [
            "id_pembeli" => $this->input->post('id_pembeli', true),
            "nama_pembeli" => $this->input->post('nama_pembeli', true),
            "alamat_pembeli" => $this->input->post('alamat_pembeli', true)
        ];
        $this->db->replace('pembeli', $data);

    }

    public function getProdukById($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk'=> $id_produk])->row_array();
    }
    
    public function getPenjualById($id_penjual)
    {
        return $this->db->get_where('penjual', ['id_penjual'=> $id_penjual])->row_array();
    }
    
    public function getPembeliById($id_pembeli)
    {
        return $this->db->get_where('pembeli', ['id_pembeli'=> $id_pembeli])->row_array();
    }

    public function masuk_code()
    {
        $this->db->select('RIGHT(barangmasuk.no_masuk,3) as kode', FALSE);
        $this->db->order_by('no_masuk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barangmasuk');
        if( $query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode) +1;
        }else{
            $kode=1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "IN".date('y').date('m').$kodemax;
        return $kodejadi;
    }
    
    public function keluar_code()
    {
        $this->db->select('RIGHT(barangkeluar.no_keluar,3) as kode', FALSE);
        $this->db->order_by('no_keluar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barangkeluar');
        if( $query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode) +1;
        }else{
            $kode=1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "EX".date('y').date('m').$kodemax;
        return $kodejadi;
    }


}