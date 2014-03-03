<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Crud extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_data($table, $data) {
        $insertSQL = $this->db->insert($table, $data);
        return $insertSQL;
    }

    public function update_data($table, $content, $selection) {
        $updateSQL = $this->db->where($selection, $content[$selection]);
        $updateSQL = $this->db->update($table, $content);
        return $updateSQL;
    }

    public function delete_data($table, $selection, $id) {
        $deleteSQL = $this->db->where($selection, $id);
        $deleteSQL = $this->db->delete($table);
        return $deleteSQL;
    }

    public function get_update_data($table, $selection) {
        $query = $this->db->query("SELECT * FROM $table WHERE $selection");
        return $query;
    }

}

/* End of file m_crud.php */
/* Location: ./application/models/m_crud.php */