<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Output extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostModel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $postModel = $this->PostModel;
        $ids = $this->uri->segment(2);
        $idc = substr($postModel->getById($ids)->COUNTRY_OF_ORIGIN,4,2);
        $data["post"] = $postModel->getById($ids);
        $data["country"] = $postModel->getCountryById($idc);
        if (!$data["post"]) show_404();
        
        $this->load->view('templates/header');
        $this->load->view('output', $data);
        $this->load->view('templates/footer');
        
    }

    
}
