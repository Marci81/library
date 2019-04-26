<?php


class Users_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_list()
    {
        $query = $this->db->get('felhasznalo');
        $result = $query->result_array();
        return $result;
    }

    public function get_kolcsonzo()
    {
        $query = $this->db->get('Kolcsonzo');
        $result = $query->result_array();
        return $result;
    }

}