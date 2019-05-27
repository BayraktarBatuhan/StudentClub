<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class members extends CI_Controller {
      public function __construct()
	  {
		  parent::__construct();
		  
		  
		  $this->load->helper('url');
		  $this->load->library('session');
		  $this->load->database();
		  $this->load->model('Database_Model');
		  
		 
		  
	  }
	public function index()
	{
		
		
		
		
		
	}
	
	
	
	public function eklekaydet()
	{
             $data=array (
			
			'adsoyad' => $this->input->post('adsoyad'),
			'email' => $this->input->post('email'),
			'sifre' => $this->input->post('sifre'),
			'telefon' => $this->input->post('telefon'),
			'cinsiyet' => $this->input->post('cinsiyet'),
		
			);
			
			$this->Database_Model->insert_data("uyeler",$data);
			
			/*$table = $this->input->post('email');		
			$this->Database_Model->createtablekullanici($table);*/
	
			$this->session->set_flashdata("sonuc","Ekleme İşlemi Başarı İle Gerçekleştirildi");
			redirect (base_url()."home");
	}
	
	
	
	
	
	
	
}
