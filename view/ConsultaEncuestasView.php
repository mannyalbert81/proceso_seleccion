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
        		 			  $("#buscar").click(function() 
        					{
        				    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        				    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;
        				    	var desde = $("#desde").val();
        				    	var hasta = $("#hasta").val();
        				    	
        				    	
        				    	
        						if(desde > hasta){
        							$("#mensaje_desde").text("Fecha desde no puede ser mayor a hasta");
        				    		$("#mensaje_desde").fadeIn("slow"); //Muestra mensaje de error
        				            return false;
        				            
            					}else 
        				    	{
        				    		$("#mensaje_desde").fadeOut("slow"); //Muestra mensaje de error
        				    		load_encuestas_realizadas(1);
        						} 
        						if(hasta < desde){
        							$("#mensaje_hasta").text("Fecha hasta no puede ser menor a desde");
        				    		$("#mensaje_hasta").fadeIn("slow"); //Muestra mensaje de error
        				            return false;
        				            
            					}else 
        				    	{
        				    		$("#mensaje_hasta").fadeOut("slow"); //Muestra mensaje de error
        				    		load_encuestas_realizadas(1);
        						} 
        						
        				    					    
        					}); 
        				        $( "#desde" ).focus(function() {
        						  $("#mensaje_desde").fadeOut("slow");
        					    });
        						
        				        $( "#hasta" ).focus(function() {
          						  $("#mensaje_hasta").fadeOut("slow");
          					    });
        						
        		   
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
        
        $data ="";
        $i=0;
        if (!empty($resultSet)) {
        	 
        	$data="[";
        	 
        	foreach($resultSet as $res) {
        
        		$data.="'";
        		$data.=$res->nombre_preguntas_encuestas_participes."',";
        
        	}
        	 
        	$data.="]";
        
        
        	$pre_1_r1="[";
        	$pre_1_r2="[";
        	$pre_1_r3="[";
        	
        	
        	
        	 
        	foreach($resultSet as $res) {
                $i++;
        		
                if($i==1){
                	
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->bueno_pregunta_1."',";
                	
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->intermedio_1."',";
                	
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->malo_1."',";
                	
                
                	
                }
                
                elseif ($i==2){
                	
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->si_2."',";
                	 
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->algo_2."',";
                	 
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->nada_2."',";
                	
                
                	
                	
                }
               
                elseif ($i==3){
                	
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->los_colores_3."',";
                	
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->la_informacion_3."',";
                	
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->nada_3."',";
                	
                	
                }
                
               
                elseif ($i==4){
                	 
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->r10_4."',";
                	 
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->r9_4."',";
                	 
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->r8_4."',";
                	
                }
                
               
                elseif ($i==5){
                	 
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->si_5."',";
                	
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->intermedio_5."',";
                	
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->no_5."',";
                	
                }
                
               
                elseif ($i==6){
                	 
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->si_6."',";
                	 
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->no_6."',";
                	 
                	$pre_1_r3.="'";
                	$pre_1_r3.='0'."',";
                	
                }
                
               
                elseif ($i==7){
                	 
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->si_7."',";
                	 
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->no_7."',";
                	 
                	$pre_1_r3.="'";
                	$pre_1_r3.='0'."',";
                	
                } elseif ($i==8){
                	 
                	$pre_1_r1.="'";
                	$pre_1_r1.=$res->si_8."',";
                	 
                	$pre_1_r2.="'";
                	$pre_1_r2.=$res->intermedio_8."',";
                	 
                	$pre_1_r3.="'";
                	$pre_1_r3.=$res->no_8."',";
                	
                }
        		
        
        	}
        	 
        	$pre_1_r1.="]";
        	$pre_1_r2.="]";
        	$pre_1_r3.="]";
        	
        
        	 
       
        
        
        	// echo ($data1);
        	 
        }else{
        	 
        }
        
        ?>
    
    
    
   
    
    
      <?php
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
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
			<?php include("view/modulos/menu.php"); ?>
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
         <li><a href="<?php echo $helper->url("Usuarios","Bienvenida"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Encuestas Realizadas</li>
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
                    
                    
					<div class="row" style="margin-left:1px;">
									<div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="desde" class="control-label">Desde:</label>
                                                          <input type="date" class="form-control" id="desde" name="desde" value="" >
                                                          <div id="mensaje_desde" class="errores"></div>
                                    </div>
                        		    </div>
                        		    
                        		    <div class="col-lg-2 col-xs-12 col-md-2">
                        		    <div class="form-group">
                                                          <label for="hasta" class="control-label">Hasta:</label>
                                                          <input type="date" class="form-control" id="hasta" name="hasta" value="">
                                                          <div id="mensaje_hasta" class="errores"></div>
                                               
                                    </div>
                                    
                        		    </div>
                        		    
                        		    <div class="col-xs-12 col-md-2 col-lg-2" style="text-align: center; margin-top:22px">
                    		        <div class="form-group">
                        		    <button type="button" id="buscar" name="buscar" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button>
                                	</div>
                                    </div>
                        		    
					</div>
				
					
					<div class="pull-right" style="margin-right:11px;">
					<input type="text" value="" class="form-control" id="search" name="search" onkeyup="load_encuestas_realizadas(1)" placeholder="search.."/>
					</div>
					
					
					<div id="load_registrados" ></div>	
					<div id="encuestas_realizadas_registrados"></div>	
				
					
                  
                  </div>
                  
               
                  
                </div>
                
                
		       
                
              </div>
		
		
		        <?php  if (!empty($resultSet)) { $int=0?>	 
			    <div class="col-lg-12 col-md-12 col-xs-12">
			    <div class="panel panel-info" style="text-align: center;">
			    
			    <br><br>
			    <h4><strong>GRÁFICA DE LAS <?php if($total>0){echo $total;}?> ENCUESTAS GENERADAS</strong></h4>
			     <div class="col-lg-12 col-md-12 col-xs-12">
			    
			    <div class="col-lg-6 col-md-6 col-xs-12">
			    <table style='width: 100%; margin-top:10px; ' class='tablesorter table table-striped table-bordered dt-responsive nowrap'>
			    <tr>
			    <th style='text-align: center;'>Respuestas Preg. 1</th>
			    <th style='text-align: center;'>Respuestas Preg. 2</th>
			    <th style='text-align: center;'>Respuestas Preg. 3</th>
			    <th style='text-align: center;'>Respuestas Preg. 4</th>
			    </tr>
			  
			   
			  <tr style="text-align: justify;">
			    <?php foreach ($resultSet as $res){
			    	$int++;
			    	
			    	if($int==1){
			    		?>
			    		<td>
			    		Bueno =<span style="margin-left:35px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->bueno_pregunta_1;?></span><br>
			    		
			    		Intermedio =<span style="margin-left:12px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->intermedio_1;?></span><br>
			    		
			    		Malo =<span style="margin-left:45px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->malo_1;?></span>
			    		</td>
			    		<?php
			    	}
			    	elseif($int==2){
			    		?>
			    		<td>
			    		Si =<span style="margin-left:31px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->si_2;?></span><br>
			    		
			    	    Algo =<span style="margin-left:17px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->algo_2;?></span><br>
			    		
			    	    Nada =<span style="margin-left:12px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->nada_2;?></span>
			    		</td>
		    		<?php
			         }
			         
			      elseif($int==3){
			       	?>
			         <td>
			          Los Colores =<span style="margin-left:31px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->los_colores_3;?></span><br>
			          La Información =<span style="margin-left:15px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->la_informacion_3;?></span><br>
			          Nada =<span style="margin-left:70px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->nada_3;?></span><br>
			          Las Imágenes =<span style="margin-left:20px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->las_imagenes_3;?></span>
			         </td>
			        <?php
			       }
			       elseif($int==4){
			       	?>
			       			         <td>
			       			          10 =<span style="margin-left:3px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r10_4;?></span>
			       			          9 =<span style="margin-left:10px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r9_4;?></span>
			       			          8 =<span style="margin-left:10px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r8_4;?></span><br>
			       			          7 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r7_4;?></span>
			       			          6 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r6_4;?></span>
			       			          5 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r5_4;?></span><br>
			       			          4 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r4_4;?></span>
			       			          3 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r3_4;?></span>
			       			          2 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r2_4;?></span><br>
			       			          1 =<span style="margin-left:10px; background: #F1CBC3; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->r1_4;?></span>
			       			         </td>
			       			        <?php
			      }			       
			    	
			    }?>
			    </tr>
			     </table>
			    </div>
			  
			    
			    
			    
			    <div class="col-lg-6 col-md-6 col-xs-12">
			    <table style='width: 100%; margin-top:10px;' class='tablesorter table table-striped table-bordered dt-responsive nowrap'>
			    <tr>
			    <th style='text-align: center;'>Respuestas Preg. 5</th>
			    <th style='text-align: center;'>Respuestas Preg. 6</th>
			    <th style='text-align: center;'>Respuestas Preg. 7</th>
			    <th style='text-align: center;'>Respuestas Preg. 8</th>
			    </tr>
			  
			   
			    
			  
			   
			  <tr style="text-align: justify;">
			    <?php $int=0; foreach ($resultSet as $res){
			    	$int++;
			    	
			    	if($int==5){
			    		?>
			    		<td>
			    		Si =<span style="margin-left:60px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->si_5;?></span><br>
			    		
			    		Intermedio =<span style="margin-left:10px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->intermedio_5;?></span><br>
			    		
			    		No =<span style="margin-left:55px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->no_5;?></span>
			    		</td>
			    		<?php
			    	}
			    	elseif($int==6){
			    		?>
			    		<td>
			    		Si =<span style="margin-left:16px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->si_6;?></span><br>
			    		
			    	    No =<span style="margin-left:12px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->no_6;?></span><br>
			    		
			    	  
			    		</td>
		    		<?php
			         }
			         
			      elseif($int==7){
			       	?>
			         <td>
			    		Si =<span style="margin-left:16px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->si_7;?></span><br>
			    		
			    	    No =<span style="margin-left:12px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->no_7;?></span><br>
			    		
			    	  
			    		</td>
			        <?php
			       }
			       elseif($int==8){
			       	?>
			       	    <td>
			    		Si =<span style="margin-left:60px; background: #6b9dfa; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->si_8;?></span><br>
			    		
			    		Intermedio =<span style="margin-left:10px; background: #52BE80; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->intermedio_8;?></span><br>
			    		
			    		No =<span style="margin-left:55px; background: #F7DC6F; border-radius: 0.8em; -moz-border-radius: 0.8em; -webkit-border-radius: 0.8em; color: #ffffff; display: inline-block; font-weight: bold; line-height: 1.6em; text-align: center; width: 1.6em;"><?php echo $res->no_8;?></span>
			    		</td>
			       			        <?php
			      }			       
			    	
			    }?>
			    </tr>
			     </table>
			    </div>
			   
			    </div>
			    
			   
			   
			    <div id="canvas-holder">
				<canvas id="chart-area" style="width:100%; height:300;"></canvas>
				</div>
				
				</div>
				</div>
				<?php }?>	
      
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