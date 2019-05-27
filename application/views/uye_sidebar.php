	<?php
	  if(!$this->session->userdata("uye_session"))
		  {
			  
			  $this->session->set_flashdata("login_hata","Önce Giriş Yapınız");
			  redirect(base_url().'home/uyelik');  
		  }	
	
	
	?>
	
	  <div style=1"height=100px;" class="col-sm-2">
					<div class="left-sidebar">
						
						<!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Category</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="<?=base_url()?>/home/uyepanel">Profile Data</a></li>
									<li><a href="<?=base_url()?>home/kuluplerim/<?=$veriler2[0]->Id?>">My Clubs</a></li>
									<li><a href="<?=base_url()?>home/etkinliklerim/<?=$veriler2[0]->Id?>">My Activities</a></li>
									<li><a href="<?=base_url()?>home/kulupkatil/">Join Club</a></li>
									<?php
				if($this->session->uye_session["yetki"]=="baskan") {?>
									<li><a href="<?=base_url()?>home/baskanetkinlik/">Create Activity</a></li>
									
									<?php
				
				}
				?>
				
				<?php
				if($this->session->uye_session["yetki"]=="baskan") {?>
									<li><a href="<?=base_url()?>home/paylasimlar/">Share</a></li>
									
									<?php
				
				}
				?>
				
				<?php
				if($this->session->uye_session["yetki"]=="baskan") {?>
									<li><a href="<?=base_url()?>home/resignation/">Resign the President</a></li>
									
									<?php
				
				}
				?>
				
				
									
									<li><a href="<?=base_url()?>home/cikis_yap">Exit</a></li>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						
						
					
					</div>
				</div>