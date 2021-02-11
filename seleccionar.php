<?php

	include "../parametros2.php";

	$db = mysqli_connect($HOST_NERON,$USUARIO_NERON,$PASSWORD_NERON,$BASE_DATOS_NERON);

	//leo las fotos que existen en la bd
		$q_fotos = "SELECT fo_nro,fo_enl FROM fotos WHERE prp_id = '".$prp_id."' ";
		$fotos_cons = mysqli_query($db,$q_fotos) or die ("Error al leer fotos: ".$q_fotos);
		$fila = mysqli_fetch_all($fotos_cons);
		$contenido = mysqli_num_rows($fotos_cons);
		$ies = 1;
		for ($i=1; $i < 16; $i++) { 
			${"foto".$i} = "";
		}
		if ($contenido > 0){
			foreach ($fila as $imagen) {
				${"foto".$ies} = $imagen[1];
				$ies++;
			}
		}	

			//echo $foto1."<br>".$foto2."<br>".$foto3."<br>".$foto4."<br>".$foto5."<br>".$foto6."<br>".$foto7."<br>".$foto8."<br>".$foto9."<br>".$foto10."<br>".$foto11."<br>".$foto12."<br>".$foto13."<br>".$foto14."<br>".$foto15;
	
    $conn_id = ftp_connect($ftp_server);
                
    $log_result = ftp_login($conn_id, $ftp_usr, $ftp_psw);
	ftp_set_option($ftp_conn, FTP_USEPASVADDRESS, false);
    ftp_pasv($conn_id, true);
    
    if ((!$conn_id) || (!$log_result)) { 
        echo "La conexion a fallado <br>";
    } 
    $ruta = "https://tasainmuebles.com/dash/fotos/".$prp_id;
    $ruta_local = "../fotos/";
	// cambio al directorio de fotos
	ftp_chdir($conn_id, "public_html/dash/fotos/".$prp_id);
	//echo "Dir actual: ".ftp_pwd($conn_id);
	$contents = ftp_nlist($conn_id, "");
?>							
	<link rel="stylesheet" href="../css/select.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<script src="../js/jquery-3.5.1.js"></script>
	<script src="../js/bootstrap.js"></script>
	<!-- Modales-->
		<div class="modal fade  bd-example-modal-lg" id="ModalImg1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

									$res = ftp_size($conn_id, $value);
									
									if($res != -1){
										echo '
											<div class="col-3">
												<div class="targets-wrapper imgcheck" width="33%">
														<a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
															<img src="'.$ruta."/".$value.'">
														</a>
														<label class="checkeable2">
														<input type="radio" name="selected1" value="'.$value.'">
															<img src="../img/select.png" width="40" height="30">
														</label> 
												</div>
											</div>	
											';
									}
								}
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg2" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected2" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg3" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected3" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg4" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected4" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg5" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected5" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg6" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected6" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg7" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected7" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg8" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected8" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg9" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected9" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg10" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected10" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg11" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected11" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg12" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected12" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg13" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected13" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg14" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected14" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
		<div class="modal fade  bd-example-modal-lg" id="ModalImg15" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">					
				
					<table class="table table-hover">
						<thead class="thead-dark">
							<th style="text-align: center;">SELECCIONAR IMAGEN
								<button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</th>
						</thead>	
					</table>

					<main class="container">
						<div class="row">
						    
						    <link rel="stylesheet" href="../css/jBox.all.css">
							<link rel="stylesheet" href="../css/demo.css"> 
							<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

							<?php

								// output $contents
								//print_r($contents);		

								foreach ($contents as $ke => $value) { 

								
							   		echo '
							   			 <div class="col-3">
											<div class="targets-wrapper imgcheck" width="33%">
											       	 <a class="demo-img" href="'.$ruta."/".$value.'" data-jbox-image="gallery2">
														<img src="'.$ruta."/".$value.'">
													 </a>
													 <label class="checkeable2">
													 <input type="radio" name="selected15" value="'.$value.'">
														<img src="../img/select.png" width="40" height="30">
													 </label> 
										  	</div>
										  </div>	
							 			 ';
								 }
							
							?>  	
								  	 				
							<script src="../js/jBox.all.js"></script>
							<script src="../js/demo.js"></script>
						</div>
					</main>
					<div class="modal-footer">
						<button type="button" id="acp" class="btn btn-success" data-dismiss="modal">Aceptar</button>						  
					</div>					
				</div>
			</div>
		</div>
	<!-- Fin modales-->
