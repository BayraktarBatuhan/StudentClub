
				
				<div class="container">
					<div class="features_items"><!--features_items-->
					<div class="panel-heading">
    	 <a href="<?=base_url()?>home/etkinlikekle" data-toggle="modal" style="background-color:#ee30a7" class="btn btn-success pull-right" >
                                    Activity
                                </a>
	
     
    </div>
					
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
			<th>Club</th>
            <th>Title</th>
			<th>Activity Date</th>
			
			
			
			
			
			
            
           
            
          </tr>
        </thead>
        <tbody>
		
		<?php	
		foreach ($etkinlikler as $rs)
		{
		?>
		
         
		  <tr data-expanded="true">
		 
		    <td><?=$rs->Id?></td>
            <td><?=$kulup?></td>
			<td><?=$rs->baslik?></td>
			<td><?=$rs->et_tarih?></td>
            
            
			<td class="center">
			
			<td><a href="<?=base_url()?>home/etkinlikduzenle/<?=$rs->Id?>" data-toggle="modal" class="btn btn-success">
                                    Edit
                                </a></td>
						
			
			
								<td><a href="<?=base_url()?>home/baskanetkinlikkatilacaklar/<?=$rs->Id?>" class="btn btn-warning">
                                    Participants
                                </a></td>
			
						
			
			<td><a href="<?=base_url()?>home/baskanetkinliksil/<?=$rs->Id?>" data-toggle="modal" class="btn btn-danger" onclick="return confirm('Silinecek emin misiniz?!');"  >
                                    Delete
                                </a></td>	
            
			</td>
			
          </tr>
		  <?php	
		}
		?>
		  
         
        </tbody>
		
      </table>
	  
	  <?php if ($this->session->flashdata("sonuc")) 
		{	  ?>
		<div class="alert alert-danger" role="alert">
					<strong>Operation!</strong> <?=$this->session->flashdata("sonuc")?>
				</div>
		<?php } ?>
	  
	  
						
						
							 
							
						
						
						
						
						
						
					</div><!--features_items-->
					
				
					
					
					
				</div>
			</div>
		</div>
	</section>
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