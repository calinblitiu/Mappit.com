<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('poi_model');
    }

    public function index(){
    	$this->load->view("home/home");
    }

    public function getAllPois() {
    	$pois = $this->poi_model->getAllPoisArray();
    	echo json_encode($pois);
    }
}