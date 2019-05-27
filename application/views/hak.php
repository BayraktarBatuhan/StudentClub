<?php
$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();

$this->load->view('_header',$data);

?>


<div id="contact-page" class="container">
    	<div class="bg">
	    	

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
						
	    				
						
						
					
						</div>
						<form Id="hakkimizda" action="<?=base_url()?>/admin/hakkimizda<?=$veriler[0]->Id?>" method="post">
						
						<p><?=$veriler[0]->hakkimizda?></p>

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
    </div>
	
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
