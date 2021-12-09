<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostModel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["posts"] = $this->PostModel->getAll();
        $this->load->view("templates/header");
        $this->load->view("history", $data);
        $this->load->view("templates/footer");
    }

}