<form id="form" action="../seleccionar2.php" method="POST">
	<input type="hidden" name="prp_id" value="<?php echo $prp_id; ?>"/>
			
	<div class="row py-1" style="margin-left:5px;">
	
		<div class="col-2">
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg1">
				Elegir foto 1
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo1" id="fo1" value="<?php echo $foto1; ?>" onInput="validarInput1()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">				
			<button type="button" class="btn btn-warning btn-sm" id="efo1" onclick="limpiar()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a type="button" id="vfo1" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto1; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		
		<div class="col-2">
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg2">
				Elegir foto 2
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo2" id="fo2" value="<?php echo $foto2; ?>"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">				
			<button type="button" class="btn btn-warning btn-sm" id="efo2" onclick="limpiar2()">Eliminar foto</button>		
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a id="vfo2" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto2; ?>" disabled>Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg3">
				Elegir foto 3
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">		
			<input type="text" style="width:150px" name="fo3" id="fo3" value="<?php echo $foto3; ?>" onInput="validarInput3()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo3" onclick="limpiar3()">Eliminar foto</button>		
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo3" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto3; ?>">Ver foto</a>
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg4">
				Elegir foto 4
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<input type="text" style="width:150px" name="fo4" id="fo4" value="<?php echo $foto4; ?>" onInput="validarInput4()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">			
			<button type="button" class="btn btn-warning btn-sm" id="efo4" onclick="limpiar4()">Eliminar foto</button>					
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a id="vfo4" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto4; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg5">
				Elegir foto 5
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">			
			<input type="text" style="width:150px" name="fo5" id="fo5" value="<?php echo $foto5; ?>" onInput="validarInput5()"/>			
		</div>
		<div class="col-2"></div>
		<div class="col-2">			
			<button type="button" class="btn btn-warning btn-sm" id="efo5" onclick="limpiar5()">Eliminar foto</button>					
		</div>
		<div class="col-1"></div>
		<div class="col-1">			
			<a id="vfo5" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto5; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg6">
				Elegir foto 6
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<input type="text" style="width:150px" name="fo6" id="fo6" value="<?php echo $foto6; ?>" onInput="validarInput6()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">				
			<button type="button" class="btn btn-warning btn-sm" id="efo6" onclick="limpiar6()">Eliminar foto</button>					
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a id="vfo6" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto6; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg7">
				Elegir foto 7
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo7" id="fo7" value="<?php echo $foto7; ?>" onInput="validarInput7()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo7" onclick="limpiar7()">Eliminar foto</button>					
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo7" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto7; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg8">
				Elegir foto 8
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">
			<input type="text" style="width:150px" name="fo8" id="fo8" value="<?php echo $foto8; ?>" onInput="validarInput8()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo8" onclick="limpiar8()">Eliminar foto</button>		
		</div>
		<div class="col-1"></div>
		<div class="col-1">
			<a id="vfo8" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto8; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg9">
				Elegir foto 9
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo9" id="fo9" value="<?php echo $foto9; ?>" onInput="validarInput9()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">
			<button type="button" class="btn btn-warning btn-sm" id="efo9" onclick="limpiar9()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo9" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto9; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg10">
				Elegir foto 10
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<input type="text" style="width:150px" name="fo10" id="fo10" value="<?php echo $foto10; ?>" onInput="validarInput10()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">				
			<button type="button" class="btn btn-warning btn-sm" id="efo10" onclick="limpiar10()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a id="vfo10" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto10; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg11">
				Elegir foto 11
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<input type="text" style="width:150px" name="fo11" id="fo11" value="<?php echo $foto11; ?>" onInput="validarInput11()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">				
			<button type="button" class="btn btn-warning btn-sm" id="efo11" onclick="limpiar11()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">				
			<a id="vfo11" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto11; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg12">
				Elegir foto 12
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo12" id="fo12" value="<?php echo $foto12; ?>" onInput="validarInput12()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo12" onclick="limpiar12()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo12" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto12; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg13">
				Elegir foto 13
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo13" id="fo13" value="<?php echo $foto13; ?>" onInput="validarInput13()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo13" onclick="limpiar13()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo13" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto13; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg14">
				Elegir foto 14
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo14" id="fo14" value="<?php echo $foto14; ?>" onInput="validarInput14()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo14" onclick="limpiar14()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo14" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto14; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1" style="margin-left:5px;">
		<div class="col-2">			
			<button type="button" class="btn btn-secondary btn-sm btn-ancho" data-toggle="modal" data-target="#ModalImg15">
				Elegir foto 15
			</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<input type="text" style="width:150px" name="fo15" id="fo15" value="<?php echo $foto15; ?>" onInput="validarInput15()"/>
		</div>
		<div class="col-2"></div>
		<div class="col-2">	
			<button type="button" class="btn btn-warning btn-sm" id="efo15" onclick="limpiar15()">Eliminar foto</button>
		</div>
		<div class="col-1"></div>
		<div class="col-1">	
			<a id="vfo15" class="btn btn-info btn-sm" href="<?php echo $ruta_local.$foto15; ?>">Ver foto</a>			
		</div>
	</div>				
	<div class="row py-1">
		<div class="col-5"></div>
		<div class="col-2">	
			<input class="btnok" type="submit" value="Aceptar"/>		
		</div>
		<div class="col-4	"></div>
	</div>
