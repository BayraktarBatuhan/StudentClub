<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class i_mesajlari extends CI_Controller {
      public function __construct()
	  {
		  parent::__construct();
		  
		  
		  $this->load->helper('url');
	  }
	public function index()
	{
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_i_mesajlari');
		$this->load->view('admin/_footer');
		
		
		
		
	}
}
