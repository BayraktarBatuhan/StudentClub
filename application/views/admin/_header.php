
<!DOCTYPE html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url()?>assets/admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/font.css" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="<?=base_url()?>assets/admin/js/jquery2.0.3.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/raphael-min.js"></script>
<script src="<?=base_url()?>assets/admin/js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="<?=base_url()?>admin/home" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">      
                
                <span class="username"><?=$this->session->admin_session["adsoy"];?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                
                <li><a href="<?=base_url()?>admin/home/ayarlar"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="<?=base_url()?>admin/login/cikis_yap"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>


<!--header end-->