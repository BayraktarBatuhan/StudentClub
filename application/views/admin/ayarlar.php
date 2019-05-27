<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			
			<h2>AYARLAR</h2>
			
			<form role="form" id="ayarlar" action="<?=base_url()?>/admin/home/ayarguncelle/<?=$veriler[0]->Id?>" method="post" >
      

        <div class="col-md-12">
       
           
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Site adı</label>
                    <input type="text" id="adi" name="adi"  value="<?=$veriler[0]->adi?>" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Açıklama</label>
                    <input type="text" id="aciklama" name="aciklama"  value="<?=$veriler[0]->aciklama?>" class="form-control">
                </div>
            </div>
			<div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Keywords</label>
                    <input type="text" id="keywords" name="keywords"  value="<?=$veriler[0]->keywords?>" class="form-control">
                </div>
            </div>
			  <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">SMTP Server</label>
                    <input type="text" id="smtpserver" name="smtpserver"  value="<?=$veriler[0]->smtpserver?>" class="form-control">
                </div>
            </div>
			   <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">SMTP Email</label>
                    <input type="text" id="smtpemail" name="smtpemail"   value="<?=$veriler[0]->smtpemail?>" class="form-control">
              
				</div>
            </div>
			<div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">SMTP Şifre</label>
                    <input type="text" id="smtpsifre" name="smtpsifre"   value="<?=$veriler[0]->smtpsifre?>" class="form-control">
              
				</div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">SMTP Port</label>
                    <input type="text" id="smtpport" name="smtpport"   value="<?=$veriler[0]->smtpport?>" class="form-control">
              
				</div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Adres</label>
                    <input type="text" id="smtpsifre" name="adres"   value="<?=$veriler[0]->adres?>" class="form-control">
              
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Şehir</label>
                    <input type="text" id="smtpsifre" name="sehir"   value="<?=$veriler[0]->sehir?>" class="form-control">
              
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Telefon</label>
                    <input type="text" id="smtpsifre" name="telefon"   value="<?=$veriler[0]->tel?>" class="form-control">
              
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Email</label>
                    <input type="text" id="smtpsifre" name="email"   value="<?=$veriler[0]->email?>" class="form-control">
              
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Facebook</label>
                    <input type="text" id="smtpsifre" name="facebook"   value="<?=$veriler[0]->facebook?>" class="form-control">
              
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Instagram</label>
                    <input type="text" id="smtpsifre" name="instagram"   value="<?=$veriler[0]->instagram?>" class="form-control">
              
                </div>
            </div>
           



             

           <div class="col-md-12"><label class="control-label">Hakkımızda</label>
                <div class="form-group label-floating">
                    
                 <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
                <textarea id="hakkimizda" name="hakkimizda" required class="form-control" ><?=$veriler[0]->hakkimizda?></textarea>
                </div>
            </div>










			 <div class="col-md-12"><label class="control-label">İletişim Sayfası</label>
                <div class="form-group label-floating">
                    
				 <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
				<textarea id="iletisim" name="iletisim" required class="form-control"><?=$veriler[0]->iletisim?></textarea>
				</div>
            </div>

           
	   	 
     <div class="col-md-12">
      
           <button type="submit" style="background-color:#ee30a7" class="btn btn-primary btn-round pull-right">Güncelle</button>
        </div>
   
      </div>
      
 <script>
                            // Replace the <textarea id="iletisim"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'iletisim' );
                        </script>
                       <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>

  <script>
                            // Replace the <textarea id="iletisim"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'hakkimizda' );
                        </script>
                       <script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
           
           
     </div>
    </form>

   
			
			
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
	
		<div class="agil-info-calendar">
		<!-- calendar -->
		
		<!-- //calendar -->
		
			<div class="clearfix"> </div>
		</div>

      
			
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