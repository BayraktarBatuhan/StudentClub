<!--main content start-->
<section id="main-content">

	<section class="wrapper">
		<!-- //market-->
		<form Id="urun_ekle" action="<?=base_url()?>/admin/baskanlar/kodguncelle/<?=$id?>/<?=$veriler[0]->uye_id?>" method="post">
		<div class="form-group">
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
		
          <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">ÜYE ID</label></th>
            <th><input type="text" value="<?=$veriler[0]->uye_id?>" class="form-control" id="uye_id" name="uye_id" placeholder="Enter email"></th>
            <th></th>
			<th></th>
	
          </tr>
		  
		  <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">ÜYE ADI</label></th>
            <th><input type="text" value="<?=$veriler[0]->uye_adi?>" class="form-control" id="uye_adi" name="uye_adi" placeholder="Enter email"></th>
            <th></th>
			<th></th>
	
          </tr>
		  
		  <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">ÜYE EMAİL</label></th>
            <th><input type="text" value="<?=$veriler[0]->uye_email?>" class="form-control" id="uye_email" name="uye_email" placeholder="Enter email"></th>
            <th></th>
			<th></th>
	
          </tr>
		  
		  <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">ÜYE DURUM</label></th>
            <th><input type="text" value="<?=$veriler[0]->durum?>" class="form-control" id="durum" name="durum" placeholder="Enter email"></th>
            <th></th>
			<th></th>
	
          </tr>
		  
		  <tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">SEÇİM KODU</label></th>
            <th><input type="text" value="<?=$veriler[0]->uye_kod?>" class="form-control" id="uye_kod" name="uye_kod" placeholder="Enter email"></th>
            <th></th>
			<th></th>
	
          </tr>
		  
		  
		  
		  
		   
	
		  
  	
		  
		   

           
		  
	

		

            
		  
		  <tr>
		  <th></th><th></th><th></th><th>
		  
		  <button type="submit" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right">Güncelle</button>
		 </th></tr>
		   
        </thead>
		
		
                                    
                                    
                                </div>


                               
								
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
								
	  
     
		  
		   

            			