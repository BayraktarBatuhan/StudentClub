<?php
 $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
 
 
 $this->load->view('_header',$data);

?>

<?php if ($this->session->flashdata("sonuc")) 
		{	  ?>
		<div class="alert alert-danger" role="alert">
					<strong>Operation!</strong> <?=$this->session->flashdata("sonuc")?>
				</div>
		<?php } ?>


<section id="cart_items">
   <div style="margin-left:150px; margin-right:150px;" class="main-container">
			
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Activity Name</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					
					
					
							
							<?php foreach ($veri as $rs)  {	 ?>
						
							<tr>
						
						
							
							
							
							<td class="cart_description">
								<h4><a href="<?=base_url()?>home/etkinlikdetay/<?=$rs->etkinlik_id?>"><?=$rs->etkinlik_adi?></a></h4>
								
							</td>
							
							<td><a href="<?=base_url()?>home/etkinliksil/<?=$rs->etkinlik_id?>/<?=$rs->uye_id?>" data-toggle="modal" class="btn btn-danger" onclick="return confirm('Silinecek emin misiniz?!');"  >
                                    I don't want join the Activity
                                </a></td>	
							
							
							
							
						</tr>
							
							<?php }?>
							
						

				

				
							
						
					</tbody>
					
				</table>
				
							
			</div>
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
