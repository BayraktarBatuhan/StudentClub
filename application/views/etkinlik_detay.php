<?php
 
 $query=$this->db->query("select * from kulupler"); 
		$data["kulupler"]=$query->result();
 
 $this->load->view('_header',$data);
 
?>




					<div style="margin-left:200px; height:500px;  " class="product-details">
						<div class="col-sm-3">
							


							
								
								 
						

<div class="row" >
	
 
				            
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>

</div>



									</div>

								
							

						


						<div class="col-sm-7">
						<?php if ($this->session->flashdata("mesaj"))
					{      ?>
                         <div  class="alert alert-warning">
						 
						 
                          <button style="background-color:#ee30a7" type="button" aria-hidden="true" class="close">×</button>  
						  
						  
						  
						  
                          <span>
						  
						  
						  
                         <b> Operation-</b> <?= $this->session->flashdata("mesaj")?></span>
						 
						 </div>
						 
                         
						 
						 
						<?php  
						}
						
						?> 

							<div style="margin-left:100px; " class="product-information">
								
								<h2><?=$veri[0]->baslik?></h2>-<h2><?=$veri[0]->tarih?></h2>
								
								<img src="" alt="">
								
								<p><?=$veri[0]->aciklama?></p>
								
								<div style="height:150px;"><a href="<?=base_url()?>home/etkinlikkaydet/<?=$veri[0]->Id?>"><button href="" type="submit" class="btn btn-default">Etkinliğe Katılmak İçin</button></a></div>
								
								
							</div>
						</div>
					</div>
					
					<div style="margin-left:150px; margin-right:100px;" class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								
								      
								 
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews </a></li>
							</ul>
						</div>

						<div class="tab-content">

							<div class="tab-pane fade" id="details">
								<div class="col-sm-3">
									<div style="width:2000px; " class="product-image-wrapper">
										<div style="width:1000px; " class="single-products">
											<div style="width:1000px; " class="productinfo text-center">
												
												
												
												
											</div>
											
										</div>
										
										
									</div>
									
								</div>
								
								
								
							</div>
							
							
							
							<div class="tab-pane fade active in" id="reviews"><?php
									foreach($yorumlar as $rs)
					
						{
						?>
						
									
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?=$rs->adsoy?></li>
									
										<li><i class="fa fa-calendar"></i><?=$rs->tarih?></li>
									</ul>
									<p><?=$rs->mesaj?></p>
									
								
									
                      <?php
					
						
						}
						?>
								<div class="col-sm-12">
								            
									<p><b>Comment</b></p>
									
								<form action="<?=base_url()?>home/yorumkaydet/<?=$urun[0]->Id?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="adsoy" class="form-control" required="required" placeholder="Ad Soyad">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				           
				            <div class="form-group col-md-12">
				                <textarea name="mesaj" id="mesaj" required="required" class="form-control" rows="8" placeholder="Mesajınızı Buraya Yazınız"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
				            </div>
				        </form>
								</div>
							</div>
							
						</div>

<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
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

<style>
body {
  font-family: Verdana, sans-serif;
  margin: 0;

}

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 20%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 80px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 70%;
  max-width: 1000px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;


}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
</style>


					</div><!--/category-tab-->
					
					
				
				<?php
				
                $this->load->view('_footer');
                 
				 ?>

			
