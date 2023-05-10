<?php

class Laporan_model extends CI_model {
    function __construct()
    {
        parent::__construct();
    }

    
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }
    public function joinmasuk()
    {
        $this->db->select('*');
        $this->db->from('barangmasuk');
        $this->db->join('produk', 'produk.id_produk=barangmasuk.id_produk');
        $this->db->join('penjual', 'penjual.id_penjual=barangmasuk.id_penjual');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function joinkeluar()
    {
        $this->db->select('*');
        $this->db->from('barangkeluar');
        $this->db->join('produk', 'produk.id_produk=barangkeluar.id_produk');
        $this->db->join('pembeli', 'pembeli.id_pembeli=barangkeluar.id_pembeli');
        $query=$this->db->get();
        return $query->result_array();
    }
    


}