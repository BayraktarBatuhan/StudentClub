<?php


class Database_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		
		
		
	}
	
	public function insert_data($table,$data)
	{
		
		$this->db->insert($table,$data);
		return $this->db->insert_id();
		
	}
		public function update_data($table,$data,$id)
	{
		$this->db->where("Id",$id);
		$this->db->update($table,$data);
		return true;
		
	}
		
			public function login($tablo,$email,$sifre)
		
		{
			
			
			$this->db->select('*');
			$this->db->from($tablo);
			$this->db->where('email',$email);
			$this->db->where('sifre',$sifre);
			$this->db->limit(1);
			
			$query=$this->db->get();
			
			if($query->num_rows() == 1){
				return $query->result();
								
			}else {
				
				return false;
				
			}
			
		}
		
		function createtable($table)///DİNAMİK TABLO OLUŞTURMAK İÇİN
{
  $sql = "CREATE TABLE ".$table." (
  Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  uye_id VARCHAR(30) NOT NULL,
  uye_adi VARCHAR(30) NOT NULL,
  uye_email VARCHAR(30) NOT NULL,
  uye_tel VARCHAR(30) NOT NULL,
  uye_cinsiyet VARCHAR(30) NOT NULL,
  uye_yetki VARCHAR(30) NOT NULL,
  durum VARCHAR(30) NOT NULL DEFAULT 'beklemede'
  
  
  )";
  $query = $this->db->query($sql);
  return $query;
} 

function adaytable($table)//DİNAMİK TABLO OLUŞTURMAK İÇİN
{
  $sql = "CREATE TABLE ".$table." (
  Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  uye_id VARCHAR(30) NOT NULL,
  uye_adi VARCHAR(30) NOT NULL,
  uye_email VARCHAR(30) NOT NULL,
  uye_kod VARCHAR(30) NOT NULL,
  durum VARCHAR(30) NOT NULL DEFAULT 'beklemede',
  oy INT(11) NOT NULL DEFAULT '0'
  
  
  
  
  )";
  $query = $this->db->query($sql);
  return $query;
} 

function baskantable($table)//DİNAMİK TABLO OLUŞTURMAK İÇİN
{
  $sql = "CREATE TABLE ".$table." (
  Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  uye_id VARCHAR(30) NOT NULL
  
  
  
  
  )";
  $query = $this->db->query($sql);
  return $query;
} 

function baskantablealter($row,$uye_kod)//DİNAMİK TABLOYA SÜTUN EKLEMEK İÇİN
{
  $sql = "ALTER TABLE ".$row." ADD ( $uye_kod VARCHAR(30) NOT NULL)";
  $query = $this->db->query($sql);
  return $query;
} 



function createtablekullanici($table)//DİNAMİK TABLO OLUŞTURMAK İÇİN
{
  $sql = "CREATE TABLE ".$table." (
  Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  kulup VARCHAR(30) NOT NULL,
  etkinlik VARCHAR(30) NOT NULL
  
  
  
  )";
  $query = $this->db->query($sql);
  return $query;
} 



		
		
		
		
		public function konular_get($kategori)
		{
			$query = $this->db->query("SELECT * FROM konular WHERE kulüp=$kategori");
			
			return $query->result();
			
			
			
			
			
			
		}
		
		
		public function urun_get($id) //home sayfası kategor isim getirme
		{
			$query = $this->db->query("SELECT * FROM konular WHERE ID=$id");
			
			return $query->result();
				
		}

		

		
      
		
      
	
}