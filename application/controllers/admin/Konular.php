<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konular extends CI_Controller {
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
		
		
		
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_konularliste');
		$this->load->view('admin/_footer');
		
		
		
		
	}
	
	public function ekle()
	{
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		

		
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_konularekle',$data);
		$this->load->view('admin/_footer');
	}
	
	public function eklekaydet()
	{
		
		
		$data=array(
		'baslik' => $this->input->post('baslik'),
	
		'aciklama' => $this->input->post('aciklama'),
		
		
		'kulüp' => $this->input->post('kulüp'),

		);
		$this->Database_Model->insert_data("konular",$data);
		$this->session->set_flashdata("sonuc","Ekleme İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."admin/konular");
	}
	
	public function guncellekaydet($id)
	{
		$data=array(
		'baslik' => $this->input->post('baslik'),
		'kulüp' => $this->input->post('kulüp'),
		'aciklama' => $this->input->post('aciklama'),
		
		
		
		);
		$this->Database_Model->update_data("konular",$data,$id);
		$this->session->set_flashdata("sonuc","Güncelle İşlemi Başarı İle Gerçekleştirildi");
		
		redirect(base_url()."admin/konular");
	}
	
	function sil($id)
	 {
		 $this->db->query("DELETE FROM konular WHERE Id=$id");
		 $this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/konular");
	 }	 
	 
	public function duzenle($id)
	 {

	 
		 
		
		
		$sorgu=$this->db->query("SELECT *  FROM konular WHERE Id=$id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_konularduzenle',$data);
		$this->load->view('admin/_footer');
		
		
		 
	 }
	 
	 
	 
	 public function galeri_yukle($id)
		{
		$sorgu=$this->db->query("SELECT *  FROM konular_resimler WHERE konular_id=$id");
		$data["veriler"]=$sorgu->result();
		
		$query=$this->db->query("select * from kulupler");
		$data["veri"]=$query->result();
			
			$data["id"]=$id;
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
	    $this->load->view('admin\_konular_galeri_yukle',$data);
		$this->load->view('admin/_footer');
		
		
		}

		public function galeri_kaydet($id)
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
		                $data["veri"]=$query->result();

                        	$this->load->view('admin/_header');
							$this->load->view('admin/_sidebar',$data);
							$this->load->view('admin\_konular_resim_yukle',$data);
							$this->load->view('admin/_footer');
							
							redirect (base_url()."admin/konular/galeri_yukle/$id");
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
								redirect (base_url()."admin/konular/galeri_yukle/$id");
							
						
                }
				
		
	
	    }
		
					function resimsil($id,$resim_id)
	 {
		 $this->db->query("DELETE FROM konular_resimler WHERE Id=$resim_id");
		 $this->session->set_flashdata("sonuc","Resim Silme İşlemi Başarı ile Gerçekleştirildi");
		 redirect (base_url()."admin/konular/galeri_yukle/$id");
	 }
		
		public function resim_yukle($id)
		{
			$query=$this->db->query("SELECT * From konular WHERE ID= $id");
			$data["veri"]=$query->result();
			
			$query=$this->db->query("select * from kulupler");
		    $data["veri"]=$query->result();
			
			$data["id"]=$id;
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',$data);
	    $this->load->view('admin\_konular_resim_yukle',$data);
		$this->load->view('admin/_footer');
		
		
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
		                $data["veri"]=$query->result();

                        	$this->load->view('admin/_header');
							$this->load->view('admin/_sidebar',$data);
							$this->load->view('admin\_konular_resim_yukle',$data);
							$this->load->view('admin/_footer');
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
								redirect (base_url()."admin/konular");
							
						
                }
	
	    }
		
		
		
	
	
	
}
