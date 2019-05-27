<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uyeler extends CI_Controller {
      public function __construct()
	  {
		 	  parent::__construct();
		  
		  
		  $this->load->helper('url');
		  $this->load->library('session');
		  $this->load->database();
		  $this->load->model('Database_Model');
		  
		 if(!$this->session->userdata("admin_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'admin/login');  
		  }	
	  }
	public function index()
	{
		
	    $query=$this->db->query("select * from uyeler order by Id");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_uyeler');
		$this->load->view('admin/_footer');
		
		
		
		
	}

	 public function incele($id)
	 {
		$sorgu=$this->db->query("SELECT *  FROM uyeler WHERE Id=$id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_uyelergoster',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }

	 function sil($id)
	 {
		 $this->db->query("DELETE FROM uyeler WHERE Id=$id");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/uyeler");
	 }	 
}
