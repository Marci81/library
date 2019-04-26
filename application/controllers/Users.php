<?php


class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('users_model');
        $this->load->helper('url_helper');

    }

    public function index()
    {

        $users = $this->users_model->get_list();
        $data['users'] = $users;

        $kolcsonzo = $this->users_model->get_kolcsonzo();
        $data['kolcsonzo'] = $kolcsonzo;

        $this->load->view('users/list', $data);
    }

}