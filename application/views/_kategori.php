
				
				
					<div class="features_items"><!--features_items-->
					
					
						<h2 class="title text-center">
						
						<?=$kulup?>
						
						</h2>
							 
							 
							 <div style="height:150px;"><a href="<?=base_url()?>home/kulupkatil/"><button href="" type="submit" class="btn btn-default">Do you want to join the club?</button></a></div>
							 
							 
						
						<?php
						
						
						
						
						
						
						
						foreach($kategoriler as $rs)
						
						{
						?>
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="<?=base_url()?>/home/urundetay/<?=$rs->ID?>"><img src="<?=base_url()?>uploads/<?=$rs->resim?>" alt="" /></a>
											
											<p><?=$rs->baslik?></p>
											
										</div>
										
								</div>
								<div class="choose">
									
								</div>
							</div>
							</div>
							
							
							
							<?php
					
						
						    }
						     ?>
							 
							
						
						
						
						
						
						
					</div><!--features_items-->
					
				
					
					
					
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
	