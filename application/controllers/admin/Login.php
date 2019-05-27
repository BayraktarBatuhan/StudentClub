<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
      public function __construct()
	  {
		  parent::__construct();
		   $this->load->helper('url');
		   $this->load->library('form_validation',"session");
	   	   
		   $this->load->model('Database_Model');
		   $this->load->database();
		  
		  
		
		  
	  }
	
	
	public function index()
	{
		
		  if($this->session->userdata('admin_session'))
		  {
			 
			 redirect(base_url().'admin/home');
			  
		  }
		
		$this->load->view('admin/login_form');
		
	}
	
	public function giris_yap()
	{
		
		
		
		$email=$this->input->post('email',TRUE);
		$sifre=$this->input->post('password',TRUE);
		
		
		$result=$this->Database_Model->login("kullanicilar",$email,$sifre);
		if($result)
		{
			
			
			$sess_array = array(
			'id' =>$result[0]->id,
			'adsoy' =>$result[0]->adsoy,
			'email' =>$result[0]->email,
			'yetki' =>$result[0]->yetki
			
			
			);
			
			$this->session->set_userdata('admin_session', $sess_array);
			
			redirect(base_url().'admin/home');
			
			
		}
		else
		{
			$this->session->set_flashdata("login_hata","Geçersiz Email ya da Şifre");
			redirect(base_url().'admin/login');
			
			//$this->load->view('admin/login_form');
			
			
			return FALSE;
		}
			
	}
	
	public function cikis_yap()
	{
		$this->session->unset_userdata('admin_session');
		redirect(base_url().'admin/login');
		
		
	}
	
	
	
		
		
		
		
		
		
		//$query=$this->db->query("SELECT * FROM kullanicilar WHERE")
		
	}

