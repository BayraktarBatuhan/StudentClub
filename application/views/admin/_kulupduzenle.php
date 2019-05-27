<!--main content start-->
<section id="main-content">

	<section class="wrapper">
		<!-- //market-->
		
		<div class="market-updates">
		
		<div class="clearfix">
		<form Id="kullanici_ekle" action="<?=base_url()?>/admin/kulupler/guncellekaydet/<?=$veriler[0]->Id?>" method="post">
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
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">Kulüp Adı</label></th>
            <th><input type="text" value="<?=$veriler[0]->adi?>" class="form-control" id="adi" name="adi" placeholder="Enter email"></th>
            <th></th>
			<th></th>
			</tr>
			
			<tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">Kayıt Tablosu</label></th>
            <th><input type="text" value="<?=$veriler[0]->tablo_kayit?>" class="form-control" id="tablo_kayit" name="tablo_kayit" placeholder="Enter email"></th>
            <th></th>
			<th></th>
			</tr>
			
			<tr>
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">Kulüp Başkanı</label></th>
            <th><input type="text" value="<?=$veriler[0]->baskan?>" class="form-control" id="baskan" name="baskan" placeholder="Enter email"></th>
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

	
     </div>
             </div>
	
			
</section>

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
