<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostModel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["country"] = $this->PostModel->getAllCountry();
        $data["generate"] = $this->PostModel->generateId();
        $this->load->view('templates/header');
        $this->load->view("input",$data);
        $this->load->view('templates/footer');
        
    }
	
    
}
