<!--main content start-->

<section id="main-content">

	<section class="wrapper">
		<!-- //market-->
		
		<div class="col-md-12" >
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
		<form role="form" id="urun_resim_ekle" enctype="multipart/form-data" action="<?=base_url()?>/admin/konular/galeri_kaydet/<?=$id?>" method="post" >
          <h4 class="title">Resim Yükleme</h4>   
                                 
								  <label class="custom-file">  
			<input type="file" id="resim" name="resim" required id="file" class="custom-file-input" onChange="this.form.submit();">  
		 
		</label> 
					
						
						
						<br><br><br>	

						
						
						
						
				<?php if ($this->session->flashdata("mesaj"))
					{      ?>
                         <div class="alert alert-warning">
						 
						 
                          <button style="background-color:#ee30a7" type="button" aria-hidden="true" class="close">×</button>  
						  
						  
						  
                          <span>
						  
						  
						  
                         <b> Hata - </b> <?= $this->session->flashdata("mesaj")?></span>
						 
						 </div>
						 
                         
						 
						 
						<?php  
						}
						
						?> 
						 
						 
		  
                   
			
                  
                                   
	   
 
	    		 
	   
	    <?php	
		 foreach ($veriler as $rs)
		{
		?>
	   
	              <div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="images/g1.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="<?=base_url()?>uploads/<?=$rs->resim?>" alt="">
								<div class="captn">
								
									<h4><a href="<?=base_url()?>admin/konular/resimsil/<?=$id?>/<?=$rs->Id?>" data-toggle="modal" class="btn btn-danger">
                                    Sil
                                </a></h4>
									<p></p>

								</div>
							</a>
						</div>
					</div>
           
       
		
		
		<?php  
		} 
		?>
			
			
                   
															 
			
															

                                           
											 
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
								
