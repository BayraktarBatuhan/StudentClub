<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kulupuyeler extends CI_Controller {
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
	public function index($id)
	{
		//$query=$this->db->query("SELECT adi FROM kulupler WHERE Id=$id");
		
		
		$row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_kayit;
		
		$query=$this->db->query("SELECT * FROM $row");	
		$data1["veriler"]=$query->result();
		
		
		
		
        
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupuyeler',$data1);
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	public function ekle()
	{
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupekle');
		$this->load->view('admin/_footer');
	}
	
	public function eklekaydet()
	{
             $data=array (
			
			'adi' => $this->input->post('adi'),
			
			
			);
			
			$this->Database_Model->insert_data("kulupler",$data);
	
			$this->session->set_flashdata("sonuc","Ekleme İşlemi Başarı İle Gerçekleştirildi");
			redirect (base_url()."admin/kulupler");
	}
	
	public function guncellekaydet($id)
	{
		$data=array(
		'adi' => $this->input->post('adi'),
		
		);
		$this->Database_Model->update_data("kulupler",$data,$id);
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."admin/kulupler");
	}
	
	function sil($id)
	 {
		 $this->db->query("DELETE FROM kulupler WHERE Id=$id");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/kulupler");
	 }	 
	 
	public function duzenle($id)
	 {
		$sorgu=$this->db->query("SELECT *  FROM kulupler WHERE Id=$id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupduzenle',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 
	
	
	
	
	
}
