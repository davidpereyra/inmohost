// JavaScript Document


/* ver si usa */
function checkEnter(event,form)	{ 	
	var code = 0;
	if (document.layers)
		code = event.which;
	else
		code = event.keyCode;
	if (code==13){
		eval('document.'+form).submit();
	}	
}




function ver_foto(foto_addr)
{
	//alert("<img src='"+rutaAbsoluta+rutaSystemAbs+"php/funciones/foto.php?foto="+rutaAbsoluta+foto_addr+"&tam=700' border='0' />")
		
			Dialog.alert("<img src='"+rutaAbsoluta+foto_addr+"' border='0' />", {
					 windowParameters: {className:"alert", width:600, height:400}, 
					 okLabel: "Cerrar"
					 });
}

function maximizar(){
	//solucionar
	//al estar mazimizado tira error por que esto no se deveria ejecutar
	if (top.window.outerHeight<screen.availHeight||top.window.outerWidth<screen.availWidth){
		window.moveTo(0,0);
		window.resizeTo(screen.width, (screen.height-30));
	} else {
		window.moveTo(0,0);
		window.resizeTo(screen.width, (screen.height-30));
	}
	window.focus();

}
	
function navegador(){
<!--
var nombre = navigator.appName
	if (nombre == "Microsoft Internet Explorer")
		return nombre = "ie";
	else
		return nombre = "ns";
//-->
}
<!--
// menu principal
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->

///////////////////////////////////////////////////////
// ABRIR VENTANAS
function abreWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;

winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable';

	win = window.open(mypage, myname, winprops);
	
	if (parseInt(navigator.appVersion) >= 4) { 
		win.window.focus(); 
	}

}
///////////////////////////////////////////////////////


///////////////////////////////////////////////////////
// menu y tablas expandible // expandible

var version = navigator.appVersion;

function display(currProcedure) {
//alert('CurrProcedure: '+currProcedure);
	if (document.getElementById(currProcedure)){ // agregado para que se ejecute solo siexiste el elemento
		//alert(document.getElementById(currProcedure).style.display);
		if (document.getElementById(currProcedure).style.display == "none"){
			document.getElementById(currProcedure).style.display = "";
		} else {
			document.getElementById(currProcedure).style.display = "none";
		}
	} 

	if(currProcedure == "menuPrincipal"){
		display("iframeMenuPrincipal");
	}
	
}
//////////////////////////////////////////////////////

///////////////////////////////////////////////////////
// menu principal expandible // expandible

var version = navigator.appVersion;

function displayMenu(currProcedure, totalItems, titulo) {
		
		if(currProcedure == "open"){
			document.getElementById("menuPrincipal").style.display = "";
			document.getElementById("iframeMenuPrincipal").style.display = "";
		} else if(currProcedure == "close"){
			document.getElementById("menuPrincipal").style.display = "none";
			document.getElementById("iframeMenuPrincipal").style.display = "none";
		} else {
		// menu general (tabla id=menu)
		if (document.getElementById("menuPrincipal").style.display == "none"){
			document.getElementById("menuPrincipal").style.display = "";
			document.getElementById("iframeMenuPrincipal").style.display = "";
		}
		if(document.getElementById("menuTituloActual").innerHTML = titulo);
		// pongo en invisible todas
		for (i=1; i<=totalItems; i++){
			if (document.getElementById("menu"+i)){ // agregado para que se ejecute solo siexiste el elemento
					document.getElementById("menu"+i).style.display = "none";
			}			
		}
		display(currProcedure);
		}
		
}
//////////////////////////////////////////////////////

function fondoDegradado(color1, color2)	{
	elemento = document.body;
	altura = elemento.clientHeight;
	var fondo = "URL(system/php/funciones/fondoDegradado.php?altura=";
	fondo += altura + "&color1=" + color1 + "&color2=" + color2 + ")";
	elemento.style.backgroundImage = fondo;
	elemento.style.backgroundPosition = "top";
	elemento.style.backgroundRepeat = "repeat-x";
	
}

