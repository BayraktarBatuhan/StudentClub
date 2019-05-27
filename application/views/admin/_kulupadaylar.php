<!--main content start-->
<section id="main-content">



	<section class="wrapper">
		<!-- //market-->
		<?php if ($this->session->flashdata("sonuc")) 
		{	  ?>
		<div class="alert alert-danger" role="alert">
					<strong></strong> <?=$this->session->flashdata("sonuc")?>
				</div>
		<?php } ?>
		
		
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
	<?=$adi?>
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
		
		
        <thead>
		
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Üye ID</th>
			<th>Üye Adı</th>
			<th>Üye Email</th>
			<th>Durum</th>
			<th>Üye Kodu</th>
			
            
			
            
           
            
          </tr>
        </thead>
        <tbody>
		
		<?php	
		foreach ($veriler as $rs)
		{
		?>
		
          <tr data-expanded="true">
		  
		  <th scope ="row"><?=$rs->Id?></th>
            <td><?=$rs->uye_id?></td>
			<td><?=$rs->uye_adi?></td>
			<td><?=$rs->uye_email?></td>
			<td><?=$rs->durum?></td>
			<td><?=$rs->uye_kod?></td>
            
            
			<td class="center">
			
			<td><a href="<?=base_url()?>admin/baskanlar/onayla/<?=$id?>/<?=$rs->uye_id?>" data-toggle="modal" class="btn btn-success">
                                    Onayla
                                </a></td>
								
								<td><a href="<?=base_url()?>admin/baskanlar/kod/<?=$id?>/<?=$rs->uye_id?>" data-toggle="modal" class="btn btn-success">
                                    Aday Kodu Belirle
                                </a></td>
								
								<td><a href="<?=base_url()?>admin/baskanlar/adaysil/<?=$id?>/<?=$rs->uye_id?>" data-toggle="modal" class="btn btn-success">
                                    Sil
                                </a></td>
			
			
			
			
						
			
			
            </td>
			
			
          </tr>
		  <?php	
		}
		?>
		  
         
        </tbody>
		
      </table>
    </div>
  </div>
</div>
             <a href="<?=base_url()?>admin/baskanlar/adaybaslat/<?=$id?>" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right" >
                                    Adaylıkları Başlat
                                </a>
								
		    <a href="<?=base_url()?>admin/baskanlar/adaydurdur/<?=$id?>" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right" >
                                    Adaylıkları Durdur
                                </a>
								
								<a href="<?=base_url()?>admin/baskanlar/secimbaslat/<?=$id?>" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right" >
                                    Başkanlık Seçimi Başlat
                                </a>
								<a href="<?=base_url()?>admin/baskanlar/secimbitir/<?=$id?>" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right" >
                                    Seçimi Bitir
                                </a>
								
								
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