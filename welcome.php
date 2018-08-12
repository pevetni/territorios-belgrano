<?php
ini_set("display_errors",0);
    session_start();
    if((isset($_SESSION['email']))){
?>
﻿<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Módulo Administrativo - Belgrano</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link href="css/simple-line-icons.css" rel="stylesheet">
                <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
                <link href="css/style.css" rel="stylesheet">
                <link href="css/bootstrap-multiselect.min.css" rel="stylesheet">
	</head>
	<body>

<div  id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
          
			<h5><strong>USUARIO:</strong>  <?php echo $_SESSION['email'];?></h5>
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="#salirModal" class="button3" role="button" data-toggle="modal">Salir</a></li>
             <li><a href="#aboutModal" class="button3" role="button" data-toggle="modal">Ayuda</a></li>
           </ul>
        </div>	
     </div>	
</div>

<!--main-->
<div class="container" id="main">
    <div class="row">
         <div class="col-md-12"><h4>Territorio Telefónicos</h4></div>
         <div class="col-md-12" id="alerta" style="display: none;">
           <div class="alert alert-info alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong><?=$_SESSION['tipoAlerta'];?></strong> <?=$_SESSION['msjAlerta'];?>
           </div>
         </div>
         
        <div class="col-md-12 col-sm-12">
           <div class="panel panel-default">
              <div class="panel-heading"><h2>Opciones Administrativas</h2></div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li><a href="#A" data-toggle="tab">Subir Territorio</a></li>
                      <!--li><a href="#C" data-toggle="tab">Section 3</a></li-->
                    </ul>
                    <div class="tabbable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="A">
                          <div class="well well-sm">
                              <form enctype="multipart/form-data" class="formulario">
                                <label for="exampleInputFile">Seleccione Archivo <strong>EXCEL</strong></label>
                                <input type="file" name="archivo" id="exampleInputFile" accept=".xls, .xlsx"><br>
                                <input type="button" value="Subir Territorio" id="uploadT"/>
                              </form>
                          </div>
                          <!--div para visualizar mensajes-->
                          <div class="messages"></div><br /><br />
                        </div>
                        <!--div class="tab-pane" id="C">
                          <div class="well well-sm">

                          </div>
                        </div-->
                      </div>
                    </div> <!-- /tabbable -->
                </div>
            </div> 
       </div><!--playground-->
    
    <br>
    
    <div class="clearfix"></div>
      
    <hr>
    <hr>
    
</div>
</div><!--/main-->

<!--about modal-->
<div id="salirModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center" >SALIR</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
            <br>
            ¿Seguro desea cerrar la sesión?
            <br><br>
          </div>
      </div>
      <div class="modal-footer">
          <button class="button4" data-dismiss="modal" aria-hidden="true">NO</button>
          <button id="cerrar" class="button4" aria-hidden="true" onclick="location.href='territorio/logout.php'">SI</button>
      </div>
  </div>
  </div>
</div>

<!--about modal-->
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">AYUDA Y TIPS</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
            <br>
            <a href="http://wol.jw.org/es/wol/d/r4/lp-s/1200277056" target="_blank">Tips para la predicación telefónica</a><br>que debe tener en cuenta.
            <br><br>
          </div>
      </div>
      <div class="modal-footer">
          <button  class="button4" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script type="text/javascript" src="js/jquery-2.0.3.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <script src="js/scripts.js"></script>
                <script src="js/bootstrap-multiselect.min.js"></script>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                <script>
                    $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '<Ant',
                    nextText: 'Sig>',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                    };
                    $.datepicker.setDefaults($.datepicker.regional['es']);    
                    $(function() {
                      $( "#datepicker" ).datepicker();
                    });
                    jQuery(document).ready(function($) {
                            $('.js-multiselect').multiselect({
                                    right: '#js_multiselect_to_1',
                                    rightAll: '#js_right_All_1',
                                    rightSelected: '#js_right_Selected_1',
                                    leftSelected: '#js_left_Selected_1',
                                    leftAll: '#js_left_All_1'
                            });
                    });
                </script>
                <script src="js/jquerycomun.js"></script>
	</body>
</html>
<?php
    }else{
        echo '<script>'
        . 'alert("Debe Iniciar Session para ver la pagina");'
        . ' location.href="index.html"'
        . '</script>';
    }
?>