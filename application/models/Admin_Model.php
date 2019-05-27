<?php


class Database_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		
	}
	
	public function insert_data($table,$data)
	{
		
		$this->db->insert($table,$data);
		return true;
		
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
			
			$query=$this->db>get();
			
			if($query->num_rows() == 1){
				return $query->result();
								
			}else {
				
				return false;
				
			}
			
		}
		
      
		
      
	
}