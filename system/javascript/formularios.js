// JavaScript Document

// Funciones de Validacion
function valida_propiedad(a,form)
{

	if (verif(a,form))
	{
		document.prp_edit_form.edited.value=1;
		chequeaForm('prp_edit_form', 'destino', 'titulo', 'url');
	}
	else
	{
		return 0;
	}
}


function valida_formulario(a,form)
{
	var str="document."+form+".submit()";
	if (verif(a,form))
	{
		eval(str);
	}
	else
	{
		return 0;
	}
}

function verif(a,form)
{
	
	error='';
	formu=a.split(',');
	for (i=1;i<formu.length;i+=3)
	{
		switch (formu[i])
		{
			case '1' :
				error += no_vacio(formu[i-1],formu[i+1],form);
				break;
			case '2' :
				error += selec(formu[i-1],formu[i+1],form);
				break;
			case '3' :	
				error += mail(formu[i-1],formu[i+1],form);
				break;
			case '4' :	
				error += check(formu[i-1],formu[i+1],form);
				break;
			case '5' :	
				error += numer(formu[i-1],formu[i+1],form);
				break;		
			case '6' :	
				error += selecmul(formu[i-1],formu[i+1],form);
				break;
			case '7' :	
				error += selecdin(formu[i-1],formu[i+1],form);
				break;
	
		}
	}
	if (error!='')
	{
		if(parent.Dialog){
			parent.Dialog.alert(error, {windowParameters: {className:'alert', width:400, height:200}});		
		}else{
			parent.parent.Dialog.alert(error, {windowParameters: {className:'alert', width:400, height:200}});
		}
		
		error='';
		return 0;
	}
	else
	{
		return 1;
	}
}

