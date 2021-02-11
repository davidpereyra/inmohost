// JavaScript Document

	var totalColumnas = new Array;
	var totalLinks = new Array;
	
	var arrPrp = new Array;
	var indPrp = 0;

	if(!prpOrdenActual){
		var prpOrdenActual = "";
	}


// Esta función cargará la info
function cargoXML(url, idHead, vars, tip){
var pagina_requerida = false;

if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
		
		pagina_requerida = new XMLHttpRequest();
		
	} else if (window.ActiveXObject){ // pero si es IE
		try {
			pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e){ // en caso que sea una versión antigua
			try{
				pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){}
		}
	} else
		return false;

		pagina_requerida.onreadystatechange=function(){ // función de respuesta
			if(tip=="head"){
				armarHead (pagina_requerida, idHead, vars);
			} else if (tip=="listado"){
				armarListado (pagina_requerida, idHead);
			}
		}
		
		if(vars != ""){
			url = url+""+vars+""+prpQuery;
		} else { 
			url = url+"?"+prpQuery;
		}
		pagina_requerida.open('GET', url, true); // asignamos los métodos open y send
		pagina_requerida.send(null);
		//prompt ('ruta', url);

}

var totalHeadMostrar = 0;

//////////ARMA EL HEAD DE UN LISTADO EN UN TABLA
function armarHead(pagina_requerida, idHead, vars){

	if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1)){
	
		var xml = pagina_requerida.responseXML;

		var headTotal = xml.getElementsByTagName('head').length;

			var columna = xml.getElementsByTagName('head');
			var headData = "";

			var tablaHead = document.getElementById(idHead);
			var row = tablaHead.insertRow(-1);
			var cell;
			row.className = "tr1";
			
		for (var a=0; a<headTotal; a++){
				totalColumnas[a] =  columna.item(a).getAttribute('id');
				totalLinks[a] =  columna.item(a).getAttribute('link');

				if(columna.item(a).getAttribute('tamano')!="0"){
					cell = row.insertCell(-1);
					cell.width = columna.item(a).getAttribute('tamano')+"%";
					
					if(columna.item(a).firstChild.data == "Citas" || columna.item(a).firstChild.data ==  "Ficha" )
					cell.className = "no_print";

						cell.innerHTML = "<h2 align='center' title='"+columna.item(a).firstChild.data+"'><a onclick=\"cargoXML('"+prpFileListado+"', '"+idHead+"', '?orden="+totalColumnas[a]+"', 'listado');prpOrdenActual='"+totalColumnas[a]+"';\">"+columna.item(a).firstChild.data+"</a></h2>";

				}

				totalHeadMostrar++;
		}
		cargoXML(prpFileListado, idHead, vars, 'listado');
		document.getElementById("preCarga").innerHTML="";
	}else if (pagina_requerida.readyState == 1){
		document.getElementById("preCarga").innerHTML="Cargando Cabecera...";
	}
	sortables_init();
}

