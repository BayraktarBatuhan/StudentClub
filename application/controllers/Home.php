<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
      public function __construct()
	  {
		  parent::__construct();
		  
		   $this->load->database();
		  $this->load->helper('url');
		  $this->load->library('session');
		   $this->load->model('Database_Model');
	  }
	public function index()
	{
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("select * from slaytlar limit 4"); 
		$data["slider"]=$query->result();
		
		$query=$this->db->query("SELECT * fROM konular LIMIT 12 "); 
		$data["urunler"]=$query->result();
		
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		
		$this->load->view('_header',$data);
		$this->load->view('_slider');
		$this->load->view('_sidebar',$data);
		$this->load->view('_content',$data);
		$this->load->view('_footer');
		
		
		
		
	}
	
	
	
	
	public function iletisim()
	{
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		
		
		$this->load->view('iletisim',$data);
		
		
		
		
	}

	public function hakkimizda()
	{
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		
		
		$this->load->view('hak',$data);
		
		
		
		
	}

	public function ilet()
	{
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		
		
		$this->load->view('ilet',$data);
		
		
		
		
	}
	public function uyelik()
	{
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		   	
		$this->load->view('uyelik',$data);
		
		
		
		
	}
	
	public function uyepanel()
	{
		//üyeye ait
		  if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$id=$this->session->uye_session["id"];
		$query=$this->db->query("select * from uyeler WHERE Id=$id"); 
		
		$data["veriler2"]=$query->result();
		
		
		
		$this->load->view('uyepanel',$data);
		
			
		
	}
	
	public function kulupkatil()
	{
		//üyeye ait
		  if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$id=$this->session->uye_session["id"];
		$query=$this->db->query("select * from uyeler WHERE Id=$id"); 
		
		$data["veriler2"]=$query->result();
		
		/*$row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_kayit;*/
		
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
	
		$this->load->view('kulupform',$data);
	
	}
	
	
	public function kulupistek($id)
	{
		
		$kulüp=$this->input->post('kulüp');
		
		$row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $kulüp)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_kayit;
		
		
		$row2 = $this -> db
       -> select('adi')
       -> where('Id', $kulüp)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		
		
		$query=$this->db->query("select Id from $row WHERE uye_id=$id");
		$num_rows=$query->num_rows();
		
		if($num_rows>0){
			
			$this->session->set_flashdata("mesaj","Zaten Bu Kulüptesiniz");
			redirect(base_url()."home/kulupkatil");
			
		}
		
		else{
			$data=array(
	    'uye_id' => $id,
		'uye_adi' => $this->input->post('adsoyad'),
		'uye_email' => $this->input->post('email'),
		'uye_tel' => $this->input->post('telefon'),
		'uye_yetki' => $this->input->post('yetki'),
		'uye_cinsiyet' => $this->input->post('cinsiyet'),
		
		
		);
		
		$data2=array(
	    'uye_id' => $id,
		'kulup_id' => $this->input->post('kulüp'),
		'kulup_adi' => $row2
		
		
		
		);
		
		
		$this->Database_Model->insert_data($row,$data);
		$this->Database_Model->insert_data('kulup_kayit',$data2);
		$this->session->set_flashdata("mesaj","Kulübe Katıldınız");
		
		redirect(base_url()."home/kulupkatil");
			
		}
			
		}
		

		public function uyegiris_yap()
	{
		$email=$this->input->post('email');
		$sifre=$this->input->post('sifre');
		
		$email=$this->security->xss_clean($email);
		$sifre=$this->security->xss_clean($sifre);
		
		if( $email and $sifre )
		{
			
			$result=$this->Database_Model->login("uyeler",$email,$sifre);
			if($result)
			{
							
					$sess_array=array(
					'id' => $result[0]->Id,
					'adsoyad' => $result[0]->adsoyad,
					'email' => $result[0]->email,
					'yetki' => $result[0]->yetki,
					'telefon' => $result[0]->telefon,
					'cinsiyet' => $result[0]->cinsiyet,
					'kulup_id' => $result[0]->kulup_id,
					
					
					);
					
					$this->session->set_userdata("uye_session",$sess_array);
					
					redirect(base_url()."home/uyepanel");
	
			}
			
			else
			{
				$this->session->set_flashdata("mesaj","Geçersiz Email ya da Şifre");
				redirect(base_url()."home/uyelik");
			}
			
		}	
		
	}
	
	
		public function mesajkaydet()
	{
			$data=array(
		'adsoy' => $this->input->post('adsoy'),
		'email' => $this->input->post('email'),
		'tel' => $this->input->post('tel'),
		'mesaj' => $this->input->post('mesaj'),
		'Ip' => $_SERVER['REMOTE_ADDR']
		);
		$this->Database_Model->insert_data("mesajlar",$data);

        $adsoy = $this->input->post('adsoy');
		$email = $this->input->post('email');

			$query=$this->db->get("ayarlar");
		    $data["veri"]=$query->result();

	
		$this->session->set_flashdata("mesaj","Mesajınız Başarı İle Alındı");
		
		redirect(base_url()."home/iletisim");
		
		
	}

		public function yorumkaydet($id)
	{
		
		if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
			$data=array(
		'urun_id'=> $id,		
		'adsoy' => $this->input->post('adsoy'),
		'email' => $this->input->post('email'),
	
		'mesaj' => $this->input->post('mesaj'),
		'Ip' => $_SERVER['REMOTE_ADDR']
		);
		$this->Database_Model->insert_data("yorumlar",$data);

       $query=$this->db->query("SELECT * from yorumlar  where onay='Onaylandı' and urun_id=$id ORDER BY tarih desc"); 
		$data["yorumlar"]=$query->result();

		$this->session->set_flashdata("mesaj","Mesajınız Başarı İle Alındı");
		
		redirect(base_url()."home");
		
		
	}
	
	public function urundetay($id)
	
	{

		$data["tekurun"]=$this->Database_Model->urun_get($id);
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("select * from konular_resimler WHERE konular_id=$id"); 
		$data["resimler"]=$query->result();
		
		
		$query=$this->db->query("select * from konular WHERE Id= $id"); 
		$data["veri"]=$query->result();

		$query=$this->db->query("select * from konular WHERE Id= $id"); 
		$data["urun"]=$query->result();
		
		$query=$this->db->query("SELECT * from yorumlar  where onay='onaylandı' and urun_id=$id ORDER BY tarih desc"); 
		$data["yorumlar"]=$query->result();
		
		
		$this->load->view('urun_detay',$data);
	
	}
	
	public function etkinlikdetay($id)
	
	{
	
		$data["tekurun"]=$this->Database_Model->urun_get($id);
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
	
		
		$query=$this->db->query("select * from etkinlikler WHERE Id= $id"); 
		$data["veri"]=$query->result();

		$query=$this->db->query("select * from etkinlikler WHERE Id= $id"); 
		$data["urun"]=$query->result();
		
		$query=$this->db->query("SELECT * from yorumlar  where onay='onaylandı' and urun_id=$id ORDER BY tarih desc"); 
		$data["yorumlar"]=$query->result();
		
		
		$this->load->view('etkinlik_detay',$data);
	
	}
	

	
	public function uyeguncelle($id)
	{
		$data=array(
		'adsoyad' => $this->input->post('adsoyad'),
		'email' => $this->input->post('email'),
		'telefon' => $this->input->post('telefon'),
			
		);
		$this->Database_Model->update_data("uyeler",$data,$id);
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."home");
	}
	
	public function cikis_yap()
	{
		$this->session->unset_userdata("uye_session");
		
		redirect(base_url()."home/uyelik");
		
		
	}
	
	
		public function kuluplerim($id)
	{
		 if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
		    $musteri_id=$this->session->uye_session["id"];
			
			$query=$this->db->query("select * from ayarlar limit 1"); 
		    $data["veriler"]=$query->result();
		
			
			$query2=$this->db->query("SELECT * FROM kulup_kayit WHERE uye_id=$id"); 
			
		
		    $data["veri"]=$query2->result();
		   
		
		    $this->load->view('kuluplerim',$data);
	}
	
	function sil($id)
	 {
		 $this->db->query("DELETE FROM sepet WHERE Id=$id");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."home/sepetim");
	 }	
	 
	

	public function secimler($id)
		{
	

				$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$data["id"]=$id;

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_secim',$data);
		
		}
		
		
		
		public function aday($id)
		{
			
			if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		  
		  
		  $row = $this -> db
       -> select('aday_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->aday_secim;
		
		
		$row2 = $this -> db
       -> select('adi')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		  
		  
		  $row4 = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_kayit;
		  
		        $idi=$this->session->uye_session["id"];
				$query=$this->db->query("select * from $row4 WHERE uye_id=$idi");
				$num_rows2=$query->num_rows();
		  
		  
		  
		  if($num_rows2<1){
			  $this->session->set_flashdata("sonuc","$row2 kulübüne üye değilsin ");
					
					$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$data["id"]=$id;

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_secim',$data);
			  
		  }

                
				
				
		
		
		
				
				$query=$this->db->query("select aday_secim from kulupler WHERE Id=$id");
		        $num_rows=$query->num_rows();
				
				
				
				
				
				if($row==1){
					
					$query=$this->db->query("select * from kulupler");
				    $data["kulupler"]=$query->result();


				    $query=$this->db->query("select * from ayarlar limit 1");
				    $data["veriler"]=$query->result();
					
					 $row3 = $this -> db
		              -> select('tablo_aday')
                      -> where('Id', $id)
                      -> limit(1)
                      -> get('kulupler')
                      -> row()
                      ->tablo_aday;
		
		             $sorgu=$this->db->query("SELECT *  FROM $row3 WHERE durum='onay'");
		             $data["adaylar"]=$sorgu->result();
					
					$data["id"]=$id;
					
					$this->load->view('_header',$data);
                    $this->load->view('_sidebar',$data);
				    $this->load->view('_aday_ol',$data);
					
				}
				else{
					
					$this->session->set_flashdata("sonuc","$row2 kulübünün adaylık seçimleri yok ");
					
					$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$data["id"]=$id;

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_secim',$data);
				}
	
		}
		
		public function secim($id)
		{
			
			if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		  
		  
		  $row = $this -> db
       -> select('baskan_secim')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->baskan_secim;
		
		
		$row2 = $this -> db
       -> select('adi')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		  
		  
		  $row4 = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_kayit;
		  
		        $idi=$this->session->uye_session["id"];
				$query=$this->db->query("select * from $row4 WHERE uye_id=$idi");
				$num_rows2=$query->num_rows();
		  
		  
		  
		  if($num_rows2<1){
			  $this->session->set_flashdata("sonuc","$row2 kulübüne üye değilsin ");
					
					$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$data["id"]=$id;

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_secim',$data);
			  
		  }

                
				
				
		
		
		
				
				$query=$this->db->query("select baskan_secim from kulupler WHERE Id=$id");
		        $num_rows=$query->num_rows();
				
				
				
				
				
				if($row==1){
					
					$query=$this->db->query("select * from kulupler");
				    $data["kulupler"]=$query->result();


				    $query=$this->db->query("select * from ayarlar limit 1");
				    $data["veriler"]=$query->result();
					
					 $row3 = $this -> db
		              -> select('tablo_aday')
                      -> where('Id', $id)
                      -> limit(1)
                      -> get('kulupler')
                      -> row()
                      ->tablo_aday;
		
		             $sorgu=$this->db->query("SELECT * FROM $row3 WHERE durum='onay'");
		             $data["adaylar"]=$sorgu->result();
					
					$data["id"]=$id;
					
					$this->load->view('_header',$data);
                    $this->load->view('_sidebar',$data);
				    $this->load->view('_secim_yap',$data);
					
				}
				else{
					
					$this->session->set_flashdata("sonuc","$row2 kulübünün başkanlık seçimleri yok ");
					
					$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$data["id"]=$id;

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_secim',$data);
				}
	
		}
		
		
		
		
		
		
		public function adayol($id)
		{
			
			if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	

  			
				$row = $this -> db
       -> select('tablo_aday')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_aday;
		
		$idi=$this->session->uye_session["id"];
		$adi=$this->session->uye_session["adsoyad"];
	    $email=$this->session->uye_session["email"];
		
			
				$query=$this->db->query("select * FROM $row WHERE uye_id=$idi");
		        $num_rows=$query->num_rows();
				
				
				
				if($num_rows>0){
					
					$this->session->set_flashdata("sonuc","Zaten Adaysınız");
			        redirect(base_url()."home/aday/$id");
					
				}
			
				else{
					
					$data=array(
	                'uye_id' => $idi,
		             'uye_adi' => $adi,
					 'uye_email' => $email,
		
		
		
		           );
				   				   
				   $this->Database_Model->insert_data($row,$data);
		
		           $this->session->set_flashdata("sonuc","Adaylığınız İşleme Alındı");
		
		             redirect(base_url()."home/aday/$id");
				
				}

		}
		
		
		public function sec($id,$uye_kod)
		{
			
			if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	

  			
				$row = $this -> db
       -> select('tablo_baskan')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->tablo_baskan;
		
	
		$idi=$this->session->uye_session["id"];
		$adi=$this->session->uye_session["adsoyad"];
	    $email=$this->session->uye_session["email"];
		
			
				$query=$this->db->query("select * FROM $row WHERE uye_id=$idi");
		        $num_rows=$query->num_rows();
				
				
				
				if($num_rows>0){
					
					$this->session->set_flashdata("sonuc","Sadece Bir Oy Kullanabilirsiniz");
			        redirect(base_url()."home/secim/$id");
					
				}
			
				else{
					
					$data=array(
	                'uye_id' => $idi,
		             $uye_kod => $adi,
					 
		
		
		
		           );
				   				   
				   
				   
				   $row2 = $this -> db
                    -> select('tablo_aday')
                    -> where('Id', $id)
                    -> limit(1)
                    -> get('kulupler')
                    -> row()
                    ->tablo_aday;
					
					$row3 = $this -> db
                    -> select('oy')
                    -> where('uye_kod', $uye_kod)
                    -> limit(1)
                    -> get($row2)
                    -> row()
                    ->oy;
					
					$row4 = $this -> db
                    -> select('uye_id')
                    -> where('uye_kod', $uye_kod)
                    -> limit(1)
                    -> get($row2)
                    -> row()
                    ->uye_id;
				   
				   $row3 += 1;
				   
				   
				   $query=$this->db->query("UPDATE $row2 SET oy=$row3 WHERE uye_id=$row4");
				   $this->Database_Model->insert_data($row,$data);
				   
		
		           $this->session->set_flashdata("sonuc","Oy Kullandınız");
		
		             redirect(base_url()."home/secim/$id");
				
				}

		}
		
	
		
		public function etkinlikler($kulüp_id)
		{

                $query=$this->db->query("select * from etkinlikler WHERE kulüp=$kulüp_id");
				$data["kategoriler"]=$query->result();
				
				$row = $this -> db
       -> select('adi')
       -> where('Id', $kulüp_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
       ->adi;
				$data["kulup"]=$row;
				

				$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar',$data);
				$this->load->view('_etkinlik',$data);
		
		}

		public function kategori($kategori)
		{
                $query=$this->db->query("select * from konular WHERE kulüp=$kategori");
				$data["kategoriler"]=$query->result();
				
				$row = $this -> db
       -> select('adi')
       -> where('Id', $kategori)
       -> limit(1)
       -> get('kulupler')
       -> row()
       ->adi;
				$data["kulup"]=$row;
				
				$query=$this->db->query("select * from kulupler");
				$data["kulupler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar');
				$this->load->view('_kategori',$data);


				
		
				
		}
		
		public function kategori1($kategori)
		{

				$data["urun_kategori"]=$this->Database_Model->urunler_get_kategori($kategori);

				$query=$this->db->query("select * from kategoriler WHERE Id=$kategori"); 
				$data["kategoriler"]=$query->result();


				$query=$this->db->query("select * from ayarlar limit 1");
				$data["veriler"]=$query->result();

				
                $this->load->view('_header',$data);
                $this->load->view('_sidebar');
				$this->load->view('_kategori',$data);


				
		
				
		}
		
		
		

		public function search()
		{




				$sorgu=$this->input->post('sorgu');
			

				$query=$this->db->query("SELECT * FROM konular
           	    WHERE baslik LIKE '%"."$sorgu"."%' OR aciklama LIKE '%"."$sorgu"."%'"); 



				$data["urunler"]=$query->result();


				$query=$this->db->query("SELECT * from ayarlar limit 1");
				$data["veriler"]=$query->result();
				
				$query=$this->db->query("SELECT * from kulupler");
				$data["kulupler"]=$query->result();

				

				$musteri_id=$this->session->uye_session["id"];


					$this->load->view('_header',$data);
					$this->load->view('_sidebar',$data);
					$this->load->view('_aramaSonuclar',$data);
					
					
				
			
		}
		
		
		public function etkinlikkaydet($id)
	{
		
		if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
		$row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->tablo_kayit;
		
		
		$row2 = $this -> db
       -> select('baslik')
       -> where('Id', $id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->baslik;
		
		
		
		$idi=$this->session->uye_session["id"];
		$adi=$this->session->uye_session["adsoyad"];
		$email=$this->session->uye_session["email"];
		$yetki=$this->session->uye_session["yetki"];
		$telefon=$this->session->uye_session["telefon"];
		$cinsiyet=$this->session->uye_session["cinsiyet"];
		
		
		
		$query=$this->db->query("select Id from $row WHERE uye_id=$idi");
		$num_rows=$query->num_rows();
		
		if($num_rows>0){
			
			$this->session->set_flashdata("mesaj","Zaten Bu Etkinliktesiniz");
			redirect(base_url()."home/etkinlikdetay/$id");
			
		}
		
		else{
			$data=array(
	    'uye_id' => $idi,
		'uye_adi' => $adi,
		'uye_email' => $email,
		'uye_tel' => $telefon,
		'uye_yetki' => $yetki,
		'uye_cinsiyet' => $cinsiyet
		
		
		);
		
		$data2=array(
	    'uye_id' => $idi,
		'etkinlik_id' => $id,
		'etkinlik_adi' => $row2
		
		
		
		);
		
		
		$this->Database_Model->insert_data($row,$data);
		$this->Database_Model->insert_data('etkinlik_kayit',$data2);
		$this->session->set_flashdata("mesaj","Etkinliğe Katıldınız");
		
		redirect(base_url()."home/etkinlikdetay/$id");
			
		}
			
		}
		
		public function etkinliklerim($id)
	{
		 if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
		
		    $musteri_id=$this->session->uye_session["id"];
			
			$query=$this->db->query("select * from ayarlar limit 1"); 
		    $data["veriler"]=$query->result();
			
			
			
			
			
			$query2=$this->db->query("SELECT * FROM etkinlik_kayit WHERE uye_id=$id"); 
			
			
			
		    $data["veri"]=$query2->result();
		   
		 
		   
		   
	
		
		    $this->load->view('etkinliklerim',$data);
	}
	
	public function etkinliksil($etkinlik_id,$uye_id)
	{
		 
		$row1 = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $etkinlik_id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->tablo_kayit;
		   
		   
		   $query=$this->db->query("DELETE from $row1 WHERE uye_id=$uye_id"); 
		   $query=$this->db->query("DELETE from etkinlik_kayit WHERE uye_id=$uye_id"); 
		   
		   
			
			$query=$this->db->query("select * from ayarlar limit 1"); 
		    $data["veriler"]=$query->result();
			
			
			
			$id=$this->session->uye_session["id"];
			
			redirect(base_url()."home/etkinliklerim/$id");
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
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$data["id"]=$id;
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_sonuclar',$data);
		$this->load->view('_footer');
		 
	 
	 }
	 
	 
	 public function baskanetkinlik(){
		 
		 
		 
		 
		 $id=$this->session->uye_session["kulup_id"];
		 
		 $row = $this -> db
       -> select('adi')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 $data["kulup"]=$row;
		 
		 $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		 
		 $query=$this->db->query("SELECT * FROM etkinlikler WHERE kulüp=$id"); 
		$data["etkinlikler"]=$query->result();
		
		
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_baskanetkinlik',$data);
		$this->load->view('_footer');
		
		 
	 
	 }
	 
	 public function etkinlikekle()
	{
		$id=$this->session->uye_session["kulup_id"];
		 
		 $row = $this -> db
       -> select('adi')
       -> where('Id', $id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 $data["kulup"]=$row;
		 $data["kulup_id"]=$id;
		
		
		
        $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_baskanetkinlikekle',$data);
		
	}
	
	public function etkinlikeklekaydet()
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
		
		redirect(base_url()."home/baskanetkinlik");
	}
	
	public function etkinlikduzenle($id)
	 {

	 $idi=$this->session->uye_session["kulup_id"];
		 
		 $row = $this -> db
       -> select('adi')
       -> where('Id', $idi)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 $data["kulup"]=$row;
		 $data["kulup_id"]=$idi;
		 
		
		
		$sorgu=$this->db->query("SELECT *  FROM etkinlikler WHERE Id=$id");
		$data["etkinlikler"]=$sorgu->result();
		
		 $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_etkinlikduzenle',$data);
		
		
		 
	 }
	 
	 public function etkinlikguncellekaydet($id)
	{
		$data=array(
		'baslik' => $this->input->post('baslik'),
		'kulüp' => $this->input->post('kulüp'),
		'et_tarih' => $this->input->post('et_tarih'),
		'aciklama' => $this->input->post('aciklama'),
		
		
		
		);
		$this->Database_Model->update_data("etkinlikler",$data,$id);
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."home/baskanetkinlik");
	}
	
	function baskanetkinliksil($id)
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
		 redirect(base_url()."home/baskanetkinlik");
	 }	
	 
	  public function baskanetkinlikkatilacaklar($id)
	 {

	   $row = $this -> db
       -> select('tablo_kayit')
       -> where('Id', $id)
       -> limit(1)
       -> get('etkinlikler')
       -> row()
        ->tablo_kayit;
		 
		
		
		$sorgu=$this->db->query("SELECT *  FROM $row");
		$data["etkinlikler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_etkinlikkatilacaklar',$data);
		
		
		 
	 }
	 
	 public function paylasimlar()
	{
		$kulup_id=$this->session->uye_session["kulup_id"];
		 
		 
		 
		
		
		$query=$this->db->query("select * from konular where kulüp=$kulup_id");
		$data["konular"]=$query->result();
		
		
		
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_konular',$data);
		
		
		
		
	}
	
	public function konuekle()
	{
		
		$idi=$this->session->uye_session["kulup_id"];
		 
		 $row = $this -> db
       -> select('adi')
       -> where('Id', $idi)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		 
		 $data["kulup"]=$row;
		 $data["kulup_id"]=$idi;
		
		
        $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_konuekle',$data);
	}
	
	public function konueklekaydet()
	{
		
		
		$data=array(
		'baslik' => $this->input->post('baslik'),
	
		'aciklama' => $this->input->post('aciklama'),
		
		
		'kulüp' => $this->input->post('kulüp'),

		);
		$this->Database_Model->insert_data("konular",$data);
		$this->session->set_flashdata("sonuc","Ekleme İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."home/paylasimlar/");
	}
	
	public function konu_resim_yukle($id)
		{
			$query=$this->db->query("SELECT * From konular WHERE ID= $id");
			$data["veri"]=$query->result();
			
			
			
			$data["id"]=$id;
			
			
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_konu_resim_yukle',$data);
		
		
		}
		
		public function resim_kaydet($id)
		{
			$data["id"]=$id;
		
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2048;
                $config['max_height']           = 2048;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('resim'))
                {
                        $error =  $this->upload->display_errors();
						$this->session->set_flashdata("mesaj","Yüklemede Hata Oluştu :".$error);
						
						$query=$this->db->query("select * from kulupler"); 
		                $data["kulupler"]=$query->result();
		
		                $query=$this->db->query("select * from ayarlar limit 1"); 
		                $data["veriler"]=$query->result();
		
		
		                 $this->load->view('_header',$data);
		                 $this->load->view('_sidebar',$data);
		                 $this->load->view('_konu_resim_yukle',$data);
                }
                else
                {
							$upload_data=$this->upload->data();

								
							$data=array (
								'resim' =>$upload_data["file_name"]
								
								);
								$this->load->model("Database_Model");
								$this->Database_Model->update_data("konular",$data,$id);
						
								$this->session->set_flashdata("sonuc","Güncelleme İşlemi Başarı İle Gerçekleştirildi");
								redirect(base_url()."home/paylasimlar/");
							
						
                }
	
	    }
		
		 public function konu_galeri_yukle($id)
		{
		$sorgu=$this->db->query("SELECT *  FROM konular_resimler WHERE konular_id=$id");
		$data["galeriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler"); 
		                $data["kulupler"]=$query->result();
		
		                $query=$this->db->query("select * from ayarlar limit 1"); 
		                $data["veriler"]=$query->result();
			
			$data["id"]=$id;
		                 $this->load->view('_header',$data);
		                 $this->load->view('_sidebar',$data);
		                 $this->load->view('_konu_galeri_yukle',$data);
		
		
		}
		
		public function konu_galeri_kaydet($id)
		{
			$data["id"]=$id;
		
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2048;
                $config['max_height']           = 2048;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('resim'))
                {
                        $error =  $this->upload->display_errors();
						$this->session->set_flashdata("mesaj","Yüklemede Hata Oluştu :".$error);
						
						

                        	//$data["id"]=$id;
			
			
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
		
		$query=$this->db->query("select * from ayarlar limit 1"); 
		$data["veriler"]=$query->result();
		
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_konu_resim_yukle',$data);
							
							redirect (base_url()."home/konu_galeri_yukle/$id");
                }
                else
                {
							$upload_data=$this->upload->data();

								
							$data=array (
								'konular_id' => $id,
								'resim' =>$upload_data["file_name"]
								
								);
								$this->load->model("Database_Model");
								$this->Database_Model->insert_data("konular_resimler",$data);
						
								$this->session->set_flashdata("sonuc","Güncelleme İşlemi Başarı İle Gerçekleştirildi");
								redirect (base_url()."home/konu_galeri_yukle/$id");
							
						
                }
				
		
	
	    }
		
		public function konu_resimsil($id,$resim_id)
	 {
		 $this->db->query("DELETE FROM konular_resimler WHERE Id=$resim_id");
		 $this->session->set_flashdata("sonuc","Resim Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."home/konu_galeri_yukle/$id");
	 }
		
		
		public function resignation()
	 {
		 $baskan_id=$this->session->uye_session["id"];
		 $kulup_id=$this->session->uye_session["kulup_id"];
		 
		 $query=$this->db->query("select * from kulupler WHERE Id=$kulup_id"); 
		$data["baskanlar"]=$query->result();
		 
		 $query=$this->db->query("select * from kulupler"); 
		                $data["kulupler"]=$query->result();
		
		                $query=$this->db->query("select * from ayarlar limit 1"); 
		                $data["veriler"]=$query->result();
		 
		 $this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_resignation',$data);
		$this->load->view('_footer');
	 }
	 
	 public function do_resignation()
	 {
		 
		  $baskan_id=$this->session->uye_session["id"];
		 $kulup_id=$this->session->uye_session["kulup_id"];
		 $uye_adi=$this->session->uye_session["adsoyad"];
		 $yetki=$this->session->uye_session["yetki"];
		 
		 $query=$this->db->query("select * from resignation WHERE uye_id=$baskan_id");
		$num_rows=$query->num_rows();
		
		if($num_rows>0){
			
			$this->session->set_flashdata("sonuc","Daha Önce İstek Attınız");
			$query=$this->db->query("select * from kulupler WHERE Id=$kulup_id"); 
		$data["baskanlar"]=$query->result();
		 
		 $query=$this->db->query("select * from kulupler"); 
		                $data["kulupler"]=$query->result();
		
		                $query=$this->db->query("select * from ayarlar limit 1"); 
		                $data["veriler"]=$query->result();
		 
		 $this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_resignation',$data);
		$this->load->view('_footer');
			
		}
		 else{
			 $row = $this -> db
       -> select('adi')
       -> where('Id', $kulup_id)
       -> limit(1)
       -> get('kulupler')
       -> row()
        ->adi;
		
			 $data=array(
		'uye_id' => $baskan_id,
		'uye_adi' => $uye_adi,
     	'kulup_id' => $kulup_id,
		'kulup_adi' => $row

		);
		$this->Database_Model->insert_data("resignation",$data);
			 
			 $this->session->set_flashdata("sonuc","İsteğiniz İşleme Alındı");
			 redirect(base_url()."home/resignation");
			 
		 }
		 
		 
		 
		
		 
		 
		
		
		
		 
		 /*$query=$this->db->query("select * from kulupler WHERE Id=$kulup_id"); 
		$data["baskanlar"]=$query->result();
		 
		 $query=$this->db->query("select * from kulupler"); 
		                $data["kulupler"]=$query->result();
		
		                $query=$this->db->query("select * from ayarlar limit 1"); 
		                $data["veriler"]=$query->result();
		 
		 $this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('_resignation',$data);
		$this->load->view('_footer');*/
	 }
		
	
	
	
	
	
	
}
