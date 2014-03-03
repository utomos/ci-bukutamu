<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Guest extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count_all() {
        //ini dipergunakan untuk mendapatkan jumlah data dari tabel
        //seperti kita melakukan SELECT COUNT(id) FROM bukutamu
        //digunakan untuk pegination data ketika tampil
        return $this->db->count_all("bukutamu");
    }

    public function show($offset, $limit) {
        //ini untuk menampilkan semua data dengan kondisi limit data
        //seperti hanya menampilkan 30 data dari 100 per sekali tampil
        //offset digunakan untuk jumlah batasan
        //limit untuk batasan pra tampil
        //SELECT * FROM bukutamu LIMIT 0,10
        $this->db->limit($limit, $offset);
        return $this->db->get("bukutamu");
    }

    public function by_id($id) {
        //digunakan untuk tampil data hanya sesuai id yang dipilih
        //contoh : SELECT * FROM bukutamu WHERE id = 1
        $this->db->where("id", $id);
        return $this->db->get("bukutamu");
    }

}

/* End of file m_guest.php */
/* Location: ./application/models/m_guest.php */