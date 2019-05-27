<?php
 
 $id=$this->session->uye_session["id"];
		$query=$this->db->query("select * from uyeler WHERE Id=$id"); 
		
		$data["veriler2"]=$query->result();
		
		$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
 
 $this->load->view('_header',$data);
 $this->load->view('uye_sidebar',$data);
 
?>


<section id="form"><!--form-->




	
			<div>
			
			
			<form Id="guncellekaydet" action="<?=base_url()?>home/uyeguncelle/<?=$veriler2[0]->Id?>" method="post" >
											 
						    <tr>
            <td><label for="exampleInputEmail1" style="color:#4f4f4f">Name Surname</label></td>
            <td><input type="text" value="<?=$veriler2[0]->adsoyad?>" class="form-control" id="adsoy" name="adsoyad" placeholder="Enter email"></td>
          
           
            
          </tr>
						  
						 <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">E-mail</label></th>
            <th><input type="text" value="<?=$veriler2[0]->email?>" class="form-control" id="adsoy" name="email" placeholder="Enter email"></th>
            <th></th>
			<th></th>
			
           
            
          </tr>
						 <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">Phone</label></th>
            <th><input type="text" value="<?=$veriler2[0]->telefon?>" class="form-control" id="adsoy" name="telefon" placeholder="Enter email"></th>
            <th></th>
			<th></th>
			
           
            
          </tr>
		  
		  
		  
		   
							<button type="submit" class="btn btn-default">Update</button>
						</form>
			
			
			
			
			
			
			
			
			
			
			
			
			    </div>
		
	</section>
	<style>
 table,tr,th,td{border:none}
 .table{ width: 100%; display: table;}
 .table tbody>tr:nth-child(odd)>th,
 .table > tbody > tr:nth-child(odd) > td{background: #f9f9f9}
 .table tbody > tr > td,
 .table tbody > tr > th{padding: 10px 10px 10px 20px;}
 .table tbody > tr > td{border-top:1px solid #ddd;}
 th{text-align:left; color: #688a7e;    font-weight: bold;}
 .table > tbody > tr:hover > td, .table > tbody > tr:hover > th{background: #f5f5f5}

 /*ekranın hangi boyutlarında devreye gireceğini belirliyoruz*/
 @media 
 only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	/*tablomuzun thead gizliyoruz*/
	.table thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	.table tr { border: 1px solid #ccc; }
	
	.table td { 
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%!important; 
	}
	/*Burada td:before data-title ların css'i oluyor*/
	.table td:before { 
		position: absolute;
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
        font-weight:bold;
	}
   /*data-title valulerini alarak sütünümuza eklemiş oluyoruz*/
  .table td:before { content: attr(data-title);
 }
}
</style>
	<?php
				
                $this->load->view('_footer');
                 
				 ?>