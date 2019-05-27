<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class resignation extends CI_Controller {
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
		
		$query=$this->db->query("select * from konular");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("select * from resignation");
		$data["resignation"]=$query->result();
		
		
		
		
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_resignation',$data);
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	public function onayla($id)
	{
		$uye_id = $this -> db
       -> select('uye_id')
       -> where('Id', $id)
       -> limit(1)
       -> get('resignation')
       -> row()
        ->uye_id;
		
		$kulup_id = $this -> db
       -> select('kulup_id')
       -> where('Id', $id)
       -> limit(1)
       -> get('resignation')
       -> row()
        ->kulup_id;
		
		
		$aday_tablosu = $this -> db
       -> select('tablo_aday')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$baskan_tablosu = $this -> db
       -> select('tablo_baskan')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_baskan;
		
		
		$uye_kod = $this -> db
       -> select('uye_kod')
       -> where('uye_id', $uye_id)
       -> limit(1)
       -> get($aday_tablosu)
       -> row()
        ->uye_kod;
		
		$query=$this->db->query("DELETE FROM $baskan_tablosu WHERE uye_id=$uye_id");
		$query=$this->db->query("DELETE FROM $aday_tablosu WHERE uye_id=$uye_id");
		$query=$this->db->query("ALTER TABLE $baskan_tablosu DROP COLUMN $uye_kod");
		$query=$this->db->query("UPDATE kulupler SET baskan = null WHERE Id=$kulup_id");
		$query=$this->db->query("DELETE FROM resignation WHERE uye_id=$uye_id");
		
		$query=$this->db->query("UPDATE uyeler SET yetki = 'uye' WHERE Id=$uye_id");
		$query=$this->db->query("UPDATE uyeler SET kulup_id = null WHERE Id=$uye_id");
		$query=$this->db->query("DELETE FROM $baskan_tablosu");
		
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$query=$this->db->query("select * from konular");
		$data["veriler"]=$query->result();
		
		
		
		$query=$this->db->query("select * from $aday_tablosu");
		$data["artanlar"]=$query->result();
		
		$data["aday_tablosu"]=$aday_tablosu;
		$data["baskan_tablosu"]=$baskan_tablosu;
		
		
		$this->session->set_flashdata("sonuc","Artanları Temizlemelisiniz");
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_artanlar',$data);
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	public function temizle($uye_id,$aday_tablosu,$baskan_tablosu)
	{
		
		$uye_kod = $this -> db
       -> select('uye_kod')
       -> where('uye_id', $uye_id)
       -> limit(1)
       -> get($aday_tablosu)
       -> row()
        ->uye_kod;
		
		$query=$this->db->query("DELETE FROM $baskan_tablosu WHERE uye_id=$uye_id");
		$query=$this->db->query("ALTER TABLE $baskan_tablosu DROP COLUMN $uye_kod");
		$query=$this->db->query("DELETE FROM $aday_tablosu WHERE uye_id=$uye_id");
		
		
		
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		

		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$query=$this->db->query("select * from konular");
		$data["veriler"]=$query->result();
		
		
		
		$query=$this->db->query("select * from $aday_tablosu");
		$data["artanlar"]=$query->result();
		
		$data["aday_tablosu"]=$aday_tablosu;
		$data["baskan_tablosu"]=$baskan_tablosu;
		
		
		$this->session->set_flashdata("sonuc","Artanları Temizlemelisiniz");
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_artanlar',$data);
		$this->load->view('admin/_footer');
	}
	
	
	
	
	
	 
	
	 
	 
	 
	 

		
		
			
		
				
			
		
		
	
	
	
}
