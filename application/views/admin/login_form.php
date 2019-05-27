
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url()?>assets/admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?=base_url()?>assets/admin/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Giriş Yap</h2>
		<form action="<?=base_url()?>admin/login/giris_yap" method="post">
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Beni Hatırla</span>
			<h6><a href="#">Parolanızı mı Unuttunuz</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Giriş" name="login">
		</form>
		
		<?php if ($this->session->flashdata("login_hata")) 
		{	  ?>
		        <div class="alert alert-danger" role="alert">
					<strong>İşlem!</strong> <?=$this->session->flashdata("login_hata")?>
				</div>
		<?php }  ?>
		
		
		
</div>
</div>
<script src="<?=base_url()?>assets/admin/js/bootstrap.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url()?>assets/admin/js/scripts.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery.slimscroll.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?=base_url()?>assets/admin/home/js/jquery.scrollTo.js"></script>
</body>
</html>
