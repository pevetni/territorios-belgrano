<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<script type="text/javascript" src="js/jquery-2.0.3.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Vegur_300.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_700.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_400.font.js"></script>
		<script type="text/javascript" src="js/tms-0.3.js"></script>
		<script type="text/javascript" src="js/tms_presets.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
			</div>
		<![endif]-->
	</head>
	<body>
		<div class="main">
<!--header -->
			<header>
				<div class="wrapper">
					<h4>Predicación Telef&oacute;nica y por Cartas</h4>
				</div>
				<nav>
					<ul id="menu">
						<li class="last"><a href="index.html"><span>Predicar</span></a></li>
						<li class="active"><a href="Admin.php"><span>Administrar</span></a></li>
					</ul>
				</nav>
				<div id="slider">
					<div id="baner">
						<ul class="items">
							<li>
								<img src="images/img2.jpg" alt="">
								<div class="banner">
									<span class="title"><span class="color2">Ingresar</span><span class="color1">Nuevos</span><span>Territorios Telefonicos</span></span>
									<p>Usted debe ser administrador para poder ingresar en esta sección.</p>
									<a href="#loginModal" class="button2" role="button" data-toggle="modal">Login</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</header>
<!--header end-->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h2 class="text-center"><img src="images/candado.png" class="img-circle" style="max-width: 30%;"><br>Acceso</h2>
						</div>
						<div class="modal-body">
							<form class="form col-md-12 center-block" action="territorio/login.php" method="POST">
								<div class="form-group">
									<input type="text" class="form-control input-lg" placeholder="Usuario" id="lg_username" name="lg_username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-lg" placeholder="Contraseña" id="lg_password" name="lg_password">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-lg btn-block" type="submit">Aceptar</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<div class="col-md-12">
							</div>	
						</div>
					</div>
				</div>
			</div>
		<script type="text/javascript"> 
			Cufon.now(); 
			var adminFunctions = function() {
				$('#login').off();
				$('#login').on("click", function() {
					$('#slider').hide("slow");
					$('#baner').show("slow");
				});
			}
			adminFunctions();
		</script>
		<script>
			$(window).load(function(){
				$('#slider')._TMS({
					banners:true,
					waitBannerAnimation:false,
					preset:'diagonalFade',
					easing:'easeOutQuad',
					pagination:true,
					duration:400,
					slideshow:8000,
					bannerShow:function(banner){
						banner.css({marginRight:-500}).stop().animate({marginRight:0}, 600)
					},
					bannerHide:function(banner){
						banner.stop().animate({marginRight:-500}, 600)
					}
					})
			});
		</script>
	</body>
</html>