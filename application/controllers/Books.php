<?php


class Books extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('books_model');
        $this->load->helper('url_helper');


    }

    public function index()
    {

        $books = $this->books_model->get_list();
        $data['items'] = $books;

        $this->load->view('books/list', $data);
    }

    public function show($id = null)
    {
        if ($id == null) {
            show_error('Az oldal nem létezik');
        }

        $konyv = $this->books_model->get_record('Konyv', $id);
        $szerzok = $this->books_model->get_szerzok($id);
        $kategoriak = $this->books_model->get_kategoriak($id);


        if (empty($konyv) || empty($szerzok) || empty($kategoriak)) {
            show_404();
        }

        $data['kategoriak'] = $kategoriak;
        $data['szerzok'] = $szerzok;
        $data['konyv'] = $konyv;
        $this->load->view('books/show', $data);
    }

}