function no_vacio(a,b,form)
{
	cad ='document.'+form+'.'+a+'.value';
	lon =cad+'.length';
	if ((eval(lon))<1)
	{
		document.getElementById(a+'_div').className='destacado2';
		str='Ingrese algun valor en el campo ' + b +'<br>';
		return str;
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}	

function selec(a,b,form){
	cad ='document.'+form+'.'+a+'.selectedIndex';
	if ((eval(cad))==0)
	{
		document.getElementById(a+'_div').className='destacado2';
		return 'Debe seleccionar una opcion en el campo ' + b+'<br>';  	
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}

function selecmul(a,b,form){
	var i;
	var existe_seleccion=0;
	
	total=eval('document.'+form+'.'+a+'.options.length');
	
	for (i=0;i<total;i++){

			if (eval("document."+form+"."+a+".options["+i+"].selected")){
				existe_seleccion=1;
			}

	}
	if (!existe_seleccion)
	{
		document.getElementById(a+'_div').className='destacado2';
		return 'Debe seleccionar una opcion en el campo ' + b+'<br>';  	
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}

function selecdin(a,b,form){
	var i;
	var existe_seleccion=0;
	
	total=eval('document.'+form+'.'+a+'.options.length');

	for (i=0;i<total;i++){

			if (eval("document."+form+"."+a+".options["+i+"].text")){
				(eval("document."+form+"."+a+".options["+i+"].selected = 'TRUE'"));
				existe_seleccion=1;
			}

	}
	if (!existe_seleccion)
	{
		document.getElementById(a+'_div').className='destacado2';
		return 'Debe seleccionar una opcion en el campo ' + b+'<br>';  	
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}

function mail(a,b,form)
{
	cad ='document.'+form+'.'+a+'.value'
	existe = cad+'.indexOf(".")'
	if ((eval(existe))==-1)
	{
		document.getElementById(a+'_div').className='destacado2';
		return 'Ingrese un e-Mail valido '+b+'<br>';	
	
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}	

function check(a,b,form)
{
	cad ='document.'+form+'.'+a+'.checked'
	if (!eval(cad))
	{
		document.getElementById(a+'_div').className='destacado2';
		return 'Debe seleccionar una opcion en el campo'+b+'<br>';
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';		
	}
}
function numer(a,b,form){	
	cad ='document.formulario.'+a+'.value'
	if (isNaN(eval(cad)))
	{
		document.getElementById(a+'_div').className='destacado2';
		return ' Debe Ingresar un valor numerico en el campo '+b;
	}
	else
	{
		if (document.getElementById(a+'_div').className=='destacado2')
		{
			document.getElementById(a+'_div').className='';
		}
		return '';
	}
}

function soloNumeros(evt){	
	// Backspace = 8, Enter = 13, '0' = 48, '9' = 57
	var nav4 = window.Event ? true : false;
	var key = nav4 ? evt.which : evt.keyCode;	
	if (key <= 13 || (key >= 48 && key <= 57)) return true;
	else return false;
}

function soloNumerosVar(Var){	
	// Backspace = 8, Enter = 13, '0' = 48, '9' = 57
	if (Number(Var)) return true;
	else return false;
}

function muestraForm(form, destino, titulo, url, parametros){
//form Number=>formulario a chequear
//titulo String=>Titulo ventana de destino
//url String=>archivo de destino
//parametros String=>cadena con todos los valores del formulario

	var totalElementos = document.getElementById(form).elements.length;
	var tipo;
	var elemento;
	var query="";
	var pes_ent;
	var pes_y;
	var dol_ent;
	var dol_y;
for(i=0; i<totalElementos; i++){

	
		elemento = document.getElementById(form).elements[i];
		tipo = elemento.type;
		
		if(tipo=="hidden" || tipo=="text"){
			query += "&"+elemento.name+"="+elemento.value;
		} else if(tipo=="select-one"){
			query += "&"+elemento.name+"="+elemento.options[elemento.selectedIndex].value;
		} else if(tipo=="select-multiple"){
			k=0;
			for(j=0;j<elemento.options.length;j++){
				if(elemento.options[j].selected){
					query += "&"+elemento.name+"["+k+"]"+"="+elemento.options[j].value;
					k++;
				}
			}
			
		} else if(tipo=="checkbox"){
			query += "&"+elemento.name+"="+elemento.checked;
		} else {
			//alert(tipo);
		}
		
		if(elemento.name=="pes_ent"){
			pes_ent=elemento.value;
		}
		
		if(elemento.name=="pes_y"){
			pes_y=elemento.value;
		}
		
		if(elemento.name=="dol_ent"){
			dol_ent=elemento.value;
		}
		
		if(elemento.name=="dol_y"){
			dol_y=elemento.value;
		}
	}
	switch(parametros) 
    {
    	case 'mod_edit':
    			query += "&mod_edit="+parametros;
    			ventana(destino, query, url, titulo);
 				display('menuPrincipal');
		break;

		case 'mod_inf':
				parent.ventana(destino, query, url, titulo);
		break;

		case 'mod_del':
		break;

		case 'mod_search':
			//verifica que los campos "entre" y "y" sean correctos para pesos y dolares
			res_pes=verifEntreY(pes_ent,pes_y,"Precio ($)");
			res_dol=verifEntreY(dol_ent,dol_y,"Precio (U$S)");
			if(res_pes==""&&res_dol==""){

				query += "&mod_edit="+parametros;
				ventana(destino, query, url, titulo);
				if(form!="prpFormBuscarRapido"){
					display('menuPrincipal');
				}	
			}else if(res_pes){
					alert(res_pes);			
			}else
			{
					alert(res_dol);			
			}	
		break;

		// Por defecto el se submitea el formulario para que se recargue en la misma pagina
		case 'ventana':
				ventana(destino, query, url, titulo);
				display('menuPrincipal');
		break;

		default:
			//alert(parametros);
			document.getElementById(form).submit();
		break;

		return false;

    }//switch
}

function chequeaForm(form, destino, titulo, url, parametros){
//form Number=>formulario a chequear
//titulo String=>Titulo ventana de destino
//url String=>archivo de destino
//parametros String=>cadena con todos los valores del formulario

	var totalElementos = document.getElementById(form).elements.length;
	var tipo;
	var elemento;
	var query="";
	var pes_ent;
	var pes_y;
	var dol_ent;
	var dol_y;
	
	for(i=0; i<totalElementos; i++){

	
		elemento = document.getElementById(form).elements[i];
		tipo = elemento.type;
		
		if(tipo=="hidden" || tipo=="text"){
			query += "&"+elemento.name+"="+elemento.value;
		} else if(tipo=="select-one"){
			query += "&"+elemento.name+"="+elemento.options[elemento.selectedIndex].value;
		} else if(tipo=="select-multiple"){
			k=0;
			for(j=0;j<elemento.options.length;j++){
				if(elemento.options[j].selected){
					query += "&"+elemento.name+"["+k+"]"+"="+elemento.options[j].value;
					k++;
				}
			}
			
		} else if(tipo=="checkbox"){
			query += "&"+elemento.name+"="+elemento.checked;
		} else {
			//alert(tipo);
		}
		
		if(elemento.name=="pes_ent"){
			pes_ent=elemento.value;
		}
		
		if(elemento.name=="pes_y"){
			pes_y=elemento.value;
		}
		
		if(elemento.name=="dol_ent"){
			dol_ent=elemento.value;
		}
		
		if(elemento.name=="dol_y"){
			dol_y=elemento.value;
		}
	}
	switch(parametros) 
    {
    	case 'mod_edit':
    			query += "&mod_edit="+parametros;
    			//alert('query: '+query+' **** destino: '+destino+' **** url: '+url+' **** titulo: '+titulo);
    			ventana(destino, query, url, titulo);
				display('menuPrincipal');
		break;
		case 'mod_inf':
				parent.ventana(destino, query, url, titulo);
		break;
		case 'mod_del':
		case 'mod_search':
			//verifica que los campos "entre" y "y" sean correctos para pesos y dolares
			res_pes=verifEntreY(pes_ent,pes_y,"Precio ($)");
			res_dol=verifEntreY(dol_ent,dol_y,"Precio (U$S)");
			if(res_pes==""&&res_dol==""){

				query += "&mod_edit="+parametros;
				ventana(destino, query, url, titulo);
				if(form!="prpFormBuscarRapido"){
					display('menuPrincipal');
				}	
			}else if(res_pes){
					alert(res_pes);			
			}else
			{
					alert(res_dol);			
			}	
		break;
		// Por defecto el se submitea el formulario para que se recargue en la misma pagina
		case 'ventana':
				ventana(destino, query, url, titulo);
				display('menuPrincipal');
		break;
		default:
			//alert(parametros);
			document.getElementById(form).submit();
		break;
		return false;
    }//switch
}

function listar_carteles(destino, titulo, url, parametros){
	
	    		//query += "&mod_edit="+parametros;
    		//	ventana(destino, query, url, titulo);
				//display('menuPrincipal');
}

/*##############################################################################
				EDICCION DE FORMULARIOS
 ##############################################################################*/

function editForm_campo(id){

	var id_objet = id;

		if (document.getElementById("edit_"+id_objet).style.display == "none"){
			document.getElementById("edit_"+id_objet).innerHTML = document.getElementById(id_objet).value;
			document.getElementById("edit_"+id_objet).style.display = "";
			document.getElementById(id_objet).style.display = "none";
		} else {
			document.getElementById("edit_"+id_objet).style.display = "none";
			document.getElementById(id_objet).style.display = "";
			document.getElementById(id_objet).focus();
		}
	
}
