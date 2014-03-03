<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('date'));
        $this->load->library(array('pagination'));
        $this->load->model(array("m_guest"));
    }

    public function index() {
        redirect("guest/show");
    }

    public function show() {
        $data['title'] = ("Tampil Buku Tamu");
        $limit = 3;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
        if (!$page) :$offset = 0;
        else :$offset = $page * $limit - $limit;
            if ($offset < 0)
                $offset = 0;
        endif;
        $config["base_url"] = base_url() . "guest/show/";
        $config["total_rows"] = $this->m_guest->count_all();
        $config["per_page"] = $limit;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['anchor_class'] = 'class="btn btn-default"';
        $config['cur_tag_open'] = '<a href="' . base_url() . $this->uri->uri_string() . '" class="btn btn-primary">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);

        $data["show"] = $this->m_guest->show($offset, $limit);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("guest", $data);
    }

    public function add() {
        $data['title'] = ("Tambah Buku Tamu");
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

        //validation set rules here
        $this->form_validation->set_rules('nama_buku', 'Field "Nama Tamu"', 'required');
        $this->form_validation->set_rules('keterangan', 'Field "Keterangan"', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("add", $data);
        } else {
            $insert_data['nama_buku'] = $this->input->post("nama_buku");
            $insert_data['keterangan'] = $this->input->post("keterangan");
            $this->m_crud->insert_data("bukutamu", $insert_data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
            redirect("guest/show");
        }
    }

    public function edit($id) {
        $data['title'] = ("Ubah Buku Tamu");
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

        //validation set rules here
        $this->form_validation->set_rules('nama_buku', 'Field "Nama Tamu"', 'required');
        $this->form_validation->set_rules('keterangan', 'Field "Keterangan"', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['show'] = $this->m_guest->by_id($id);
            $this->load->view("edit", $data);
        } else {
            $update_data['id'] = $this->input->post("id");
            $update_data['nama_buku'] = $this->input->post("nama_buku");
            $update_data['keterangan'] = $this->input->post("keterangan");
            $this->m_crud->update_data("bukutamu", $update_data, "id");
            $this->session->set_flashdata('message', 'Data <strong>' . $this->input->post("nama_buku") . '</strong> berhasil diubah');
            redirect("guest/show");
        }
    }

    public function delete($id) {
        $this->m_crud->delete_data("bukutamu", "id", $id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect("guest/show");
    }

}

/* End of file guest.php */
/* Location: ./application/controllers/guest.php */