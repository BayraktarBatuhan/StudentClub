
				
				
					<div class="features_items"><!--features_items-->
					
					
						<h2 class="title text-center">
						
						<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"><?=$kulup?></td>
							<td class="image">Date</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					
					
					
							
							<?php foreach ($kategoriler as $rs)  {	 ?>
						
							<tr>
						
						
							
							
							
							<td class="cart_description">
								<h4><a href="<?=base_url()?>home/etkinlikdetay/<?=$rs->Id?>"><?=$rs->baslik?></a></h4>
								
							</td>
							<td class="cart_description">
								<h4><?=$rs->et_tarih?></h4>
								
							</td>
							
							
							
							
						</tr>
							
							<?php }?>
							
						

				

				
							
						
					</tbody>
					
				</table>
							 
							
						
						
						
						
						
						
					</div><!--features_items-->
					
				
					<div style="height:400px;"></div>
					
					
				</div>
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
	