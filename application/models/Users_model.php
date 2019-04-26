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

    public function add()
    {

        $kolcsonzo = array(
            'kolcsonzo_neve' => $this->input->post('kolcsonzo_neve')
        );
        $this->db->insert('kolcsonzo', $kolcsonzo);

        $query = $this->db->get_where
        (
            'Kolcsonzo',
            array(
                'kolcsonzo_neve' => $this->input->post('kolcsonzo_neve')
            )
        );
        $result_record = $query->row_array();

        $felhasznalo = array(
            'felhasznalo_neve' => $this->input->post('felhasznalo_neve'),
            'jelszo' => $this->input->post('jelszo'),
            'admin' => 0,
            'tartalom' => $this->input->post('tartalom'),
            'kolcsonzo_id' => $result_record['id']
        );
        $this->db->insert('felhasznalo', $felhasznalo);
    }


}