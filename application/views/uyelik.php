<?php
 
$query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();

$this->load->view('_header',$data);
 
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login</h2>
						<form action="<?=base_url()?>Home/uyegiris_yap" method="post">
							<input type="text" name="email" placeholder="E-mail">
							<input type="password" name="sifre" placeholder="password">
							<span>
								<input type="checkbox" class="checkbox"> 
								Remeber Me
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				
				
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				
       
	   <div class="col-sm-4">
				
				
					<div class="signup-form"><!--sign up form-->
					
					
						<h2>Member Works!</h2>
						<?php if ($this->session->flashdata("sonuc"))
					{      ?>
                         <div class="alert alert-warning">
						 
						 
                          <button style="background-color:#ee30a7" type="button" aria-hidden="true" class="close">×</button>  
						  
						  
						  
                          <span>
						  
						  
						  
                         <b> Operation-</b> <?= $this->session->flashdata("sonuc")?></span>
						 
						 </div>
						 
                         
						 
						 
						<?php  
						}
						
						?> 
						
						<form action="<?=base_url()?>members/eklekaydet" method="post" class="form-signin">
											 
						   <tr>
							<th data-breakpoints="xs"><label for="exampleInputEmail1"></label></th>
							<th><input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="Name Surname"></th>
							<th></th>
							<th></th>
							
						   
							
						  </tr>
						  
						   <tr>
							<th data-breakpoints="xs"><label for="exampleInputEmail1"></label></th>
							<th><input type="text" class="form-control" id="email" name="email" placeholder="E-mail"></th>
							<th></th>
							<th></th>
							
						   
							
						  </tr>
						  
						   <tr>
							<th data-breakpoints="xs"><label for="exampleInputEmail1"></label></th>
							<th><input type="password" class="form-control" id="sifre" name="sifre" placeholder="Password"></th>
							<th></th>
							<th></th>
							
						   
							
						  </tr>

						     <tr>
							<th data-breakpoints="xs"><label for="exampleInputEmail1"></label></th>
							<th><input type="text" class="form-control" id="telefon" name="telefon" placeholder="Phone"></th>
							<th></th>
							<th></th>
							
						   
							
						  </tr>

						     <tr>
							
            <th data-breakpoints="xs"><label for="exampleInputEmail1">Gender</label></th>
            <th>

                            <select id="exampleInputEmail1" name="cinsiyet" class="form-control m-bot15">
                                <option>Woman</option>
                                <option>Man</option>
                                
                            </select></th>
		
							
						  </tr>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
					</div><!--/sign up form-->
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