<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baskanlar extends CI_Controller {
      public function __construct()
	  {
		  parent::__construct();
		  
		  
		  $this->load->helper('url');
		  $this->load->library('session');
		  $this->load->database();
		 $this->load->dbforge();
		  $this->load->model('Database_Model');
		  
		 if(!$this->session->userdata("admin_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'admin/login');  
		  }	
		  
	  }
	public function index($id)
	{
		$query=$this->db->query("SELECT * FROM kulupler WHERE Id=$id");
		$data1["veriler"]=$query->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$row = $this -> db
       -> select('aday_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->aday_secim;
		
		if($row==1){
			
			$this->session->set_flashdata("sonuc","ADAYLIK SEÇİMLERİ VAR");
			
		}
		
		$row2 = $this -> db
       -> select('baskan_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->baskan_secim;
		
		if($row2==1){
			
			$this->session->set_flashdata("sonuc","BAŞKANLIK SEÇİMLERİ VAR");
			
		}
		
		
		$data["id"]=$id;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_baskanlar',$data1);
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
	 
	 public function adaylar($id,$kulup_id)
	 {
		 $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$row2 = $this -> db
       -> select('adi')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 
		 
		$sorgu=$this->db->query("SELECT *  FROM $row");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		$data["adi"]=$row2;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupadaylar',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 public function onayla($id,$uye_id)
	 {
		 $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$row2 = $this -> db
       -> select('adi')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 
		 
		$query2=$this->db->query("UPDATE $row SET durum='onay' WHERE uye_id=$uye_id");
		
		$sorgu=$this->db->query("SELECT *  FROM $row");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		$data["adi"]=$row2;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupadaylar',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 public function kod($id,$uye_id)
	 {
		 $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		 
		 
		 
		$sorgu=$this->db->query("SELECT * FROM $row WHERE uye_id=$uye_id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kodduzenle',$data);
		$this->load->view('admin/_footer');
		 
	 }
	 
	 public function kodguncelle($kulup_id,$uye_id)
	{
		$row = $this -> db
       -> select('tablo_baskan')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_baskan;
		
		$row2 = $this -> db
       -> select('tablo_aday')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$uye_kod=$this->input->post('uye_kod');
		
		
		$query2=$this->db->query("UPDATE $row2 SET uye_kod='$uye_kod' WHERE uye_id=$uye_id");
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		
	
	$fields = array(
        $uye_kod => array('type' => 'VARCHAR(30)')
        );
	     $this->dbforge->add_column($row,$fields);
		 //$query2=$this->db->query("ALTER TABLE $row ADD $uye_kod VARCHAR(50)");   		
		//$this->Database_Model->baskantablealter($row,$uye_kod);
		
		
		
		redirect(base_url()."admin/baskanlar/adaylar/$kulup_id/$kulup_id");
	}
	 
	 
	 
	 
	  public function adaysil($id,$uye_id)
	 {
		 $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		 
		 
		 
		$query2=$this->db->query("DELETE FROM $row WHERE uye_id=$uye_id");
		
		$sorgu=$this->db->query("SELECT *  FROM $row");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_kulupadaylar',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 
	 
	 
	 public function adaybaslat($id)
	 {
		 
		 $row = $this -> db
       -> select('baskan_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->baskan_secim;
		
		if($row==1){
			
			$this->session->set_flashdata("sonuc","Başkanlık Seçimleri Sürüyor");
			redirect (base_url()."admin/baskanlar/adaylar/$id/$id");
			
		}
		
		else{
			
			
			$sorgu=$this->db->query("UPDATE kulupler SET aday_secim=1 WHERE Id=$id");
		//$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		redirect (base_url()."admin/baskanlar/adaylar/$id/$id");
			
			
		}
		 
		 
		 
		
	 
	 }
	 
	 public function secimbaslat($id)
	 {
		 $row = $this -> db
       -> select('aday_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->aday_secim;
		
		if($row==1){
			
			$this->session->set_flashdata("sonuc","Adaylıklar Sürüyor");
			redirect (base_url()."admin/baskanlar/adaylar/$id/$id");
			
		}
		 
		 else{
			 
			 $sorgu=$this->db->query("UPDATE kulupler SET baskan_secim=1 WHERE Id=$id");
		//$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		redirect (base_url()."admin/baskanlar/adaylar/$id/$id");
			 
			 
			 
		 }
		 
		 
		
	 
	 }
	 
	 public function adaydurdur($id)
	 {
		 
		 
		 
		 
		$sorgu=$this->db->query("UPDATE kulupler SET aday_secim=0 WHERE Id=$id");
		//$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		redirect (base_url()."admin/baskanlar/index/$id");
		
		
		 
	 }
	 
	 public function secimbitir($id)
	 {
		 
		 
		/* $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		 
		 
		 
		$query1=$this->db->query("SELECT uye_adi FROM $row WHERE MAX(oy)");
		$a=$query1->result();
		
		
		$row2 = $this -> db
       -> select('uye_adi')
       -> where('oy', $query1)
       -> limit(1)
       -> get($row)
       -> row()
        ->uye_adi;
		
		
		$query2=$this->db->query("UPDATE kulupler SET baskan=$row2 WHERE Id=$id");*/
		 
		 
		$sorgu=$this->db->query("UPDATE kulupler SET baskan_secim=0 WHERE Id=$id");
		//$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		redirect (base_url()."admin/baskanlar/index/$id");
		
		
		 
	 }
	 
	 public function sonuclar($id){
		 
		 $row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$query=$this->db->query("select * from $row WHERE durum='onay' ORDER BY oy DESC");
		$data["adaylar"]=$query->result();
		 
		 
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_sonuclar',$data);
		$this->load->view('admin/_footer');
		 
	 
	 }
	 
	 public function baskansec($kulup_id,$uye_id){
		 
	
		 $row = $this -> db
       -> select('aday_secim')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->aday_secim;
		
		$row2 = $this -> db
       -> select('baskan_secim')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->baskan_secim;
		
		
		if($row==0 && $row2==0){
			
			$row3 = $this -> db
       -> select('tablo_aday')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$row4 = $this -> db
       -> select('uye_adi')
       -> where('uye_id', $uye_id)
       -> limit(1)
       -> get($row3)
       -> row()
        ->uye_adi;
		
		
		$query=$this->db->query("UPDATE kulupler SET baskan='$row4' WHERE Id=$kulup_id");
		
		$query=$this->db->query("UPDATE uyeler SET yetki='baskan',kulup_id=$kulup_id WHERE Id=$uye_id");
		
		
		redirect (base_url()."admin/baskanlar/index/$kulup_id/$kulup_id");
		
			
		}
		
		else{
			
			$this->session->set_flashdata("sonuc","Seçimler Sürüyor");
			
			$query=$this->db->query("select * from kulupler");
		    $data["veri"]=$query->result();
			
			$data["id"]=$kulup_id;
		
		
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_sonuclar',$data);
		$this->load->view('admin/_footer');
			
			
		}
		
		
		
		 
		 
		
		 
	 
	 }
	 
	 
	
	
	
	
	
}
