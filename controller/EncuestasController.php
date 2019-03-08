<?php

class EncuestasController extends ControladorBase{

	public function __construct() {
		parent::__construct();
		
	}


	
	
	
	
	public function index(){
	
		session_start();
		
			
			$encuestas = new EncuestasModel();
			$preguntas = new PreguntasEncuentasModel();
	
			$contador=0;
			$pregunta_1 = "";
			$pregunta_2 = "";
			$pregunta_3 = "";
			$pregunta_4 = "";
			$pregunta_5 = "";
			$pregunta_6 = "";
			$pregunta_7 = "";
			$pregunta_8 = "";
			$pregunta_9 = "";
			$pregunta_10 = "";
			
			$id_pregunta_1 = "";
			$id_pregunta_2 = "";
			$id_pregunta_3 = "";
			$id_pregunta_4 = "";
			$id_pregunta_5 = "";
			$id_pregunta_6 = "";
			$id_pregunta_7 = "";
			$id_pregunta_8 = "";
			$id_pregunta_9 = "";
			$id_pregunta_10 = "";
			
			
				
					
				$columnas="id_preguntas, nombre_preguntas";
				$tablas="preguntas";
				$where="1=1";
				$id="id_preguntas";
				$resultPreguntas=$preguntas->getCondiciones($columnas, $tablas, $where, $id);
				
				
				
				if(!empty($resultPreguntas)){
					
					foreach ($resultPreguntas as $res){
						
						$contador++;
						
						if($contador==1){
						    $id_pregunta_1=$res->id_preguntas;
						    $pregunta_1=$res->nombre_preguntas;
							
						}else if($contador==2){
						    $id_pregunta_2=$res->id_preguntas;
						    $pregunta_2=$res->nombre_preguntas;
							
						}
						else if($contador==3){
						    $id_pregunta_3=$res->id_preguntas;
						    $pregunta_3=$res->nombre_preguntas;
								
						}else if($contador==4){
						    $id_pregunta_4=$res->id_preguntas;
						    $pregunta_4=$res->nombre_preguntas;
							
						}else if($contador==5){
						    $id_pregunta_5=$res->id_preguntas;
						    $pregunta_5=$res->nombre_preguntas;
							
						}else if($contador==6){
						    $id_pregunta_6=$res->id_preguntas;
						    $pregunta_6=$res->nombre_preguntas;
							
						}else if($contador==7){
						    $id_pregunta_7=$res->id_preguntas;
						    $pregunta_7=$res->nombre_preguntas;
							
						}else if($contador==8){
						    $id_pregunta_8=$res->id_preguntas;
						    $pregunta_8=$res->nombre_preguntas;
							
						}
						else if($contador==9){
						    $id_pregunta_9=$res->id_preguntas;
						    $pregunta_9=$res->nombre_preguntas;
						    
						}
						else if($contador==10){
						    $id_pregunta_10=$res->id_preguntas;
						    $pregunta_10=$res->nombre_preguntas;
						    
						}
						
					}
					
				}
				
					
				
				$this->view("Encuestas",array(
						"pregunta_1"=>$pregunta_1, "pregunta_2"=>$pregunta_2, "pregunta_3"=>$pregunta_3,
						"pregunta_4"=>$pregunta_4, "pregunta_5"=>$pregunta_5, "pregunta_6"=>$pregunta_6,
						"pregunta_7"=>$pregunta_7, "pregunta_8"=>$pregunta_8,
				        "pregunta_9"=>$pregunta_9, "pregunta_10"=>$pregunta_10,
						"id_pregunta_1"=>$id_pregunta_1, "id_pregunta_2"=>$id_pregunta_2, "id_pregunta_3"=>$id_pregunta_3,
						"id_pregunta_4"=>$id_pregunta_4, "id_pregunta_5"=>$id_pregunta_5, "id_pregunta_6"=>$id_pregunta_6,
						"id_pregunta_7"=>$id_pregunta_7, "id_pregunta_8"=>$id_pregunta_8,
				        "id_pregunta_9"=>$id_pregunta_9, "id_pregunta_10"=>$id_pregunta_10
						
	
				));
	
			
	
	}
	
	
	
	
	
	
	
	


