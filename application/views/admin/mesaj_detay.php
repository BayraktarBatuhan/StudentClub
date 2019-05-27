<!--main content start-->
<section id="main-content">



	<section class="wrapper">
		<!-- //market-->
		<?php if ($this->session->flashdata("sonuc")) 
		{	  ?>
		<div class="alert alert-danger" role="alert">
					<strong>İşlem!</strong> <?=$this->session->flashdata("sonuc")?>
				</div>
		<?php } ?>
		
		
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
	
     Mesaj Detayları
    </div>
    <div>
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
		
		
        
		
          <tr>
            <th data-breakpoints="xs">ID</th>
			<tr><th>Adı Soyadı</th><td><?=$veriler[0]->adsoy?></td> </tr>
            <tr><th>E-Mail</th> <td><?=$veriler[0]->email?></td></tr>
            <tr><th>Telefon</th><td><?=$veriler[0]->tel?></td></tr>
			<tr><th>Mesaj</th><td size="2px"><?=$veriler[0]->mesaj?></td></tr>
			<tr><th>Tarih</th><td><?=$veriler[0]->tarih?></td></tr>
			<tr><th>Ip</th><td><?=$veriler[0]->IP?></td></tr>
			<tr><th>Durum</th><td><?=$veriler[0]->durum?></td></tr>
			<tr><th>Notunuz</th>
			<td>
			<form Id="kullanici_ekle" action="<?=base_url()?>/admin/mesajlar/guncelle/<?=$veriler[0]->Id?>" method="post">
			
			
			<textarea id="aciklama" name="aciklama" value="<?=$veriler[0]->adminnotu?>"  class="form-control" ></textarea>
		  
                        
			
			<button type="submit" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right">Güncelle</button>
			</form>
			
			</td>
			</tr>
            <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
            
          </tr>
       
        
      </table>
    </div>
  </div>
</div>
            
								
								
		<!-- //market-->
	
		<div class="agil-info-calendar">
		<!-- calendar -->
		
		<!-- //calendar -->
		
			<div class="clearfix"> </div>
		</div>
			<!-- tasks -->
			
		<!-- //tasks -->
		
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
<div class="col-md-12">
                                              <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>

        <script>
                                                            // Replace the <textarea id="editor1"> with a CKEditor
                                                            // instance, using default configuration.
                                                            CKEDITOR.replace( 'aciklama' );
                                                        </script>
