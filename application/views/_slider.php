<section id="slider"><!--slider-->
		
			
				
					<div id="slider-carouse1" class="carousel slide" data-ride="carousel">
					


						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							
								<?php	foreach($slider as $rs) {	?>


							<div class="item <?php if ($rs->Id=="1"): echo "active" ?>
								
							<?php endif ?> ">
								
								<div class="col-sm-16">
									<a href="#"><img src="<?=base_url()?>/uploads/<?=$rs->resim?>" class="girl img-responsive" alt="" /></a>
								
								</div>
							</div>

								<?php		}	?>
				
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				
			
		
	</section><!--/slider-->



				