</form>	

<!-- OBTENER VALOR DE CHECKBOX -->
	<script>
		$(document).ready(function() {
			$('[name="selected1"]').click(function() {

				var arr = $('[name="selected1"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo1").value = arr;		  
			});
			$('[name="selected2"]').click(function() {

				var arr = $('[name="selected2"]:checked').map(function(){
				            return this.value;
					      }).get();	
				document.getElementById("fo2").value = arr;		  
			});
			$('[name="selected3"]').click(function() {

				var arr = $('[name="selected3"]:checked').map(function(){
				            return this.value;
					      }).get();			
				document.getElementById("fo3").value = arr;		  
			});
			$('[name="selected4"]').click(function() {

				var arr = $('[name="selected4"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo4").value = arr;		  
			});
			$('[name="selected5"]').click(function() {

				var arr = $('[name="selected5"]:checked').map(function(){
				            return this.value;
					      }).get();	
				document.getElementById("fo5").value = arr;		  
			});		
			$('[name="selected6"]').click(function() {

				var arr = $('[name="selected6"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo6").value = arr;		  
			});
			$('[name="selected7"]').click(function() {

				var arr = $('[name="selected7"]:checked').map(function(){
				            return this.value;
					      }).get();	
				document.getElementById("fo7").value = arr;		  
			});
			$('[name="selected8"]').click(function() {

				var arr = $('[name="selected8"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo8").value = arr;		  
			});
			$('[name="selected9"]').click(function() {

				var arr = $('[name="selected9"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo9").value = arr;		  
			});
			$('[name="selected10"]').click(function() {

				var arr = $('[name="selected10"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo10").value = arr;		  
			});		
			$('[name="selected11"]').click(function() {

				var arr = $('[name="selected11"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo11").value = arr;		  
			});
			$('[name="selected12"]').click(function() {

				var arr = $('[name="selected12"]:checked').map(function(){
				            return this.value;
					      }).get();			
				document.getElementById("fo12").value = arr;		  
			});
			$('[name="selected13"]').click(function() {

				var arr = $('[name="selected13"]:checked').map(function(){
				            return this.value;
					      }).get();			
				document.getElementById("fo13").value = arr;		  
			});
			$('[name="selected14"]').click(function() {

				var arr = $('[name="selected14"]:checked').map(function(){
				            return this.value;
					      }).get();		
				document.getElementById("fo14").value = arr;		  
			});
			$('[name="selected15"]').click(function() {

				var arr = $('[name="selected15"]:checked').map(function(){
				            return this.value;
					      }).get();			
				document.getElementById("fo15").value = arr;		  
			});									
		});			
	</script>	

<!-- VACIAR INPUT -->
	<script>
		function limpiar() {
	    	document.getElementById("fo1").value = "";
		}
		function limpiar2() {
	    	document.getElementById("fo2").value = "";
		}
		function limpiar3() {
	    	document.getElementById("fo3").value = "";
		}
		function limpiar4() {
	    	document.getElementById("fo4").value = "";
		}
		function limpiar5() {
	    	document.getElementById("fo5").value = "";
		}		
		function limpiar6() {
	    	document.getElementById("fo6").value = "";
		}
		function limpiar7() {
	    	document.getElementById("fo7").value = "";
		}
		function limpiar8() {
	    	document.getElementById("fo8").value = "";
		}
		function limpiar9() {
	    	document.getElementById("fo9").value = "";
		}
		function limpiar10() {
	    	document.getElementById("fo10").value = "";
		}		
		function limpiar11() {
	    	document.getElementById("fo11").value = "";
		}
		function limpiar12() {
	    	document.getElementById("fo12").value = "";
		}
		function limpiar13() {
	    	document.getElementById("fo13").value = "";
		}
		function limpiar14() {
	    	document.getElementById("fo14").value = "";
		}
		function limpiar15() {
	    	document.getElementById("fo15").value = "";
		}				
	</script>

<!-- HABILITAR BOTONES -->
	<!--script>

		function validarInput1() {
		document.getElementById("vfo1").disabled = !document.getElementById("fo1").value.length;
		}
		function validarInput2() {
			const foto = document.getElementById("fo2");
			const boton = document.getElementById("vfo2");
			if (foto.value !== "") {
				boton.removeAttribute('disabled');
			} else {
				boton.setAttribute('disabled', "true");
			}
		}
		function validarInput3() {
		document.getElementById("vfo3").disabled = !document.getElementById("fo3").value.length;
		}
		function validarInput4() {
		document.getElementById("vfo4").disabled = !document.getElementById("fo4").value.length;
		}
		function validarInput5() {
		document.getElementById("vfo5").disabled = !document.getElementById("fo5").value.length;
		}
		function validarInput6() {
		document.getElementById("vfo6").disabled = !document.getElementById("fo6").value.length;
		}
		function validarInput7() {
		document.getElementById("vfo7").disabled = !document.getElementById("fo7").value.length;
		}
		function validarInput8() {
		document.getElementById("vfo8").disabled = !document.getElementById("fo8").value.length;
		}
		function validarInput9() {
		document.getElementById("vfo9").disabled = !document.getElementById("fo9").value.length;
		}
		function validarInput10() {
		document.getElementById("vfo10").disabled = !document.getElementById("fo10").value.length;
		}
		function validarInput11() {
		document.getElementById("vfo11").disabled = !document.getElementById("fo11").value.length;
		}
		function validarInput12() {
		document.getElementById("vfo12").disabled = !document.getElementById("fo12").value.length;
		}
		function validarInput13() {
		document.getElementById("vfo13").disabled = !document.getElementById("fo13").value.length;
		}
		function validarInput14() {
		document.getElementById("vfo14").disabled = !document.getElementById("fo14").value.length;
		}
		function validarInput15() {
		document.getElementById("vfo15").disabled = !document.getElementById("fo15").value.length;
		}
	</script-->

	<script type="text/javascript">
		$(document).ready(function() {
		//Siempre que salgamos de un campo de texto, se chequeará esta función
		$("#form input").keyup(function() {
			var form = $(this).parents("#form");
			var check = checkCampos(form);
			if(check) {
				$("#vfo2").prop("disabled", false);
			}
			else {
				$("#vfo2").prop("disabled", true);
			}
		});
	});

	//Función para comprobar los campos de texto
	function checkCampos(obj) {
		var camposRellenados = true;
		obj.find("input").each(function() {
		var $this = $(this);
			if( $this.val().length <= 0 ) {
				camposRellenados = false;
				return false;
			}
		});
		if(camposRellenados == false) {
			return false;
		}
		else {
			return true;
		}
	}
	</script>