<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Encuestas - Capremci</title>

	 
 
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
            <script src="view/js/jquery.inputmask.bundle.js"></script>
            
              <link rel="stylesheet" href="view/AdminLTE-2.4.2/plugins/iCheck/all.css">
           
       		<script src="view/input-mask/jquery.inputmask.js"></script>
			<script src="view/input-mask/jquery.inputmask.date.extensions.js"></script>
			<script src="view/input-mask/jquery.inputmask.extensions.js"></script>
        
    
       
      
       <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#generar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;


		    	var cedula_aspirante = $("#cedula_aspirante").val();
		    	var nombre_aspirante = $("#nombre_aspirante").val();
		    	var puesto_postula = $("#puesto_postula").val();
		    	
		    	var respuesta_pregunta_1 = $("#respuesta_pregunta_1").val();
		    	var respuesta_pregunta_2 = $("#respuesta_pregunta_2").val();
		    	var respuesta_pregunta_3 = $("#respuesta_pregunta_3").val();
		    	var respuesta_pregunta_4 = $("#respuesta_pregunta_4").val();
		    	var respuesta_pregunta_5 = $("#respuesta_pregunta_5").val();
		    	var respuesta_pregunta_6 = $("#respuesta_pregunta_6").val();
		    	var respuesta_pregunta_7 = $("#respuesta_pregunta_7").val();
		    	var respuesta_pregunta_8 = $("#respuesta_pregunta_8").val();
		    	var respuesta_pregunta_9 = $("#respuesta_pregunta_9").val();
		    	var respuesta_pregunta_10 = $("#respuesta_pregunta_10").val();


		    	var comentario_respuesta_1 = $("#comentario_respuesta_1").val();
		    	var comentario_respuesta_2 = $("#comentario_respuesta_2").val();
		    	var comentario_respuesta_3 = $("#comentario_respuesta_3").val();
		    	var comentario_respuesta_4 = $("#comentario_respuesta_4").val();
		    	var comentario_respuesta_5 = $("#comentario_respuesta_5").val();
		    	var comentario_respuesta_6 = $("#comentario_respuesta_6").val();
		    	var comentario_respuesta_7 = $("#comentario_respuesta_7").val();
		    	var comentario_respuesta_8 = $("#comentario_respuesta_8").val();
		    	var comentario_respuesta_9 = $("#comentario_respuesta_9").val();
		    	var comentario_respuesta_10 = $("#comentario_respuesta_10").val();


		    	var contador=0;
		    	var tiempo = tiempo || 1000;



		    	var suma = 0;      
		        var residuo = 0;      
		        var pri = false;      
		        var pub = false;            
		        var nat = false;      
		        var numeroProvincias = 22;                  
		        var modulo = 11;
		                    
		        /* Verifico que el campo no contenga letras */                  
		        var ok=1;


		        for (i=0; i<cedula_aspirante.length && ok==1 ; i++){
		            var n = parseInt(cedula_aspirante.charAt(i));
		            if (isNaN(n)) ok=0;
		         }


		        /* Los primeros dos digitos corresponden al codigo de la provincia */
		        provincia = cedula_aspirante.substr(0,2);


		        /* Aqui almacenamos los digitos de la cedula en variables. */
		        d1  = cedula_aspirante.substr(0,1);         
		        d2  = cedula_aspirante.substr(1,1);         
		        d3  = cedula_aspirante.substr(2,1);         
		        d4  = cedula_aspirante.substr(3,1);         
		        d5  = cedula_aspirante.substr(4,1);         
		        d6  = cedula_aspirante.substr(5,1);         
		        d7  = cedula_aspirante.substr(6,1);         
		        d8  = cedula_aspirante.substr(7,1);         
		        d9  = cedula_aspirante.substr(8,1);         
		        d10 = cedula_aspirante.substr(9,1);                
		           
		        /* El tercer digito es: */                           
		        /* 9 para sociedades privadas y extranjeros   */         
		        /* 6 para sociedades publicas */         
		        /* menor que 6 (0,1,2,3,4,5) para personas naturales */ 





		        /* Solo para personas naturales (modulo 10) */         
		        if (d3 < 6){           
		           nat = true;            
		           p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
		           p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
		           p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
		           p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
		           p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
		           p6 = d6 * 1;  if (p6 >= 10) p6 -= 9; 
		           p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
		           p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
		           p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;             
		           modulo = 10;
		        }         
		        /* Solo para sociedades publicas (modulo 11) */                  
		        /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
		        else if(d3 == 6){           
		           pub = true;             
		           p1 = d1 * 3;
		           p2 = d2 * 2;
		           p3 = d3 * 7;
		           p4 = d4 * 6;
		           p5 = d5 * 5;
		           p6 = d6 * 4;
		           p7 = d7 * 3;
		           p8 = d8 * 2;            
		           p9 = 0;            
		        }         
		           
		        /* Solo para entidades privadas (modulo 11) */         
		        else if(d3 == 9) {           
		           pri = true;                                   
		           p1 = d1 * 4;
		           p2 = d2 * 3;
		           p3 = d3 * 2;
		           p4 = d4 * 7;
		           p5 = d5 * 6;
		           p6 = d6 * 5;
		           p7 = d7 * 4;
		           p8 = d8 * 3;
		           p9 = d9 * 2;            
		        }
		                  
		        suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
		        residuo = suma % modulo;                                         
		        /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
		        digitoVerificador = residuo==0 ? 0: modulo - residuo; 




		    	
		    	if (cedula_aspirante == "")
		    	{
			    	
		    		$("#mensaje_cedula_aspirante").text("Introduzca Identificación");
		    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error

		    		$("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
			        return false;
			    }
		    	else 
		    	{


		    		 if (ok==0){
						 $("#mensaje_cedula_aspirante").text("Ingrese solo números");
				    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
				           
				            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
				            return false;
				      }else{

							$("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
					
					  }
					

			    	
		    		if(cedula_aspirante.length<10){

						
						$("#mensaje_cedula_aspirante").text("Ingrese al menos 10 dígitos");
			    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
			           
			            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
			            return false;
						}else{
						
							$("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
							
					}


		    		if (provincia < 1 || provincia > numeroProvincias){           
						$("#mensaje_cedula_aspirante").text("El código de la provincia (dos primeros dígitos) es inválido");
			    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
			           
			            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
			            return false;

				      }else{

				    		$("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
							
					  }


		    		if (d3==7 || d3==8){           

						$("#mensaje_cedula_aspirante").text("El tercer dígito ingresado es inválido");
			    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
			           
			            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
			            return false;
				      }
					else{

						$("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
						
						}




		    		if (pub==true){      


				         /* El ruc de las empresas del sector publico terminan con 0001*/         
			         if ( cedula_aspirante.substr(9,4) != '0001' ){                    

			        	 $("#mensaje_cedula_aspirante").text("El ruc de la empresa del sector público debe terminar con 0001");
				    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
				           
				            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
				            return false;

				     }else{
				    	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
					}
					       
				         if (digitoVerificador != d9){                          
								$("#mensaje_cedula_aspirante").text("El ruc de la empresa del sector público es incorrecto.");
					    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
					           
					            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
					            return false;
					           
				         } else{
				        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
								
					     }                 

				 }else{

		        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
		     }

			               

			       if(pri == true){    
			    	   if ( cedula_aspirante.substr(10,3) != '001' ){   

			    		   $("#mensaje_cedula_aspirante").text("El ruc de la empresa del sector privado debe terminar con 001");
				    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
				           
				            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
				            return false;
				                             
				            
				         }else{
				        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
								
					         }
				              
				         if (digitoVerificador != d10){                          

				        	 $("#mensaje_cedula_aspirante").text("El ruc de la empresa del sector privado es incorrecto");
					    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
					           
					            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
					            return false;

					     } else{
				        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
								
				         }        
				         
				      } else{

				        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
				     }


				if(nat == true){         

					if (cedula_aspirante.length >10 && cedula_aspirante.substr(10,3) != '001' ){                    
			         
			            $("#mensaje_cedula_aspirante").text("El ruc de la persona natural debe terminar con 001.");
			    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
			           
			            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
			            return false;
			            
			         }else{

			        	 if(mensaje_cedula_aspirante.length >13){
			        		 $("#mensaje_cedula_aspirante").text("El ruc de la persona natural es incorrecto.");
					    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
					           
					            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
					            return false;

				        	 }else{
				         
			        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
				        	 }

				         }

					
			         if (digitoVerificador != d10){    

			        	 if(cedula_aspirante.length >10){
			        		 $("#mensaje_cedula_aspirante").text("El ruc de la persona natural es incorrecto.");
					    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
					           
					            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
					            return false;

				        	 }else{
				         
			        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
				        	 }


			        	 if(cedula_aspirante.length <11){
			        		 $("#mensaje_cedula_aspirante").text("El número de cédula de la persona natural es incorrecto.");
					    		$("#mensaje_cedula_aspirante").fadeIn("slow"); //Muestra mensaje de error
					           
					            $("html, body").animate({ scrollTop: $(mensaje_cedula_aspirante).offset().top }, tiempo);
					            return false;

				        	 }else{
				         
			        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
				        	 }


				       
			         }else{

				        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
				     }  


				}else{

		        	 $("#mensaje_cedula_aspirante").fadeOut("slow"); //Muestra mensaje de error
		     }
			
					
		            
				}    
			
		    	if (nombre_aspirante == "")
		    	{
			    	
		    		$("#mensaje_nombre_aspirante").text("Introduzca Datos");
		    		$("#mensaje_nombre_aspirante").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_nombre_aspirante).offset().top }, tiempo);
			        
			            return false;
			    }
		    	else 
		    	{

		    		contador=0;
		    		numeroPalabras=0;
		    		contador = nombre_aspirante.split(" ");
		    		numeroPalabras = contador.length;
		    		
					if(numeroPalabras==2 || numeroPalabras==3 || numeroPalabras==4){

						$("#mensaje_nombre_aspirante").fadeOut("slow"); //Muestra mensaje de error
				                     
			             
					}else{
						$("#mensaje_nombre_aspirante").text("Introduzca Nombres y Apellidos");
			    		$("#mensaje_nombre_aspirante").fadeIn("slow"); //Muestra mensaje de error
			           
			            $("html, body").animate({ scrollTop: $(mensaje_nombre_aspirante).offset().top }, tiempo);
			            return false;
					}
			    	
		    		
		            
				}


		    	if(puesto_postula==""){

					$("#mensaje_puesto_postula").text("Ingrese Cargo");
		    		$("#mensaje_puesto_postula").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_puesto_postula).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_puesto_postula").fadeOut("slow");
					
				}
		    	

				
		    	if(comentario_respuesta_1==""){

					$("#mensaje_comentario_respuesta_1").text("Conteste");
		    		$("#mensaje_comentario_respuesta_1").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_1).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_1").fadeOut("slow");
					
				}


		    	if(comentario_respuesta_2==""){

					$("#mensaje_comentario_respuesta_2").text("Conteste");
		    		$("#mensaje_comentario_respuesta_2").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_2).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_2").fadeOut("slow");
					
				}


		    	if(comentario_respuesta_3==""){

					$("#mensaje_comentario_respuesta_3").text("Conteste");
		    		$("#mensaje_comentario_respuesta_3").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_3).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_3").fadeOut("slow");
					
				}


		    	if(comentario_respuesta_4==""){

					$("#mensaje_comentario_respuesta_4").text("Conteste");
		    		$("#mensaje_comentario_respuesta_4").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_4).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_4").fadeOut("slow");
					
				}

		    	if(comentario_respuesta_5==""){

					$("#mensaje_comentario_respuesta_5").text("Conteste");
		    		$("#mensaje_comentario_respuesta_5").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_5).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_5").fadeOut("slow");
					
				}


		    	if(comentario_respuesta_6==""){

					$("#mensaje_comentario_respuesta_6").text("Conteste");
		    		$("#mensaje_comentario_respuesta_6").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_6).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_6").fadeOut("slow");
					
				}


		    	if(comentario_respuesta_7==""){

					$("#mensaje_comentario_respuesta_7").text("Conteste");
		    		$("#mensaje_comentario_respuesta_7").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_7).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_7").fadeOut("slow");
					
				}

		    	if(comentario_respuesta_8==""){

					$("#mensaje_comentario_respuesta_8").text("Conteste");
		    		$("#mensaje_comentario_respuesta_8").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_8).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_8").fadeOut("slow");
					
				}

		    	if(comentario_respuesta_9==""){

					$("#mensaje_comentario_respuesta_9").text("Conteste");
		    		$("#mensaje_comentario_respuesta_9").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_9).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_9").fadeOut("slow");
					
				}

		    	if(comentario_respuesta_10==""){

					$("#mensaje_comentario_respuesta_10").text("Conteste");
		    		$("#mensaje_comentario_respuesta_10").fadeIn("slow"); 
		    		 $("html, body").animate({ scrollTop: $(mensaje_comentario_respuesta_10).offset().top }, tiempo);
		            return false;

				}else{

					$("#mensaje_comentario_respuesta_10").fadeOut("slow");
					
				}
		    	
		    	
			}); 

		       $( "#cedula_aspirante" ).focus(function() {
				  $("#mensaje_cedula_aspirante").fadeOut("slow");
			    });
		       $( "#nombre_aspirante" ).focus(function() {
				  $("#mensaje_nombre_aspirante").fadeOut("slow");
			    });
		       $( "#puesto_postula" ).focus(function() {
				  $("#mensaje_puesto_postula").fadeOut("slow");
			    });


		       
		    

		        $( "#comentario_respuesta_1" ).focus(function() {
				  $("#mensaje_comentario_respuesta_1").fadeOut("slow");
			    });

		        $( "#comentario_respuesta_2" ).focus(function() {
					  $("#mensaje_comentario_respuesta_2").fadeOut("slow");
				 });

		        $( "#comentario_respuesta_3" ).focus(function() {
					  $("#mensaje_comentario_respuesta_3").fadeOut("slow");
				 });  

		        $( "#comentario_respuesta_4" ).focus(function() {
					  $("#mensaje_comentario_respuesta_4").fadeOut("slow");
				 });

		        $( "#comentario_respuesta_5" ).focus(function() {
					  $("#mensaje_comentario_respuesta_5").fadeOut("slow");
				 });

		        $( "#comentario_respuesta_6" ).focus(function() {
					  $("#mensaje_comentario_respuesta_6").fadeOut("slow");
				 });
				 
		        $( "#comentario_respuesta_7" ).focus(function() {
					  $("#mensaje_comentario_respuesta_7").fadeOut("slow");
				 });

		        $( "#comentario_respuesta_8" ).focus(function() {
					  $("#mensaje_comentario_respuesta_8").fadeOut("slow");
				 });
		        $( "#comentario_respuesta_9" ).focus(function() {
					  $("#mensaje_comentario_respuesta_9").fadeOut("slow");
				 });
		        $( "#comentario_respuesta_10" ).focus(function() {
					  $("#mensaje_comentario_respuesta_10").fadeOut("slow");
				 });
		}); 

	</script>
        
       
     
       
			        
    </head>
    
    
    <body class="nav-md">
    
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
			<!--<?php include("view/modulos/menu.php"); ?>-->
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
         <li class="active">Realizar Encuesta</li>
         </ol>
         </section>
       
  
		
		<div class="col-md-12 col-lg-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Proceso<small>Selección</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
		
      
      
      
         
           <form  action="<?php echo $helper->url("Encuestas","InsertaEncuestas"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12">
           
           
           <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-user'></i> Datos Personales</h4>
	         </div>
	         <div class="panel-body">
			 
			 <div class="row">
			 	
	                    
	                <div class="col-lg-2 col-md-2 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="cedula_aspirante" class="control-label">Identificación:</label>               
	                                      <input type="number" class="form-control" id="cedula_aspirante" name="cedula_aspirante"  placeholder="identificación.." />
	                                      <div id="mensaje_cedula_aspirante" class="errores"></div>
	                </div>
                    </div>
	           
	                <div class="col-lg-4 col-md-4 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="nombre_aspirante" class="control-label">Nombres y Apellidos:</label>               
	                                      <input type="text" class="form-control" id="nombre_aspirante" name="nombre_aspirante"  placeholder="nombres y apellidos.." />
	                                      <div id="mensaje_nombre_aspirante" class="errores"></div>
	                </div>
                    </div>
	           
	                <div class="col-lg-4 col-md-4 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="puesto_postula" class="control-label">Puesto al que Postula:</label>               
	                                      <input type="text" class="form-control" id="puesto_postula" name="puesto_postula"  placeholder="cargo.." />
	                                      <div id="mensaje_puesto_postula" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
              </div>
              </div>
           
      
          <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-user'></i> Evaluación</h4>
	         </div>
	         <div class="panel-body">
			 
			 <div class="row">
			 	<label  class="control-label"><?php echo $pregunta_1;?></label>
			    <input type="hidden" id="pregunta_1" name="pregunta_1" value="<?php echo $id_pregunta_1;?>">
			      
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_1" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_1" name="comentario_respuesta_1"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_1" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
			 
			 
           
           
               <div class="row">
			 	<label class="control-label"><?php echo $pregunta_2;?></label>
			     <input type="hidden" id="pregunta_2" name="pregunta_2" value="<?php echo $id_pregunta_2;?>">
			           
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_2" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_2" name="comentario_respuesta_2"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_2" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
           
           
            
            
            
            
               <div class="row">
			 	<label value="<?php echo $id_pregunta_3;?>" class="control-label"><?php echo $pregunta_3;?></label>
			    <input type="hidden" id="pregunta_3" name="pregunta_3" value="<?php echo $id_pregunta_3;?>">
			            
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_3" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_3" name="comentario_respuesta_3"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_3" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
        
              
           
           
           
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_4;?></label>
			     <input type="hidden" id="pregunta_4" name="pregunta_4" value="<?php echo $id_pregunta_4;?>">
			            
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_4" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_4" name="comentario_respuesta_4"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_4" class="errores"></div>
	                </div>
                    </div>
	          
              </div>
        
           
           
           
              
              
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_5;?></label>
			     <input type="hidden" id="pregunta_5" name="pregunta_5" value="<?php echo $id_pregunta_5;?>">
			         
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_5" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_5" name="comentario_respuesta_5"  placeholder="Respuesta.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_5" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
        
           
           
           
           
              
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_6;?></label>
			     <input type="hidden" id="pregunta_6" name="pregunta_6" value="<?php echo $id_pregunta_6;?>">
			       
	                    
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_6" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_6" name="comentario_respuesta_6"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_6" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
        
           
           
           
           
               
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_7;?></label>
			     <input type="hidden" id="pregunta_7" name="pregunta_7" value="<?php echo $id_pregunta_7;?>">
			      
	                    
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_7" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_7" name="comentario_respuesta_7"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_7" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
        
           
           
           
           
              <div class="row">
			 	<label class="control-label"><?php echo $pregunta_8;?></label>
			     <input type="hidden" id="pregunta_8" name="pregunta_8" value="<?php echo $id_pregunta_8;?>">
			          
	                    
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_8" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_8" name="comentario_respuesta_8"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_8" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
        
        
           <div class="row">
			 	<label class="control-label"><?php echo $pregunta_9;?></label>
			     <input type="hidden" id="pregunta_9" name="pregunta_9" value="<?php echo $id_pregunta_9;?>">
			          
	                    
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_9" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_9" name="comentario_respuesta_9"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_9" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
           
           
  			 <div class="row">
			 	<label class="control-label"><?php echo $pregunta_10;?></label>
			     <input type="hidden" id="pregunta_10" name="pregunta_10" value="<?php echo $id_pregunta_10;?>">
			          
	                    
	                    
	                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 1px;">
                    <div class="form-group">
	                                      <label for="comentario_respuesta_10" class="control-label">Respuesta:</label>               
	                                      <textarea  class="form-control" id="comentario_respuesta_10" name="comentario_respuesta_10"  placeholder="Conteste.." ></textarea>
	                                      <div id="mensaje_comentario_respuesta_10" class="errores"></div>
	                </div>
                    </div>
	           
              </div>
           
  			  
			  			<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
				  		 <button type="submit" id="generar" name="generar" value=""   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-edit"></i> Registrar Encuesta</button>         
					    </div>
  			
  		</div></div>	
         
      
      
       </form>
           
      
      
      
      
			      </div>
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
	<script src="view/js/jquery.inputmask.bundle.js"></script>
	<!-- codigo de las funciones -->

<script src="view/AdminLTE-2.4.2/plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {

 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    
    })
</script>



	
  </body>
</html>   