//////////ARMA EL LISTADO EN UN TABLA
function armarListado(pagina_requerida, idHead){
	var k=0;
	var checkb="";
	
	if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1)){
		
		var xml = pagina_requerida.responseXML;
		// inicio paginacion
		var prpPagTotalPro = Number(xml.getElementsByTagName('totalDatos').item(0).firstChild.data);
		var prpPagActual = Number(xml.getElementsByTagName('paginaActual').item(0).firstChild.data);
		var prpPagOffest = Number(xml.getElementsByTagName('offest').item(0).firstChild.data);
		var prpPagTotal = Math.ceil(prpPagTotalPro/prpPagOffest);

		document.getElementById('prpTotalDatos').innerHTML = prpPagTotalPro;		
	
	if (!prpPagActual){
		prpPagActual=1;
	}
	indPrp=0;
	if(prpPagTotalPro) {
		
		var prpPagTotalTemp="";
		var start_u=1;
		var end_u=1;
		for(u=1; u<=prpPagTotal; u++){
			if(u == (prpPagActual)){
				prpPagTotalTemp += "<span class='actual'>"+u+"</span>";
			} else {
				prpPagTotalTemp += "<a onclick=\"cargoXML('"+prpFileListado+"', '"+idHead+"', '?orden="+prpOrdenActual+"&page="+u+"&base="+((u-1)*prpPagOffest)+"', 'listado');\" title=\"\">"+u+"</a>";
			}
			if (u != prpPagTotal) prpPagTotalTemp += " - ";
		}
		document.getElementById('prpPaginasTotales').innerHTML = prpPagTotalTemp;
		if (prpPagTotalPro <= prpPagOffest){
			document.getElementById('prpPaginacion').style.display = "none";
		} else {
			document.getElementById('prpPaginacion').style.display = "";
			document.getElementById('prpOffest').innerHTML = prpPagOffest;
			document.getElementById('prpPaginaActual').innerHTML = prpPagActual;
		}
		// fin paginacion

		var columTotal = totalColumnas.length;
		var prpTotal = xml.getElementsByTagName('columna').length;
		var propiedadActual = "";
		
		var Data = "";
		
		var trColor = new Array;
		trColor[0] = "#FFFFFF";
		trColor[1] = "#EEEEEE";
		
		
		var label = new String;

			var tablaHead = document.getElementById(idHead);
				
				var filas = tablaHead.rows;
				
				if (filas.length>1){
					while (tablaHead.rows.length > 1) {
						 tablaHead.deleteRow(filas.length-1);
					}
				}
		for (var a=0; a<prpTotal; a++){
				propiedadActual = xml.getElementsByTagName('columna').item(a);

				var row = tablaHead.insertRow(-1);
				row.className = "tr2";
				var cell;
//				Data +="<tr class='tr2'"; 
//				Data +=" style='background:"+trColor[a%2]+"'";
//				Data +=" onmouseover='' onmouseover=''>";
				
				var modif_estado;
				for (var i=0; i<totalHeadMostrar; i++){
					label = ""+totalColumnas[i]+"";
					
					var dato = xml.getElementsByTagName('columna').item(a).getElementsByTagName(label).item(0).firstChild.data;
					
					var title;
					var urlLink;
					var img;
					var prp_id;
					var usr_id;
					var prp_inmoID;
					var pro_id;
					var pub_id;
					var nov_id;
					var emp_id;
					var nota_id;
					var tas_id;
					var dem_id;
					var fileABM;
					var prp_fot;
					
					
					if (label == 'prp_id') prp_id = dato;
					if (label == 'prp_inmoID')	prp_inmoID = dato;
					if (label == 'pro_id') pro_id = dato;	
					if (label == 'pub_id') pub_id = dato;	
					if (label == 'nov_id') nov_id = dato;	
					if (label == 'cita_id') cita_id = dato;	
					if (label == 'emp_id') emp_id = dato;
					if (label == 'nota_id') nota_id = dato;	
					if (label == 'usr_id') usr_id = dato;	
					if (label == 'tas_id') tas_id = dato;	
					if (label == 'dem_id') dem_id = dato;	
					if (label == 'fileABM') fileABM = dato;	
					
					
//alert('emp '+emp_id);
//alert('label: '+label);
	
						if(label == 'prp_citas') {
							if(dato == '0') {
								title = "no hay citas cargadas";
								img ="20_des/citas.png";
								urlLink = "";
							}
							else {
								title = "mostrar citas";
								img ="20/citas.png";
								urlLink = "window.parent.window.ventana('agenda_citas', '&prp_id="+prp_id+"', 'system/agenda_citas.php', 'Citas');";
							}
						} else if(label == 'prp_ficha') {
							if(dato == '0') {
								title = "ficha no habilitada";
								img ="20_des/ficha.png";
								urlLink = "";
							}
							else {
								title = "mostrar ficha";
								img ="20/ficha.png";
								p=a+1;
								q=a+11;
								r=a+101;
									switch(prpMod)
									{
										case 'mod_edit':
											urlLink = "ventana('win"+r+"', '&mod_edit=1&mod_tip=edit&prp_id="+prp_id+"&usr_id="+_USR_ID+"', 'system/prp_ficha_edit.php', 'Modificar Propiedad - ID:"+prp_id+"');";	
										break;
										case 'mod_del':
											urlLink = "ventana('win"+q+"', '&mod_edit=1&prp_id="+prp_id+"&usr_id="+_USR_ID+"', 'system/prp_ficha.php', 'Ficha de Propiedad');";
										break;
										case 'mod_search':
											urlLink = "ventana('win"+p+"', '&mod_edit=1&prp_id="+prp_id+"&usr_id="+prp_inmoID+"', 'system/prp_ficha.php', 'Ficha de Propiedad');";
										break;
										default:
										return false;
									}//switch
								urlLink = "window.parent.window."+urlLink;
							}
						} else if(label == 'prp_foto') {
							if(dato == '0') {
								title = "sin imagenes";
								img ="20_des/panoramica.png";
								urlLink = "";
							}
							else{
								title = ""+dato+" imagenes";
								img ="20/panoramica.png";
								urlLink = "";
							}
						} else if(label == 'prp_cartel') {
							if(dato == '0') 
							{
								title = "sin cartel";
								img ="20_des/aceptar.png";
								urlLink = "cambiar_cartel("+prp_id+",1);cargoXML('"+prpFileListado+"', '"+idHead+"', '?orden="+prpOrdenActual+"&page="+prpPagActual+"&base="+((prpPagActual-1)*prpPagOffest)+"', 'listado');";
							}
							else {
								title = "con cartel";
								img ="20/aceptar.png";
								urlLink = "cambiar_cartel("+prp_id+",0);cargoXML('"+prpFileListado+"', '"+idHead+"', '?orden="+prpOrdenActual+"&page="+prpPagActual+"&base="+((prpPagActual-1)*prpPagOffest)+"', 'listado');";
							}
						} else if(label == 'pro_dat') {
							if(dato == '0') {
								title = "sin permisos para ver datos";
								img ="20_des/usuario.png";
								urlLink = "";
							}
							else {
								title = "ver datos";
								img ="20/usuario.png";
								urlLink = "parent.position(event); parent.toolTip(\""+fileMenAgendaTelefonoDato+"&usr_id="+_USR_ID+"&pro_id="+pro_id+"\",this);";
							}
						} else if(label == 'pub_dat') {
							if(dato == '0') {
								title = "sin permisos para ver datos";
								img ="20_des/medios.png";
								urlLink = "";
							}
							else {
								title = "ver datos";
								img ="20/medios.png";
								urlLink = "parent.position(event);parent.toolTip('"+filePrpPublicacionesDato+"&usr_id="+_USR_ID+"&pub_id="+pub_id+"',this);";
							}
						} else if(label == 'pro_edit') {
							if(dato == '0') {
								title = "sin permisos para modificar";
								img ="20_des/editar.png";
								urlLink = "";
							}
							else {
								title = "modificar";
								img ="20/editar.png";
								urlLink = "parent.position(event); parent.toolTip(\""+fileMenAgendaTelefonoNew+"&usr_id="+_USR_ID+"&pro_id="+pro_id+"\",this);";
							}
						} else if(label == 'pro_del') {
							if(dato == '0') {
								title = "sin permisos para eliminar";
								img ="20_des/eliminar.png";
								urlLink = "";
							}
							else {
								title = "eliminar";
								img ="20/eliminar.png";
								urlLink = "";
							}
							
							
						} else if(label == 'nov_estado' || label == 'nov_id') {

							if(dato == '0') {
								title = "cambiar a le&iacute;da";
								//img ="20_des/novedades.png";
								k=k+1;	
								img ="";
								checkb="<input type=checkbox name='nov_" + k +"' value='"+ nov_id +";"+ emp_id +"' id='nov_"+k+"'>";
								
								//urlLink = "cambiar_estado_nov("+dato+","+nov_id+","+emp_id+");location.reload();";
								//urlLink = "document.getElementById('"+idHead+"').deleteRow(this.rowIndex);cambiar_estado_nov("+dato+","+nov_id+","+emp_id+")";
								
							}
							else {
								title = "novedad le&iacute;da";
								//img ="20/novedades.png";
								img="";
								checkb="";
								//urlLink = "cambiar_estado_nov("+dato+","+nov_id+");document.getElementById('img"+i+"').src='../interfaz/inmohost/images/iconos/20_des/novedades.png'";
								urlLink="";
								
							}
						}
						
						else if(label == 'cita_edit') {
							if(dato == '1') {
								title = "Modificar Cita";
								img ="20/editar.png";
								urlLink="window.parent.window.ventana('edicionSimple', '&cita_id="+cita_id+"&usr_id="+_USR_ID+"&ventanaDesde=listarCitas', '"+fileCitasEdit+"', 'Editar Cita');";
							}
							else {
								title = "No se puede modificar esta cita";
								img ="20_des/editar.png";
								urlLink = "";
							}
						}
						else if(label == 'cita_del') {
							if(dato == '1') {
								title = "Eliminar Cita";
								img ="20/eliminar.png";
								urlLink = "eliminar_cita("+cita_id+");location.reload();";
								//urlLink = "";
							}
							else {
								title = "No se puede Eliminar esta cita";
								img ="20_des/eliminar.png";
								urlLink = "";
							}
						}
						else if(label == 'nota_edit') {
							if(dato == '1') {
								title = "Editar Nota";
								img ="20/editar.png";
								urlLink="window.parent.window.ventana('edicionSimple', '&nota_id="+nota_id+"', '"+fileNotasEdit+"', 'Editar Nota');";
							}
							else {
								title = "No se puede Editar esta Nota";
								img ="20_des/editar.png";
								urlLink = "";
							}
						}
						else if(label == 'nota_del') {
							if(dato == '1') {
								title = "Eliminar Nota";
								img ="20/eliminar.png";
								urlLink = "eliminar_nota("+nota_id+");location.reload();";
								//urlLink = "";
							}
							else {
								title = "No se puede Eliminar esta cita";
								img ="20_des/eliminar.png";
								urlLink = "";
							}
						}
						else if(label == 'tas_edit') {
							if(dato == '1') {
								title = "Editar Tasacion";
								img ="20/editar.png";
								urlLink="window.parent.window.ventana('edicionSimple', '&tas_id="+tas_id+"', '"+fileTasEdit+"', 'Editar Tasacion');";
							}
							else {
								title = "No se puede Editar esta cita";
								img ="20_des/editar.png";
								urlLink = "";
							}
						}
						else if(label == 'tas_del') {
							if(dato == '1') {
								title = "Eliminar Tasacion";
								img ="20/eliminar.png";
								urlLink = "eliminar_tas("+tas_id+");location.reload();";
								//urlLink = "";
							}
							else {
								title = "No se puede Eliminar esta cita";
								img ="20_des/eliminar.png";
								urlLink = "";
							}
						}
						else if(label == 'dem_edit') {
							if(dato == '1') {
								title = "Editar Demanda";
								img ="20/editar.png";
								//urlLink="window.parent.window.ventana('edicionSimple', '&dem_id="+dem_id+"', '"+fileDemEdit+"', 'Editar Demandas');";
								urlLink="parent.ventana('alt_dem','&dem_id="+dem_id+"&mod_tip=edit&ventana=alt_dem&fileXML=agenda_demandas.xml.php&fileXSL=./agenda_demandas.xsl','system/agenda_demandas.php','Editar Demanda')";
							}
							else {
								title = "No se puede Editar esta cita";
								img ="20_des/editar.png";
								urlLink = "";
							}
						}
						else if(label == 'dem_del') {
							if(dato == '1') {
								title = "Eliminar Demanda";
								img ="20/eliminar.png";
								urlLink = "eliminar_demanda("+dem_id+");location.reload();";
								//urlLink = "";
							}
							else {
								title = "No se puede Eliminar esta Demanda";
								img ="20_des/eliminar.png";
								urlLink = "";
							}	
						
						}
						else if(label == 'dem_coin') {
							if(dato == '1') {
								title = "Coincidencias para esta demanda";
								img ="20/contacto.png";
								urlLink = "window.parent.window.ventana('dem_coin', '&dem_id="+dem_id+"', 'system/ver_coincidencias.php', 'Coincidencias de la Demanda');";
								//urlLink = "";
							}
							else {
								title = "No se puede Eliminar esta Demanda";
								img ="20_des/contacto.png";
								urlLink = "";
							}			
						
						}else {
							title = "";
							img = "";
							urlLink = "";
						}
						//alert (label);
						//alert('dato: '+dato+'img='+img+' urllink='+urlLink+' label='+label);		
						if(label != 'prp_inmoID' && label != 'pro_id'  && label != 'emp_id' && label!='cita_id' && label!='nota_id' && label != "" && label != "pub_id" ){ // agregar aca la cantidad de campos a ocultar

							cell = row.insertCell(-1);
							var Data = "";

							if(label == 'prp_dom' || label == 'nov_des') {
								Data = "<div align='left'>"+dato+"</div>";
							} 
							else if (label=='prp_mos' || label=='prp_vend' || label=='prp_susp' || label=='prp_elim')	{
								Data = ""; 
								if (a==0)
								{
									modif_estado=1;
								}
								Data = "<center><input type='radio' name='prp_estado_"+prp_id+"' value='"+label+"'";
								if (dato == '1')	{
									Data += " checked><input type='hidden' name='prp_estado_ant_"+prp_id+"' value='"+label+"'</center>";								
								}
								else  {
									Data += "></center>";
								}
							}
							else {

								if(img != ""){ 
									
									Data = "<center title='"+title+"'";
									// agregar todos lo que si se tienen que mostrar en modo imprecion
									if(label != "si mostrar")	Data += " class='no_print'>"; 
									Data += "<img src='../interfaz/inmohost/images/iconos/"+img+"' width='20' height='20' id='img"+i+"' /><center>"; 
								}else if(checkb!=""){
									
									Data= "<center title='"+title+"'";
									// agregar todos lo que si se tienen que mostrar en modo imprecion
									if(label != "si mostrar")	Data += " class='no_print'>"; 
									//Data += "<img src='../interfaz/inmohost/images/iconos/"+img+"' width='20' height='20' id='img"+i+"' /><center>"; ;
									Data += checkb+" </center>";
								}else{	
									
									Data = "<center>"+ dato +"</center>"; 
								}
								if(urlLink){
									Data ="<a href='javascript:;' onclick=\""+urlLink+"\" title='"+title+"'>"+ Data +"</a>";
								}
							}
							cell.innerHTML = Data;
						}
					} // for
					if (modif_estado)
					{
						arrPrp[indPrp++]=prp_id;
					}
		}
		if (indPrp<prpPagOffest)
		{
			arrPrp.length=indPrp;
			/*
			for (yy=indPrp;yy<prpPagOffest;yy++)
			{
				arrPrp[yy]=null;
			}
			*/
		}
		document.getElementById("preCarga").innerHTML = "";
		if (modif_estado)	{
			document.getElementById("preCarga").innerHTML = "<center><input type='button' value='Modificar' onclick=\"modifica_estado();\"></form></center>";
		}
		
		} else { // no hay datos
			document.getElementById("preCarga").innerHTML="<center class='destacado2'>No se han encontrado datos</center>";
		}

	}	else if (pagina_requerida.readyState == 1)
		document.getElementById("preCarga").innerHTML="Cargando Listado...";
}

function modifica_estado()
{
	var estados="";
	
	if (confirm("Esta seguro que desea modificar el estado de las propiedades listadas?"))
	{
		var checked;
		var encontrado;
		for (var i=0; i<arrPrp.length; i++)  {
			encontrado=0;
			for (var j=0; j<eval('document.listado.prp_estado_'+arrPrp[i]+'.length')&&!encontrado; j++)  {
				if (eval('document.listado.prp_estado_'+arrPrp[i]+'['+j+'].checked'))  {
					estados = estados+arrPrp[i]+","+eval('document.listado.prp_estado_'+arrPrp[i]+'['+j+'].value')+","+eval('document.listado.prp_estado_ant_'+arrPrp[i]+'.value')+":";
					encontrado=1;
				}
			}
		}
		document.listado.estados.value=estados;
		document.listado.submit();
	}
	else
	{
		return false;
	}
}