function verifEntreY(input_entre,input_y,desc){
	
	entre=parseFloat(input_entre);
	y=parseFloat(input_y);
	
	if(!isNaN(entre)&&!isNaN(y)){
	
		if(entre > y){
			return "El valor \"Entre\" debe ser menor que el valor \"y\" en el Item "+ desc;		}	
	} 
	
	return "";
	/*else if(isNaN(entre)){
			return "El valor debe ser numérico en el Item "+desc + ", campo Entre";	
	}else{
			return "El valor debe ser numérico en el Item "+desc + ", campo y";	
	}*/	
}



function contar_palabras(elemento){
		
		cant_p = $(elemento).value;
				
		if(cant_p!=""){		
			cant_p=cant_p.split(" ");
			cant=cant_p.length;
			
			for(i=0;i<=cant_p.length;i++){
				if(cant_p[i]==" "){
					cant--;
				}	
			}
		} else{
			cant=0;
		}
		
		$("palabras_"+elemento).value=cant;
}
	
function changeStyle(elemento, class1, class2){
	
		if(document.getElementById(elemento).className == class1)
			document.getElementById(elemento).className = class2;
		else
			document.getElementById(elemento).className = class1;
	
}

//////////////////////////////////////////////////////
function calendario(destino, ano, mes, dia,prp_id){
	
	
	if(destino == 'citasListado'){
		
		parent.window.location.replace(parent.paginaCitasActual+"&ano="+ano+"&dia="+dia+"&mes="+mes+"&prp_id="+prp_id);
	
	} else if(destino == 'medios') {
	
		var nameTabla = parent.$('tempMedios').value;
		var namePosition = parent.$('tempPosition').value;
		var namePosition2 = parent.$('tempPosition_'+namePosition).value;
		
		
		var tabla = parent.$(nameTabla);
		var idFila = nameTabla+"_"+ano+mes+dia+"_"+namePosition+"_"+namePosition2;
		
		if(parent.$$("tr#"+idFila+"") == "") { // si nunca se creo
		
			var row = tabla.insertRow(-1);
			row.className = "tableClara";
			row.id = idFila;
			var cell;
			var numero = tabla.rows.length-1;
			
		
			cell = row.insertCell(-1);
			cell.innerHTML = "<div align='center'>"+dia+"-"+mes+"-"+ano+"</div>";
	
			cell = row.insertCell(-1);
			cell.innerHTML = "<div align='center'><a href='javascript:;' onclick=\"quitar_item_cal('"+idFila+"','"+namePosition+"','"+dia+"-"+mes+"-"+ano+"','"+namePosition2+"')\" title='Quitar'><img src='../interfaz/inmohost/images/botones/miniN10.png' width='10'height='10' border='0' /></a></div>";

			parent.$('fechasSeleccionadas').value += idFila+"%";
			
	
		} else  { // si ya esta creada la fila
			parent.$(idFila).style.display = "";
		}
		
		fecha_act=parent.$('fecha_'+namePosition+'_'+namePosition2).value;
		cad="x"+dia+"-"+mes+"-"+ano;
		parent.$('fecha_'+namePosition+'_'+namePosition2).value=fecha_act+cad;
		
	} else {
		parent.document.getElementById(destino).value = dia+"-"+mes+"-"+ano;
		parent.document.getElementById(destino+"Dia").value = dia;
		parent.document.getElementById(destino+"Mes").value = mes;
		parent.document.getElementById(destino+"Ano").value = ano;
	}
		
		parent.hideToolTip();

}
//////////////////////////////////////////////////////

//////////////////////////////////////////////////////
function paletaColor(destino, color){
		
		parent.document.getElementById("imagen_"+destino).style.backgroundColor = "#"+color;
		parent.document.getElementById("text_"+destino).innerHTML = "#"+color;
		parent.document.getElementById("inmo_"+destino).value = color;
		
	parent.hideToolTip();
	
}
//////////////////////////////////////////////////////


function cerrarSesion(){

	cambiarInterfaz('none');
	
	dialogos('cerrarSesion','','cerrarSesion','');
	
}

function destruirSesion(){
	
	cambiarInterfaz('none');
	dialogos('destruirSesion','','ingresoASesion','');
	
	$('userLogin').focus();
	
}

