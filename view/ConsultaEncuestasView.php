<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Consulta Encuestas - Capremci</title>

	
		
		<link rel="stylesheet" href="view/css/estilos.css">
		<link rel="stylesheet" href="view/vendors/table-sorter/themes/blue/style.css">
	
	
	
		    <!-- Bootstrap -->
    		<link href="view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    		<!-- Font Awesome -->
		    <link href="view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		    <!-- NProgress -->
		    <link href="view/vendors/nprogress/nprogress.css" rel="stylesheet">
		    
		   
		    <!-- Custom Theme Style -->
		    <link href="view/build/css/custom.min.css" rel="stylesheet">
				
			
			<!-- Datatables -->
		    <link href="view/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		    
		   		

			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script type="text/javascript" src="view/vendors/table-sorter/jquery.tablesorter.js"></script> 
        <script src="view/js/jquery.blockUI.js"></script>
        
       
        
        
        <script type="text/javascript">
     
        	   $(document).ready( function (){
        		   pone_espera();
        		   load_encuestas_realizadas(1);       		 			  
        		   
	   			});
	   			
        	   function pone_espera(){
        		   $.blockUI({ 
        				message: '<h4><img src="view/images/load.gif" /> Espere por favor, estamos procesando su requerimiento...</h4>',
        				css: { 
        		            border: 'none', 
        		            padding: '15px', 
        		            backgroundColor: '#000', 
        		            '-webkit-border-radius': '10px', 
        		            '-moz-border-radius': '10px', 
        		            opacity: .5, 
        		            color: '#fff',
        		           
        	        		}
        	    });
            	
		        setTimeout($.unblockUI, 500); 
		        
        	   }
        	   
        	   function load_encuestas_realizadas(pagina){
        		   var search=$("#search").val();
        		   var desde=$("#desde").val();
        		   var hasta=$("#hasta").val();
                   var con_datos={
           					  action:'ajax',
           					  page:pagina,
           					  desde:desde,
           					  hasta:hasta
           					  };
                 $("#load_registrados").fadeIn('slow');
           	     $.ajax({
           	               beforeSend: function(objeto){
           	                 $("#load_registrados").html('<center><img src="view/images/ajax-loader.gif"> Cargando...</center>')
           	               },
           	               url: 'index.php?controller=Encuestas&action=buscaAspirante&search='+search,
           	               type: 'POST',
           	               data: con_datos,
           	               success: function(x){
           	                 $("#encuestas_realizadas_registrados").html(x);
           	               	 $("#tabla_encuestas_realizadas").tablesorter(); 
           	                 $("#load_registrados").html("");
           	               },
           	              error: function(jqXHR,estado,error){
           	                $("#encuestas_realizadas_registrados").html("Ocurrio un error al cargar la informacion de encuestas realizadas..."+estado+"    "+error);
           	              }
           	            });
           		   }
        </script>
        
      
			        
    </head>
    
    
    <body class="nav-md">
    
    
      
      <?php
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        ?>
    
    
       
    
    
    
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col  menu_fixed">
          <div class="left_col scroll-view">
            <?php include("view/modulos/logo.php"); ?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php include("view/modulos/menu_profile.php"); ?>
            <!-- /menu profile quick info -->

            <br />
			<?php //include("view/modulos/menu.php"); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
		<?php include("view/modulos/head.php"); ?>	
        <!-- /top navigation -->

        <!-- page content -->
		<div class="right_col" role="main">        
            <?php
       $sel_menu = "";
       
    
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	 
       	 
       	$sel_menu=$_POST['criterio'];
       	
       	 
       }
      
	 	?>
    <div class="container">
        <section class="content-header">
         <small><?php echo $fecha; ?></small>
         <ol class=" pull-right breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">PROCESO DE SELECCIÓN</li>
         </ol>
         </section>
       
  
		
		<div class="col-md-12 col-lg-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Consulta<small>Encuestas Realizadas</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
					
				
					
					<div class="pull-right" style="margin-right:11px;">
					<input type="text" value="" class="form-control" id="search" name="search" onkeyup="load_encuestas_realizadas(1)" placeholder="search.."/>
					</div>
					
					
					<div id="load_registrados" ></div>	
					<div id="encuestas_realizadas_registrados"></div>	
				
					
                  
                  </div>
                  
               
                  
                </div>
                
                
		       
                
              </div>
		
      </div>
    </div>

</div>
    
    
    
    
    <!-- Bootstrap -->
    <script src="view/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    
    
    <!-- NProgress -->
    <script src="view/vendors/nprogress/nprogress.js"></script>
   
   
    <!-- Datatables -->
    <script src="view/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    
    
    <script src="view/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    
    
    
    <!-- Custom Theme Scripts -->
    <script src="view/build/js/custom.min.js"></script>
	
	<!-- codigo de las funciones -->
 <script src="view/js/Chart.js"></script>

 <script>
		
	var barChartData = {
		
		labels : <?php echo $data;?>,
				
		datasets : [
			
		
			
			{
				
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : <?php echo $pre_1_r1;?>
				
			},
			{
				
				fillColor : "#52BE80",
				strokeColor : "#ffffff",
				highlightFill: "#27AE60",
				highlightStroke: "#ffffff",
				data : <?php echo $pre_1_r2;?>
				
			},
			{
				
				fillColor : "#F7DC6F",
				strokeColor : "#ffffff",
				highlightFill: "#F4D03F",
				highlightStroke: "#ffffff",
				data : <?php echo $pre_1_r3;?>
				
			}
			
		]
		
	}	
		
			var ctx3 = document.getElementById("chart-area").getContext("2d");
	 		
			window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
		
			</script>


	
  </body>
</html>   