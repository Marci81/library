<?php


class File extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('file');
        $this->load->model('books_model');
    }

    public function fileWrite($id = NULL)
    {

        if ($id == NULL) {
            show_404();
        }

        $konyv = $this->books_model->get_record('Konyv', $id);
        $szerzok = $this->books_model->get_szerzok($id);
        $kategoriak = $this->books_model->get_kategoriak($id);

        $cim = $konyv['cim'];
        $tartalom = $konyv['tartalom'];
        $isbn = $konyv['isbn'];

        if (!write_file('./out/file.php', $cim . "\n\n" . $tartalom . "\n\n" . $isbn . "\n\n" . json_encode($szerzok) . "\n\n" . json_encode($kategoriak))) {
            echo 'Nem Sikerült a fájlba írás';
        } else {
            echo 'Sikeres fájlba írás';
        }
        redirect('/books/'.$id,'refresh');
    }


}