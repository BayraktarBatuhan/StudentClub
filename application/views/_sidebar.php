  
  <section>
		<div class="container">
			
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Clubs</h2>
						
						
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						<?php						
						foreach($kulupler as $rs)						
						{
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="<?=base_url()?>home/kategori/<?=$rs->Id?>">
											<span class="badge pull-right"></span>
											<?=$rs->adi?>
										</a>
									</h4>
								</div>
								
							</div>
							
							
						<?php  } ?>	
							
													
							
							
							
							
							
						</div><!--/category-products-->
					
					
						
					
						
						
					
					</div>
					<div class="left-sidebar">
						<h2>Activities</h2>
						
						
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						<?php						
						foreach($kulupler as $rs)						
						{
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="<?=base_url()?>home/etkinlikler/<?=$rs->Id?>">
											<span class="badge pull-right"></span>
											<?=$rs->adi?>
										</a>
									</h4>
								</div>
								
							</div>
							
							
						<?php  } ?>	
							
													
							
							
							
							
							
						</div><!--/category-products-->
					
					
						
					
						
						
					
					</div>
					
					
					
				</div>