	public function InsertaEncuestas(){
	
		session_start();
	
		
	
			
			$aspirante = new AspiranteModel();
			$respuestas = new EncuestasModel();
				
			if ( isset($_POST["pregunta_1"]) )
			{
				
			    $_cedula_aspirante    = $_POST["cedula_aspirante"];
			    $_nombre_aspirante    = $_POST["nombre_aspirante"];
			    $_puesto_postula    = $_POST["puesto_postula"];
			    
				
				$_pregunta_1    = $_POST["pregunta_1"];
				$_pregunta_2    = $_POST["pregunta_2"];
				$_pregunta_3    = $_POST["pregunta_3"];
				$_pregunta_4    = $_POST["pregunta_4"];
				$_pregunta_5    = $_POST["pregunta_5"];
				$_pregunta_6    = $_POST["pregunta_6"];
				$_pregunta_7    = $_POST["pregunta_7"];
				$_pregunta_8    = $_POST["pregunta_8"];
				$_pregunta_9    = $_POST["pregunta_9"];
				$_pregunta_10    = $_POST["pregunta_10"];
				
			
				
				
				$_comentario_respuesta_1    = $_POST["comentario_respuesta_1"];
				$_comentario_respuesta_2    = $_POST["comentario_respuesta_2"];
				$_comentario_respuesta_3    = $_POST["comentario_respuesta_3"];
				$_comentario_respuesta_4    = $_POST["comentario_respuesta_4"];
				$_comentario_respuesta_5    = $_POST["comentario_respuesta_5"];
				$_comentario_respuesta_6    = $_POST["comentario_respuesta_6"];
				$_comentario_respuesta_7    = $_POST["comentario_respuesta_7"];
				$_comentario_respuesta_8    = $_POST["comentario_respuesta_8"];
				$_comentario_respuesta_9    = $_POST["comentario_respuesta_9"];
				$_comentario_respuesta_10    = $_POST["comentario_respuesta_10"];
				
				
				
				
				
	
	
	
				try {
					
					
					$funcion = "public.ins_aspirante";
					$parametros = "'$_cedula_aspirante','$_nombre_aspirante','$_puesto_postula'";
					$aspirante->setFuncion($funcion);
					$aspirante->setParametros($parametros);
					$resultado=$aspirante->Insert();
					
					
					
					$resultEncuestasCabeza= $aspirante->getBy("cedula_aspirante='$_cedula_aspirante' AND puesto_postula='$_puesto_postula'  order by id_aspirante DESC");
					$id_aspirante=$resultEncuestasCabeza[0]->id_aspirante;
					
					
					
					
				} catch (Exception $e) {
						
					echo "Error al Insertar Aspirante";
    				die();
						
				}
	
	
				
				
				if ($id_aspirante > 0){
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_1', '$_comentario_respuesta_1', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 1";
						die();
						
					}
					
					
					
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_2', '$_comentario_respuesta_2', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 2";
						die();
					
					}
					
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_3', '$_comentario_respuesta_3', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 3";
						die();
					
					}
						
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_4', '$_comentario_respuesta_4', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 4";
						die();
							
					}
					
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_5', '$_comentario_respuesta_5', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 5";
						die();
							
					}
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_6', '$_comentario_respuesta_6', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 6";
						die();
							
					}
					
					
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_7', '$_comentario_respuesta_7', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 7";
						die();
							
					}
						
					try {
						$funcion = "public.ins_respuestas";
						$parametros = "'$_pregunta_8', '$_comentario_respuesta_8', '$id_aspirante'";
						$respuestas->setFuncion($funcion);
						$respuestas->setParametros($parametros);
						$resultado=$respuestas->Insert();
					} catch (Exception $e) {
						echo "Error al Insertar Encuestas Detalle 8";
						die();
							
					}
					
					try {
					    $funcion = "public.ins_respuestas";
					    $parametros = "'$_pregunta_9', '$_comentario_respuesta_9', '$id_aspirante'";
					    $respuestas->setFuncion($funcion);
					    $respuestas->setParametros($parametros);
					    $resultado=$respuestas->Insert();
					} catch (Exception $e) {
					    echo "Error al Insertar Encuestas Detalle 9";
					    die();
					    
					}
					
					try {
					    $funcion = "public.ins_respuestas";
					    $parametros = "'$_pregunta_10', '$_comentario_respuesta_10', '$id_aspirante'";
					    $respuestas->setFuncion($funcion);
					    $respuestas->setParametros($parametros);
					    $resultado=$respuestas->Insert();
					} catch (Exception $e) {
					    echo "Error al Insertar Encuestas Detalle 10";
					    die();
					    
					}
					
					
				}else{
					
					$this->redirect("Encuestas", "index");
					
				}
	
	
					
					
				$this->redirect("Encuestas", "index");
	
	
			}
			else
			{
	
			    $this->redirect("Encuestas", "index");
			}
	
	
		
		
	
	}
	
	
	
	public function cargar_encuestas(){
	
		session_start();
		$id_rol=$_SESSION["id_rol"];
		$i=0;
	    $encuestas = new EncuestasCabezaModel();
		$columnas = "id_encuentas_participes_cabeza";
		$tablas   = "public.encuentas_participes_cabeza";
		$where    = "1=1";
		$id       = "id_encuentas_participes_cabeza";
		$resultSet = $encuestas->getCondiciones($columnas ,$tablas ,$where, $id);
	
		$i=count($resultSet);
	
		$html="";
		if($i>0)
		{
	
			$html .= "<div class='col-lg-3 col-xs-12'>";
			$html .= "<div class='small-box bg-yellow'>";
			$html .= "<div class='inner'>";
			$html .= "<h3>$i</h3>";
			$html .= "<p>Encuestas Realizadas.</p>";
			$html .= "</div>";
			$html .= "<div class='icon'>";
			$html .= "<i class='ion ion-pie-graph'></i>";
			$html .= "</div>";
				
			if($id_rol==1 || $id_rol==43 || $id_rol==45){
				$html .= "<a href='index.php?controller=Encuestas&action=index2' class='small-box-footer'>Leer Mas<i class='fa fa-arrow-circle-right'></i></a>";
			}else{
				$html .= "<a href='#' class='small-box-footer'>Leer Mas<i class='fa fa-arrow-circle-right'></i></a>";
			}
			$html .= "</div>";
			$html .= "</div>";
	
	
		}else{
	
			$html = "<b>Actualmente no hay encuestas realizadas...</b>";
		}
	
		echo $html;
		die();
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function paginate_load_encuestas_realizadas($reload, $page, $tpages, $adjacents) {
	
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = '<ul class="pagination pagination-large">';
	
		// previous label
	
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_encuestas_realizadas(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_encuestas_realizadas(".($page-1).")'>$prevlabel</a></span></li>";
	
		}
	
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_encuestas_realizadas(1)'>1</a></li>";
		}
		// interval
		if($page>($adjacents+2)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// pages
	
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='active'><a>$i</a></li>";
			}else if($i==1) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_encuestas_realizadas(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load_encuestas_realizadas(".$i.")'>$i</a></li>";
			}
		}
	
		// interval
	
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// last
	
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_encuestas_realizadas($tpages)'>$tpages</a></li>";
		}
	
		// next
	
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_encuestas_realizadas(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
	
		$out.= "</ul>";
		return $out;
	}
	
	
	
	
	public function print_enc()
	{
	
		session_start();
		$usuarios= new UsuariosModel();
	
		$encuestas_cabeza = new EncuestasCabezaModel();
		$encuestas_detalle = new EncuestasModel();
		
		$html="";
	
	
	
		$cedula_usuarios = $_SESSION["cedula_usuarios"];
		$fechaactual = getdate();
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$fechaactual=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
		 
		$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/webcapremci';
		$dom=$directorio.'/view/dompdf/dompdf_config.inc.php';
		$domLogo=$directorio.'/view/images/lcaprem.png';
		$logo = '<img src="'.$domLogo.'" alt="Responsive image" width="200" height="50">';
		 
	
	
		if(!empty($cedula_usuarios)){
				
	
			if(isset($_GET["id_encuestas"])){
	
				    $id_encuestas=$_GET["id_encuestas"];
						
					$columnas_encuestas_cabec ="encuentas_participes_cabeza.id_encuentas_participes_cabeza, encuentas_participes_cabeza.id_usuarios, 
											  usuarios.cedula_usuarios, 
											  usuarios.nombre_usuarios, 
											  usuarios.celular_usuarios, 
											  usuarios.correo_usuarios, 
											  usuarios.fotografia_usuarios, 
											  estado.nombre_estado, 
											  encuentas_participes_cabeza.creado";
					$tablas_encuestas_cabec="public.usuarios, 
										  public.encuentas_participes_cabeza, 
										  public.estado";
					$where_encuestas_cabec="encuentas_participes_cabeza.id_usuarios = usuarios.id_usuarios AND
  											estado.id_estado = usuarios.id_estado AND encuentas_participes_cabeza.id_encuentas_participes_cabeza='$id_encuestas'";
					$id_encuestas_cabec="encuentas_participes_cabeza.id_encuentas_participes_cabeza";
					$resultEncuestas_Cabec=$encuestas_cabeza->getCondicionesDesc($columnas_encuestas_cabec, $tablas_encuestas_cabec, $where_encuestas_cabec, $id_encuestas_cabec);
	
						
	
					if(!empty($resultEncuestas_Cabec)){
							
						$_id_encuentas_participes_cabeza=$resultEncuestas_Cabec[0]->id_encuentas_participes_cabeza;
						$_id_usuarios=$resultEncuestas_Cabec[0]->id_usuarios;
						$_fecha_encuesta=date("d/m/Y", strtotime($resultEncuestas_Cabec[0]->creado));
						$_nombre_usuarios=$resultEncuestas_Cabec[0]->nombre_usuarios;
						$_cedula_usuarios=$resultEncuestas_Cabec[0]->cedula_usuarios;
						
							
						if($_id_encuentas_participes_cabeza > 0 && $_id_usuarios > 0){
	
							$columnas_encuestas_detall =" encuentas_participes_detalle.id_preguntas_encuestas_participes, 
														  preguntas_encuestas_participes.nombre_preguntas_encuestas_participes, 
														  encuentas_participes_detalle.respuestas_encuestas_participes, 
														  encuentas_participes_detalle.comentario_encuestas_participes";
								
							$tablas_encuestas_detall="public.encuentas_participes_detalle, 
 													 public.preguntas_encuestas_participes";
							$where_encuestas_detall="preguntas_encuestas_participes.id_preguntas_encuestas_participes = encuentas_participes_detalle.id_preguntas_encuestas_participes
							AND encuentas_participes_detalle.id_encuentas_participes_cabeza='$_id_encuentas_participes_cabeza'";
							$id_encuestas_detall="encuentas_participes_detalle.id_preguntas_encuestas_participes";
							$resultSet=$encuestas_detalle->getCondiciones($columnas_encuestas_detall, $tablas_encuestas_detall, $where_encuestas_detall, $id_encuestas_detall);
	
							
							
							
								
							$html.='<p style="text-align: right;">'.$logo.'<hr style="height: 2px; background-color: black;"></p>';
							$html.='<p style="text-align: right; font-size: 13px;"><b>Impreso:</b> '.$fechaactual.'</p>';
							$html.='<p style="text-align: center; font-size: 16px;"><b>ENCUESTA SERVICIOS ONLINE</b></p>';
	
							$html.= '<p style="margin-top:15px; text-align: justify; font-size: 13px;"><b>NOMBRES:</b> '.$_nombre_usuarios.'  <b style="margin-left: 20%; font-size: 13px;">IDENTIFICACIÓN:</b> '.$_cedula_usuarios.'</p>';
	                        $html.= '<p style="margin-top:15px; text-align: justify; font-size: 13px;"><b>ENCUESTA REALIZADA EL:</b> '.$_fecha_encuesta.'</p>';
							
	                        
	                        if (!empty($resultSet)){
	                        	
	                        	$pregunta="";
	                        	$respuesta="";
	                        	$comentario="";
	                        	
		                        foreach ($resultSet as $res){
		                       
		                        $numero = $res->id_preguntas_encuestas_participes;
		                        $pregunta = $res->nombre_preguntas_encuestas_participes;
		                        $respuesta = $res->respuestas_encuestas_participes;
		                        $comentario = $res->comentario_encuestas_participes;
		                        
		                        
		                        if($numero==1){
		                        
		                        	$html.= "<b>$pregunta</b>";
		                        	
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='Bueno'){
		                        		
		                        	$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Bueno</u></b></th>';
		                        		 
		                        	}else{
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Bueno</th>';
		                        		 
		                        	}	
		                        	
		                        	if($respuesta=='Intermedio'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Intermedio</u></b></th>';
		                        		 
		                        	}else{
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Intermedio</th>';
		                        		 
		                        	}
		                        	 
		                        	
		                        	if($respuesta=='Malo'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Malo</u></b></th>';
		                        		 
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Malo</th>';
		                        		 
		                        	}
			                    $html.='</tr>';
			                    
			                    
			                    if($comentario!=''){
			                    
			                    $html.= '<tr>';
			                    $html.='<td  colspan="3" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
			                    $html.='</tr>';
			                    
			                    }
			                    
			                    $html.='</table>';
		                        
		                        } elseif ($numero==2){
		                        	
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='Si'){
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Si</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Si</th>';
		                        		
		                        	}
		                        	
		                        	
		                        	if($respuesta=='Algo'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Algo</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Algo</th>';
		                        	
		                        	}
		                        	
		                        	
		                        	if($respuesta=='Nada'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Nada</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Nada</th>';
		                        		 
		                        	}
		                        	
		                        	$html.='</tr>';
		                        	
		                        	if($comentario!=''){
		                        	
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="3" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        }
		                        
		                        elseif ($numero==3){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='Los Colores'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Los Colores</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Los Colores</th>';
		                        		 
		                        	}
		                        	
		                        	if($respuesta=='La Información'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>La Información</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">La Información</th>';
		                        		 
		                        	}
		                        	
		                        	if($respuesta=='Las Imágenes'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Las Imágenes</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Las Imágenes</th>';
		                        		 
		                        	}
		                        	
		                        	if($respuesta=='Nada'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Nada</u></b></th>';
		                        		 
		                        	}else{
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Nada</th>';
		                        		 
		                        	}
		                        	
		                        	$html.='</tr>';
		                        	 
		                        	
		                        	if($comentario!=''){
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="4" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        	 
		                        }
		                        
		                        elseif ($numero==4){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='1'){
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>1</u></b></th>';
		                        	}else{
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">1</th>';
		                        	}
		                        	
		                        	if($respuesta=='2'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>2</u></b></th>';
		                        	}else{
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">2</th>';
		                        	}
		                        	
		                        	if($respuesta=='3'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>3</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">3</th>';
		                        	}
		                        	
		                        	if($respuesta=='4'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>4</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">4</th>';
		                        	}
		                        	
		                        	if($respuesta=='5'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>5</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">5</th>';
		                        	}
		                        	
		                        	if($respuesta=='6'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>6</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">6</th>';
		                        	}
		                        	
		                        	if($respuesta=='7'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>7</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">7</th>';
		                        	}
		                        	
		                        	if($respuesta=='8'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>8</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">8</th>';
		                        	}
		                        	
		                        	if($respuesta=='9'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>9</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">9</th>';
		                        	}
		                        	
		                        	if($respuesta=='10'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>10</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">10</th>';
		                        	}
		                        	 
		                        	$html.='</tr>';
		                        	 
		                        	if($comentario!=''){
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="10" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        	
		                        }elseif ($numero==5){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='Si'){
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Si</u></b></th>';
		                        	}else{
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Si</th>';
		                        	}
		                        	
		                        	if($respuesta=='Intermedio'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Intermedio</u></b></th>';
		                        	}else{
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Intermedio</th>';
		                        	}
		                        	
		                        	
		                        	if($respuesta=='No'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>No</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">No</th>';
		                        	}
		                        	
		                        	$html.='</tr>';
		                        	 
		                        	if($comentario!=''){
		                        	
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="3" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        	
		                        }elseif ($numero==6){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	
		                        	if($respuesta=='Si'){
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Si</u></b></th>';
		                        		 
		                        	}else {
		                        		
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Si</th>';
		                        	}
		                        	
		                        	if($respuesta=='No'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>No</u></b></th>';
		                        		 
		                        	}else {
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">No</th>';
		                        	}
		                        	
		                        	$html.='</tr>';
		                        	
		                        	if($comentario!=''){
		                        	
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="2" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        }elseif ($numero==7){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	if($respuesta=='Si'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Si</u></b></th>';
		                        		 
		                        	}else {
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Si</th>';
		                        	}
		                        	 
		                        	if($respuesta=='No'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>No</u></b></th>';
		                        		 
		                        	}else {
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">No</th>';
		                        	}
		                        	$html.='</tr>';
		                        	 
		                        	if($comentario!=''){
		                        	
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="2" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        }elseif ($numero==8){
		                        	$html.= "<br>";
		                        	$html.= "<b>$pregunta</b>";
		                        	$html.= "<table style='width: 100%; margin-top:10px;'>";
		                        	$html.= '<tr>';
		                        	if($respuesta=='Si'){
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Si</u></b></th>';
		                        	}else{
		                        	
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Si</th>';
		                        	}
		                        	 
		                        	if($respuesta=='Intermedio'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>Intermedio</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">Intermedio</th>';
		                        	}
		                        	 
		                        	 
		                        	if($respuesta=='No'){
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;"><b><u>No</u></b></th>';
		                        	}else{
		                        		 
		                        		$html.='<th style="text-align: center;  font-size: 15px; font-weight: normal;">No</th>';
		                        	}
		                        	 
		                        	$html.='</tr>';
		                        	 
		                        	if($comentario!=''){
		                        	
		                        	$html.= '<tr>';
		                        	$html.='<td  colspan="3" style="text-align: justify;  font-size: 15px;"><b>Porque:</b> '.$comentario.'</td>';
		                        	$html.='</tr>';
		                        	}
		                        	$html.='</table>';
		                        	
		                        	
		                        }
		                        
		                        
		                         
		                        }	
		                       
		                        
	                        }
	                        
						}
							
					}
	
						
					$this->report("Encuestas",array( "resultSet"=>$html));
					die();
						
						
						
						
				
	
	
	
			}else{
	
				$this->redirect("Usuarios","sesion_caducada");
	
			}
				
	
		}else{
	
			$this->redirect("Usuarios","sesion_caducada");
	
		}
	
	}
	
	
	
	
	
	
	
	
}
?>