function renovarSesion(){

	usuario=$('userLogin').value;
	pass=$('passLogin').value;
	
	
	 var myAjax2 = new Ajax.Request(
								rutaSystema+"php/sec_chequea2.php",
								{method: 'get',
								parameters: 'usuario='+usuario+'&pass='+pass,
								onSuccess: function(transport) { 
														//alert(44);
														var resultado= transport.responseText;
														
														if(resultado==1){
															Dialog.closeInfo();
															cambiarInterfaz('');
														}else{
															parent.destruirSesion();
														}
												} });
	
}

function chequearSesion(){
	
	var myAjax3 = new Ajax.Request(
					rutaSystema+"php/sec_head.php",
					{method: 'get',
					parameters: 'isAjax=1',
					onSuccess: function(transport) { 
											//alert(44);
											var resultado= transport.responseText;
											
											if(resultado==0){
												destruirSesion();
											}
									} 
					});
}

function cambiarInterfaz(cambio){

	$('menuPrincipalSuperior').style.display = cambio;
	$('toolTipBox').style.display = cambio;
	$('menuBarra').style.display = cambio;
	$('iframeMenuPrincipal').style.display = cambio;
	$('menuPrincipal').style.display = cambio;
}

function quitar_item_cal(idFila,namePosition,fec,namePosition2){
	
	document.getElementById(idFila).style.display ="none";
//	alert('fecha_'+namePosition+'_'+namePosition2);
	fecha_act=$('fecha_'+namePosition+'_'+namePosition2).value;
//	alert(fecha_act);
	arr_fecha=fecha_act.split("x"+fec);
	//alert(arr_fecha[0]);
	cad_final=arr_fecha[0]+arr_fecha[1];
	$('fecha_'+namePosition+'_'+namePosition2).value=cad_final;
//	alert($('fecha_'+namePosition+'_'+namePosition2).value)
	
}


function mostrar_cal(e,fileCalendario,pos,med_id,prp_id,check,pos2,acc_internet){
			
		if(!$(check).checked){
			changeStyle("publi_"+pos+"", "tableClara", "botonForm");
			$(check).checked = true;
		}
   		position(e);
   		toolTip(fileCalendario+'&destino=medios&acc_internet='+acc_internet,this);
   		document.getElementById('tempPosition').value=pos;
   		document.getElementById('tempPosition_'+pos).value=pos2;
   		document.getElementById('tempMedios').value='alta_'+med_id+'_'+prp_id;

}

function cambiar_estado_nov(estado,nov_id,emp_id){ 	
	
	var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					asynchronous: false,
					parameters: "isAjax=1&estado="+estado+"&nov_id="+nov_id+"&op=2"+"&emp_id="+emp_id,
					onSuccess: function(transport) { 
											
										var resultado= transport.responseText;
										
										if(resultado!=1){
											alert("No cambio el Estado");
										}
								} 
					});
		
}

function cambiar_cartel(prp_id,mostrar){ 	
	
	var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					asynchronous: false,
					parameters: "isAjax=1&mostrar="+mostrar+"&op=13"+"&prp_id="+prp_id,
					onSuccess: function(transport) { 
											
										var resultado= transport.responseText;
										
										if(resultado!=1){
											alert("No cambio el Estado del Cartel");
										}
								} 
					});
		
}

function marcar_leidas(emp_id){
	var cad_val;	
	var vec_val;
	for(var j=1;j<=10;j++){
		if($('nov_'+j)){
			if($('nov_'+j).checked){
				cad_val=$('nov_'+j).value
				vec_val=cad_val.split(";");
				cambiar_estado_nov('0',vec_val[0],vec_val[1]);				
				
			}
		}
	}
	
}

function eliminar_cita(cita_id){ 	
		if (confirm("Esta seguro que desea eliminar la Cita?"))
		{
		var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					asynchronous: false,
					parameters: "isAjax=1&cita_id="+cita_id+"&op=3",
					onSuccess: function(transport) { 
										
										var resultado= transport.responseText;
										var result=split(",",resultado);
										
										if(result[0]==0){
											alert("ERROR al Eliminar Cita: "+result[1]);
										}
										else
										{
											alert(result[1]);
										}
								} 
					});
		}
		
		
	
}
function eliminar_nota(nota_id){ 	
		if (confirm("Esta seguro que desea eliminar el Telefono?"))
		{
		var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					asynchronous: false,
					parameters: "isAjax=1&nota_id="+nota_id+"&op=4",
					onSuccess: function(transport) { 
										var resultado= transport.responseText;
										var result=split(",",resultado);
										if(result[0]==0){
											alert("ERROR al Eliminar Nota: "+result[1]);
										}
										else
										{
											alert(result[1]);
										}
								} 
					});
		}
}

