<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a  href="<?=base_url()?>admin/home">
                        <i class="fa fa-dashboard"></i>
                        <span>HOME</span>
                    </a>
                </li>
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/kulupler">
                        <i class="fa fa-lock"></i>
                        <span>CLUBS</span>
                    </a>
                    
                </li>
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/#">
                        <i class="fa fa-lock"></i>
                        <span>CLUBS DIRECTORS</span>
                    </a>
					
					<?php						
						foreach($veri as $rs)						
						{
						?>
					
					<ul>
                    <li><a href="<?=base_url()?>admin/baskanlar/index/<?=$rs->Id?>"><?=$rs->adi?></a></li>   
					
					
					
					</ul>
					
					<?php  } ?>
                    
                </li>
				
				<li>
                    <a href="<?=base_url()?>admin/uyeler">
                        <i class="fa fa-user"></i>
                        <span>MEMBERS</span>
                    </a>
                </li>
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/#">
                        <i class="fa fa-lock"></i>
                        <span>CLUB MEMBERS</span>
                    </a>
					
					<?php						
						foreach($veri as $rs)						
						{
						?>
					
					<ul>
                    <li><a href="<?=base_url()?>admin/kulupuyeler/index/<?=$rs->Id?>"><?=$rs->adi?></a></li>   
					
					
					
					</ul>
					
					<?php  } ?>
                    
                </li>
				
				
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/konular">
                        <i class="fa fa-th"></i>
                        <span>CONTENT</span>
                    </a>
                    
                </li>
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/etkinlikler">
                        <i class="fa fa-th"></i>
                        <span>EVENTS</span>
                    </a>
                    
                </li>
				
		
				
                
                <li class="sub-menu">
                    <a href="<?=base_url()?>admin/kullaniciler">
                        <i class="fa fa-lock"></i>
                        <span>USERS</span>
                    </a>
                    
                </li>
                
				 
             
                
             
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/mesajlar">
                        <i class="fa fa-commenting-o"></i>
                        <span>MESSAGES</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="<?=base_url()?>admin/yorumlar">
                        <i class=" fa fa-comment"></i>
                        <span>COMMENTS</span>
                    </a>
                    
                </li>
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/resignation">
                        <i class="fa fa-th"></i>
                        <span>RESIGNATION</span>
                    </a>
                    
                </li>
				
				
				
				
				<li class="sub-menu">
                    <a href="<?=base_url()?>admin/home/ayarlar">
                        <i class="fa fa-cog"></i>
                        <span>SETTINGS</span>
                    </a>
                    
                </li>

                 <li class="sub-menu">
                    <a href="<?=base_url()?>admin/slaytlar">
                        <i class="fa fa-th"></i>
                        <span>SLIDER</span>
                    </a>
                    
                </li>
               
               
                <li>
                    <a href="<?=base_url()?>admin/login/cikis_yap">
                        <i class="fa fa-sign-out"></i>
                        <span>LOG OUT</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->