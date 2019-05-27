<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class etkinlikler extends CI_Controller {
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
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$query=$this->db->query("select * from etkinlikler");
		$data["veriler"]=$query->result();
		
		
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_etkinliklerliste');
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	public function ekle()
	{
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		

		
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_etkinliklerekle',$data);
	    $this->load->view('admin/_footer');
	}
	
	public function eklekaydet()
	{
		
		
		$data=array(
		'baslik' => $this->input->post('baslik'),
	
		'aciklama' => $this->input->post('aciklama'),
		'tablo_kayit' => $this->input->post('tablo_kayit'),
		
		
		'kulüp' => $this->input->post('kulüp'),
		'et_tarih' => $this->input->post('et_tarih'),

		);
		
		$table = $this->input->post('tablo_kayit');
        $this->Database_Model->createtable($table);
		
		
		$this->Database_Model->insert_data("etkinlikler",$data);
		$this->session->set_flashdata("sonuc","Ekleme İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."admin/etkinlikler");
	}
	
	public function guncellekaydet($id)
	{
		$data=array(
		'baslik' => $this->input->post('baslik'),
		'kulüp' => $this->input->post('kulüp'),
		'et_tarih' => $this->input->post('et_tarih'),
		'aciklama' => $this->input->post('aciklama'),
		
		
		
		);
		$this->Database_Model->update_data("etkinlikler",$data,$id);
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."admin/etkinlikler");
	}
	
	function sil($id)
	 {
		 $row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->tablo_kayit;
		 
		 $this->db->query("DELETE FROM etkinlikler WHERE Id=$id");
		 $this->db->query("DROP TABLE $row");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/etkinlikler");
	 }	 
	 
	 
	 
	public function duzenle($id)
	 {

	 
		 
		
		
		$sorgu=$this->db->query("SELECT *  FROM etkinlikler WHERE Id=$id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_etkinlikduzenle',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 public function katilacaklar($id)
	 {

	   $row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->tablo_kayit;
		 
		
		
		$sorgu=$this->db->query("SELECT *  FROM $row");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_etkinlikkatilacaklar',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 
	 
	

		
		
		
		
		

		
		
		
		
	
	
	
}
