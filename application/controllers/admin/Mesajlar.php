<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesajlar extends CI_Controller {
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
		$query=$this->db->query("select * from mesajlar order by ID DESC");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/mesaj_listesi');
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	
	
	
	public function guncelle($id)
	{
		$data=array(
		'adminnotu' => $this->input->post('adminnotu'),
		
		);
		$this->Database_Model->update_data("mesajlar",$data,$id);
		$this->session->set_flashdata("sonuc","Notunuz Eklendi");
		
		redirect(base_url()."admin/mesajlar/detay/$id");
	}
	
	function sil($id)
	 {
		 $this->db->query("DELETE FROM mesajlar WHERE Id=$id");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/mesajlar");
	 }	 
	 
	public function detay($id)
	 {
		 $query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		 
		 
		$this->db->query("UPDATE mesajlar SET durum='Okundu' WHERE Id=$id");
		$sorgu=$this->db->query("SELECT *  FROM mesajlar WHERE Id=$id");
		$data["veriler"]=$sorgu->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/mesaj_detay',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 
	
	
	
	
	
}
