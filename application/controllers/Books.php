<?php


class Books extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //TODO HA OSSZEKOTOTED A DB VEL KESZITSD EL
//        $this->load->model('books_model');
        $this->load->helper('url_helper');


    }

    public function index(){

//        $books = $this->books_model->get_list();
//        $data['items'] = $books;

//        $this->load->view('books/list', $data);

        $this->load->view('books/list');

    }
}


