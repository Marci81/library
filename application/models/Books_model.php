<?php


class Books_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_list()
    {
        $query = $this->db->get('Konyv');
        $result = $query->result_array();
        return $result;
    }
}
