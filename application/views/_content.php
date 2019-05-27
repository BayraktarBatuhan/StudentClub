
				
				
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Content</h2>
						
						<?php
						
						foreach($urunler as $rs)
						
						{
						?>
							<div class="col-sm-6">
								
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<h2 class="title text-center"><?=$rs->baslik?></h2>
										<a href="<?=base_url()?>/home/urundetay/<?=$rs->ID?>"><img src="<?=base_url()?>uploads/<?=$rs->resim?>" alt="" /></a>
											
											
											
										</div>
										
								</div>
								
							</div>
							</div>
							
							
							
							<?php
					
						
						    }
						     ?>
							 
							
						
						
						
						
						
						
					</div><!--features_items-->
					
					<!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>