<?php

$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();

$this->load->view('_header',$data);


?>


<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Adress</h2>    			    				    				
					<div id="googleMap" style="width:100%;height:528px;"></div>

                <script>
                function myMap() {
                var mapProp= {
                    center:new google.maps.LatLng(39.818493,32.562499 ),
                    zoom:16,
                };
                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
                </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3Of8DSEtM_ZSHp24kAxD3UhCmbohYje8&callback=myMap"></script>
				</div>			 		
			</div> 

						 <br></br>
            

    		<div class="row">  	
	    		<div class="col-sm-6">
	    			<div class="contact-form">
	    			<?php if ($this->session->flashdata("mesaj"))
					{      ?>
                         <div class="alert alert-warning">
						 
						 
                          <button style="background-color:#ee30a7" type="button" aria-hidden="true" class="close">×</button>  
						  
						  
						  
                          <span>
						  
						  
						  
                         <b> Operation-</b> <?= $this->session->flashdata("mesaj")?></span>
						 </div>
						 
                         
						 
						 
						<?php  
						}
						
						?> 
						<h2 class="title text-center">Contact Us</h2>
	    				
						
						
					
						</div>
						
						
						
				    	<form action="<?=base_url()?>home/mesajkaydet" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="adsoy" class="form-control" required="required" placeholder="Ad Soyad">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="tel" name="tel" class="form-control" required="required" placeholder="Tel">
				            </div>
				            <div class="form-group col-md-12" >
				                <textarea style="height:200px;" name="mesaj" id="mesaj" required="required" class="form-control" rows="12" placeholder="Mesajınızı Buraya Yazınız"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-right-4">
	    			<div class="contact-info">
	    			<!--	<h2 class="title text-center">İletişim Bilgileri</h2>
	    				<address>
	    					<?=$veriler[0]->iletisim?>
	    				</address> -->
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networks</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
								</li>
								
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
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