function eliminar_tas(tas_id,emp_id){ 	

		if (confirm("Esta seguro que desea eliminar la Tasacion?"))
		{
			var myAjax4 = new Ajax.Request(
						rutaSystema+"php/funciones/scripts_ajax.php",
						{method: 'get',
						asynchronous: false,
						parameters: "isAjax=1&tas_id="+tas_id+"&op=5",
						onSuccess: function(transport) { 
											var resultado= transport.responseText;
											//alert (resultado);
											var result=split(",",resultado);
											if(result[0]==0){
												alert("ERROR al Eliminar Tasacion: "+result[1]);
											}
											else
											{
												alert("La Tasacion ha sido Eliminada.".result[1]);
											}
									} 
						});
			
		}
}

function eliminar_demanda(dem_id){ 	
		if (confirm("Esta seguro que desea eliminar la Demanda?"))
		{
		var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					asynchronous: false,
					parameters: "isAjax=1&dem_id="+dem_id+"&op=6",
					onSuccess: function(transport) { 
										var resultado= transport.responseText;
										var result=split(",",resultado);
										if(result[0]==0){
											alert("ERROR al Eliminar Demanda: "+result[1]);
										}
										else
										{
											alert(result[1]);
										}
								} 
					});
		}
}

function buscar_telefono(fileHead,fileListado){ 	
	
		text=document.getElementById('text_buscar');
		parent.ventana('generico_listado','&nombre='+text.value+'&mod_edit=mod_edit&fileXMLHead='+fileHead+'&fileXMLListado='+fileListado,'system/generico_listados.php','Buscar Telefonos')
		
}

function ver_citas(emp_id, fileHead, fileListado, diaDesde, mesDesde, anoDesde)
{
	parent.ventana('generico_listado','&fileXMLHead='+fileHead+'&emp_id='+emp_id+'&desdeCitas=00-00-0000&desdeCitasDia='+diaDesde+'&desdeCitasMes='+mesDesde+'&desdeCitasAno='+anoDesde+'&hastaCitas=00-00-0000&hastaCitasDia=00&hastaCitasMes=00&hastaCitasAno=0000&prp_id=&ver_canceladas=0&mod_edit=mod_edit'+'&fileXMLListado='+fileListado,'system/generico_listados.php','Ver Citas')
}

/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) 
{
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		var dir_mal=0;
		if (str.indexOf(at)==-1){
		   dir_mal=1;
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   dir_mal=1;
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		   dir_mal=1;
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		   dir_mal=1;
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		   dir_mal=1;
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		   dir_mal=1;
		 }
		
		 if (str.indexOf(" ")!=-1){
		   dir_mal=1;
		 }
		if (dir_mal==1)
		{
			return false;
		}
		else
		{
			return true;
		}
}


function eliminar_medio(rec_id){ 	
		if (confirm("Esta seguro que desea eliminar el Medio?"))
		{
			var myAjax4 = new Ajax.Request(
						rutaSystema+"php/funciones/scripts_ajax.php",
						{method: 'get',
						parameters: "isAjax=1&rec_id="+rec_id+"&op=7",
						onSuccess: function(transport) { 
											var resultado= transport.responseText;
											var result=split(",",resultado);
											if(result[0]==0){
												alert("ERROR al Eliminar Medio: "+result[1]);
											}
											else
											{
												alert(result[1]);
											}
									} 
						});
		}
}


function eliminar_usuario(emp_id){ 	
		if (confirm("Esta seguro que desea eliminar el usuario seleccionado?"))
		{
			
			var myAjax4 = new Ajax.Request(
						rutaSystema+"php/funciones/scripts_ajax.php",
						{method: 'get',
						parameters: "isAjax=1&emp_id="+emp_id+"&op=8",
						onSuccess: function(transport) { 
											
											var resultado= transport.responseText;
											var res=resultado.split(",");
																										
											if(res[0]==0){
												alert("ERROR al Eliminar Usuario: "+res[1]);
											}/*else{
												alert(res[1]);
											}*/
									} 
						});
		}
}


