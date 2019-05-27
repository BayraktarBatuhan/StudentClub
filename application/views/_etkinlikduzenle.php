
				
				
					<div class="features_items"><!--features_items-->
					
					
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
		
		
        
        <tbody>
		
		<form Id="urun_ekle" action="<?=base_url()?>home/etkinlikguncellekaydet/<?=$etkinlikler[0]->Id?>" method="post">
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
            <th data-breakpoints="xs"><label for="exampleInputEmail1" style="color:#4f4f4f">Title</label></th>
            <th><input type="text" value="<?=$etkinlikler[0]->baslik?>" class="form-control" id="baslik" name="baslik" placeholder="Enter email"></th>
            <th></th>
			<th></th>
			
           
            
          </tr>
		  
		  <tr>
            <th data-breakpoints="xs"><label style="color:#4f4f4f" for="exampleInputEmail1">Activity Date</label></th>
            <th><input type="datetime-local" value="<?=$etkinlikler[0]->et_tarih?>" class="form-control" id="et_tarih" name="et_tarih"></th>
            <th></th>
			<th></th>
    
          </tr>
		   
	
		  
  	
		  
		   

           <tr>
		  <th style="height:50px;  " data-breakpoints="xs"><label style="color:#4f4f4f" for="exampleInputEmail1">Club</label></th>
            <th>

                           <select style="width:300px;  " id="kulüp" name="kulüp" class="form-control m-bot15" onchange='stateComboChange();'> 
							<option value='0' title='-select one-'>-Select Club..-</option> 

							  

							<option id="kulüp" name="kulüp" value='<?=$kulup_id?>' title='Vic'><?=$kulup?></option> 

						

							</select> 

							 </th>



			</tr>
		  
	

		

             <tr>
		  	     <th data-breakpoints="xs"><label style="color:#4f4f4f" for="exampleInputEmail1">Explanation</label></th>
                                              <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
                                                <th>
                                                   
                                                    <textarea id="aciklama" name="aciklama" class="form-control" > <?=$etkinlikler[0]->aciklama?> </textarea>
                                                        <script>
                                                            // Replace the <textarea id="editor1"> with a CKEditor
                                                            // instance, using default configuration.
                                                            CKEDITOR.replace( 'aciklama' );
                                                        </script></th>
                                              
                                            	
            </tr>
		  
		  <tr>
		  <th></th><th></th><th></th><th>
		  
		  <button type="submit" style="background-color:#ee30a7" class="btn btn-success pull-right">Update</button>
		 </th></tr>
		   
        </thead>
		
		
                                    
                                    
                                </div>


                               
								
	</form>	
		  
         
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
	