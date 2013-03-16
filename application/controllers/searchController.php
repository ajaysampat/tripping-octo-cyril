<?php

class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');

        $this->load->model('search_model');
    }

    public function index()
    {
        $this->load->view('search_form');
    }

}
?>
