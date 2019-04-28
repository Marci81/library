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

    public function get_record($table, $id)
    {
        $query = $this->db->get_where
        (
            $table,
            array(
                'id' => $id
            )
        );
        $result_record = $query->row_array();
        return $result_record;
    }

    public function get_szerzok($konyv_id)
    {

        $query = $this->db
            ->select('szerzo_neve')
            ->from('Szerzo')
            ->join('Szerzo_Konyv SK', 'Szerzo.id=SK.szerzo_id', 'LEFT')
            ->where('konyv_id=' . $konyv_id)
            ->get();

        $result = $query->result_array();
        return $result;
    }

    public function get_kategoriak($konyv_id)
    {

        $query = $this->db
            ->select('kategoria_neve')
            ->from('Kategoria')
            ->join('Kategoria_Konyv KK', 'Kategoria.id=KK.kategoria_id', 'LEFT')
            ->where('konyv_id=' . $konyv_id)
            ->get();

        $result = $query->result_array();
        return $result;
    }

    public function delete($id)
    {
        return $this->db->delete('Konyv', array('id' => $id));
    }

    public function add()
    {

        $this->loadAddHelpers();

        $this->addtoBook();

        $this->addAuthor();

        $this->addCategory();

        $this->joinSzerzoToKonyv();


        $this->joinKategoriaToKonyv();


    }

    private
    function checkRecordExist($tableName, $value1, $value2DB)
    {
        $this->db->where($value1, $value2DB);
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) {
            return true;
        } else return false;
    }

    private
    function loadAddHelpers()
    {
        $this->load->helper('url');
        $this->load->helper('text');
    }

    private
    function addtoBook()
    {
        if ($this->checkRecordExist(
                'Konyv',
                'isbn',
                $this->input->post('isbn')) == false) {

            $konyv = array(
                'cim' => $this->input->post('cim'),
                'isbn' => $this->input->post('isbn'),
                'borito_url' => $this->input->post('borito_url'),
                'tartalom' => $this->input->post('tartalom')
            );
            $this->db->insert('Konyv', $konyv);

        }
    }

    private
    function addAuthor()
    {
        if ($this->checkRecordExist('Szerzo', 'szerzo_neve', $this->input->post('szerzo_neve')) == false) {

            $szerzo = array(
                'szerzo_neve' => $this->input->post('szerzo_neve')
            );
            $this->db->insert('Szerzo', $szerzo);
        }
    }

    private
    function addCategory()
    {
        if ($this->checkRecordExist('Kategoria', 'kategoria_neve', $this->input->post('kategoria_neve')) == false) {

            $kategoria = array(
                'kategoria_neve' => $this->input->post('kategoria_neve')
            );
            $this->db->insert('Kategoria', $kategoria);
        }
    }

    private
    function joinSzerzoToKonyv()
    {
        $query = $this->db->get_where
        (
            'Konyv',
            array(
                'cim' => $this->input->post('cim')
            )
        );
        $result_record = $query->row_array();

        $query = $this->db->get_where
        (
            'Szerzo',
            array(
                'szerzo_neve' => $this->input->post('szerzo_neve')
            )
        );
        $result_record2 = $query->row_array();

        $szerzo_konyv = array(

            'konyv_id' => $result_record['id'],
            'szerzo_id' => $result_record2['id'],

        );


        $this->db->insert('Szerzo_Konyv', $szerzo_konyv);
    }

    private function joinKategoriaToKonyv()
    {
        $query = $this->db->get_where
        (
            'Kategoria',
            array(
                'kategoria_neve' => $this->input->post('kategoria_neve')
            )
        );
        $result_record = $query->row_array();

        $query = $this->db->get_where
        (
            'Konyv',
            array(
                'cim' => $this->input->post('cim')
            )
        );
        $result_record2 = $query->row_array();

        $szerzo_konyv = array(

            'konyv_id' => $result_record2['id'],
            'kategoria_id' => $result_record['id'],

        );


        $this->db->insert('Kategoria_Konyv', $szerzo_konyv);
    }

    public function update($id)
    {

        $konyv = array(
            'id' => $id,
            'cim' => $this->input->post('cim'),
            'isbn' => $this->input->post('isbn'),
            'borito_url' => $this->input->post('borito_url'),
            'tartalom' => $this->input->post('tartalom')
        );
        $this->db->replace('Konyv', $konyv);

        $query = $this->db->get_where
        (
            'Szerzo',
            array(
                'szerzo_neve' => $this->input->post('szerzo_neve')
            )
        );

        $szerzok_record = $query->row_array();

        $szerzo = array(
            'id' => $szerzok_record['id'],
            'szerzo_neve' => $this->input->post('szerzo_neve')
        );
        $this->db->replace('Szerzo', $szerzo);


        $query = $this->db->get_where
        (
            'Kategoria',
            array(
                'kategoria_neve' => $this->input->post('kategoria_neve')
            )
        );

        $kategoria_record = $query->row_array();

        $kategoria = array(
            'id' => $kategoria_record['id'],
            'kategoria_neve' => $this->input->post('kategoria_neve')
        );
        $this->db->replace('Kategoria', $kategoria);

        $this->joinKategoriaToKonyv();
        $this->joinSzerzoToKonyv();

    }

    public function rent()
    {
        $date = date("Y-m-d");
        $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
        $date = date("Y-m-d", $date);

        $kolcsonzes = array(

            'konyv_id' => $this->input->post('konyv_id'),
            //TODO authentikáció kész megcsinálni
            'kolcsonzo_id' => 1,
            'tol' => date("Y-m-d"),
            'ig' => $date

        );
        $this->db->insert('Kolcsonzes', $kolcsonzes);
    }

    public function uj_konyv($isbn,$cim,$borito_url,$tartalom)
    {
        if ($this->checkRecordExist(
                'Konyv',
                'isbn',
                $isbn) == false) {

            $konyv = array(
                'cim' => $cim,
                'isbn' => $isbn,
                'borito_url' => $borito_url,
                'tartalom' => $tartalom
            );
            $this->db->insert('Konyv', $konyv);

        }
    }


}