function eliminar_rubro(rub_id){ 	
		if (confirm("Esta seguro que desea eliminar el rubro seleccionado?"))
		{
			var myAjax4 = new Ajax.Request(
						rutaSystema+"php/funciones/scripts_ajax.php",
						{method: 'get',
						parameters: "isAjax=1&rub_id="+rub_id+"&op=9",
						onSuccess: function(transport) { 
																			
											var resultado= transport.responseText;
											var res=resultado.split(",");
																						
											if(res[0]==0){
												alert("ERROR al Eliminar Rubro: "+res[1]);
											}/*else{
												alert(res[1]);
											}*/
									} 
						});
		}
}


function eliminar_bar_priv(bar_id){ 	
		if (confirm("Esta seguro que desea eliminar el Barrio Privado seleccionado?"))
		{
			var myAjax4 = new Ajax.Request(
						rutaSystema+"php/funciones/scripts_ajax.php",
						{method: 'get',
						parameters: "isAjax=1&bar_id="+bar_id+"&op=10",
						onSuccess: function(transport) { 
												//alert(transport.responseText)							
											var resultado= transport.responseText;
											var res=resultado.split(",");
																						
											if(res[0]==0){
												alert("ERROR al Eliminar Barrio Privado: "+res[1]);
											}/*else{
												alert(res[1]);
											}*/
									} 
						});
		}
}

function eliminar_sector(sec_id){ 	
	if (confirm("Esta seguro que desea eliminar el sector seleccionado?"))
	{
		var myAjax4 = new Ajax.Request(
		rutaSystema+"php/funciones/scripts_ajax.php",
		{method: 'get',
		parameters: "isAjax=1&sec_id="+sec_id+"&op=11",
		onSuccess: function(transport) { 
						var resultado= transport.responseText;
						var res=resultado.split(",");
																	
						if(res[0]==0){
							alert("ERROR al Eliminar sector: "+res[1]);
						}/*else{
							alert(res[1]);
						}*/
					} 
		});
	}
}


function hay_conexion(){ 	
		
			var myAjax4 = new Ajax.Request(
				rutaSystema+"php/funciones/scripts_ajax.php",
				{method: 'get',
				parameters: "isAjax=1&op=1",
				onSuccess: function(transport) { 
									var resultado= transport.responseText;
									return resultado;
									
							} 
				});
		
}

function no_existe(item,b,form){
	var i=0;
	
	str="document."+form+"."+b+".options.length";
	for (i=0;i<(eval(str));i++){
			if (eval("document."+form+"."+b+".options["+i+"].text")==item){
						alert('El Item seleccionado ya se encuentra agregado.');
						return false;
			}
	}
	return true;
}

function agregar_item_select(a,b,form){
	var texto="";
	var valor="";
	var str="";
	var str2="";

	str="document."+form+"."+a+".options.length";
	for (i=0;i<(eval(str));i++){
		str2="document."+form+"."+a+".options["+i+"].selected";
		texto=eval("document."+form+"."+a+".options [document."+form+"."+a+".selectedIndex].text");
		valor=eval("document."+form+"."+a+".options [document."+form+"."+a+".selectedIndex].value");
		if (eval(str2) && no_existe(texto,b,form) ){
			var sa ="document."+form+"."+b+".options [document."+form+"."+b+".options.length]=new Option('"+texto+"','"+valor+"');";
			eval(sa);
		}
	}
}

function quitar_item_select(a,form){
	var str="";

	str="document."+form+"."+a+".options [document."+form+"."+a+".selectedIndex] = null";
	eval(str);
}
function guardarDatosInterfaz(color1,color2,usr_login){ 	
	
		var myAjax4 = new Ajax.Request(
					rutaSystema+"php/funciones/scripts_ajax.php",
					{method: 'get',
					parameters: "isAjax=1&op=12"+"&color1="+color1+"&color2="+color2+"&usr_login="+usr_login,
					onSuccess: function(transport) { 
											
										var resultado= transport.responseText;
										
										if(resultado!=1){
											alert("No se guardaron los Datos de Interfaz");
										}
								} 
					});
		
}
