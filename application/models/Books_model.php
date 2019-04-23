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

        $query= $this->db
            ->select('szerzo_neve')
            ->from('Szerzo')
            ->join('Szerzo_Konyv SK', 'Szerzo.id=SK.szerzo_id','LEFT')
            ->where('konyv_id='.$konyv_id)
            ->get();

        $result = $query->result_array();
        return $result;
    }

    public function get_kategoriak($konyv_id)
    {

        $query= $this->db
            ->select('kategoria_neve')
            ->from('Kategoria')
            ->join('Kategoria_Konyv KK', 'Kategoria.id=KK.kategoria_id','LEFT')
            ->where('konyv_id='.$konyv_id)
            ->get();

        $result = $query->result_array();
        return $result;
    }

    public function delete($id){
        return $this->db->delete('Konyv', array('id' => $id));
    }

}
