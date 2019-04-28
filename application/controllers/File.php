<?php


class File extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->model('books_model');
        $this->load->helper(array('form', 'url'));
    }

    public function fileRead()
    {
        $readFile = read_file('./out/konyv.txt');
        $splitedReadFile = explode(';', $readFile);

        //@params $isbn,$cim,$borito_url,$tartalom
        $this->books_model->uj_konyv($splitedReadFile[0], $splitedReadFile[1], $splitedReadFile[2], $splitedReadFile[3]);
        redirect('/', 'refresh');
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
        redirect('/books/' . $id, 'refresh');
    }

    public function downloadFile()
    {

        force_download('./out/file.php', NULL);
    }

    public function upload()
    {
        $this->load->view('files/upload');
    }


    public function uploadFile()
    {


        $config['upload_path'] = './out/boritokep';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $this->upload->data();
        }

        redirect('/books', 'refresh');
    }
}