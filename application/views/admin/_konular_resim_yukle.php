﻿<!--main content start-->
<section id="main-content">

	<section class="wrapper">
		<!-- //market-->
		
		<div class="col-md-12">
		<table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
		
          <h4 class="title">Resim Yükleme</h4>   
                                 
						*Yüklenecek resim türleri (gif|jpg|png) 
						maximum çözünürlük 1024*1024<br> boyut :1000kb geçmemelidir.
						
						
						
						<br><br><br>	

						
						
					
						
				<?php if ($this->session->flashdata("mesaj"))
					{      ?>
                         <div class="alert alert-warning">
						 
						 
                          <button style="background-color:#ee30a7" type="button" aria-hidden="true" class="close">×</button>  
						  
						  
						  
                          <span>
						  
						  
						  
                         <b> Hata - </b> <?= $this->session->flashdata("mesaj")?></span>
						 
						 </div>
						 
                         
						 
						 
						<?php  }?> 
						 
						 
		  
                   
				  
                                   
	   <form role="form" id="urun_resim_ekle" enctype="multipart/form-data" action="<?=base_url()?>/admin/konular/resim_kaydet/<?=$id?>" method="post" >
 
	    		 <button  type="submit" style="background-color:#ee30a7"  class="btn btn-primary btn-round pull-left">Resim Yükle</button>
	            
                                           
							
                                            
															 
			<label class="custom-file">  
			<input type="file" id="resim" name="resim" required id="file" class="custom-file-input">  
		 
		</label> 
															

                                           
											 
					</div>						
                                      
										
		              	  
          

		   
        </thead>
		
		
                                    
                                    
                                
								
	</form>			

	

          
								
		
			
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
								
