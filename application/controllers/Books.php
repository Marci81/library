<?php


class Books extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('books_model');
        $this->load->helper('url_helper');

        $this->load->library('ion_auth');

        $this->lang->load('news');


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

        $data['kategoriak'] = $kategoriak;
        $data['szerzok'] = $szerzok;
        $data['konyv'] = $konyv;
        $this->load->view('books/show', $data);
    }

    public function delete($id = NULL)
    {
        if ($this->ion_auth->logged_in()) {
            if ($id == NULL) {
                show_404();
            }

            $this->books_model->delete($id);
        }
        else if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login', 'refresh');
        }
    }

    public function add()
    {
        if ($this->ion_auth->logged_in()) {
            $this->load->helper('form');

            $this->load->library('form_validation');

            $this->form_validation->set_rules('cim', 'Cím', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('books/add');
            } else {
                $this->books_model->add();
                redirect('/books', 'refresh');
            }
        }
        else if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login', 'refresh');
        }
    }


    public function edit($id = NULL)
    {
        if ($this->ion_auth->logged_in()) {
            if ($id == NULL) {
                show_404();
            }
            $this->load->helper('form');

            $this->load->library('form_validation');


            $konyv = $this->books_model->get_record('Konyv', $id);
            $szerzok = $this->books_model->get_szerzok($id);
            $kategoriak = $this->books_model->get_kategoriak($id);

            $data['kategoriak'] = $kategoriak;
            $data['szerzok'] = $szerzok;
            $data['konyv'] = $konyv;

            $this->load->view('books/edit', $data);
        }
        else if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login', 'refresh');
        }
    }

    public function update($id = NULL)
    {
        if ($this->ion_auth->logged_in()) {
            if ($id == NULL) {
                show_404();
            }
            $this->books_model->update($id);
            redirect('/books', 'refresh');
        }
        else if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login', 'refresh');
        }

    }

    public function rent()
    {
        if ($this->ion_auth->logged_in()) {
            $this->books_model->rent();
            redirect('/books', 'refresh');
        }
        else if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login', 'refresh');
        }
    }
}


