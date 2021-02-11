function DoCallback(data)
{
	// branch for native XMLHttpRequest object
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		req.onreadystatechange = processReqChange;
		req.open('POST', url_login, true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.send(data);
	// branch for IE/Windows ActiveX version
	} else if (window.ActiveXObject) {
		req = new ActiveXObject('Microsoft.XMLHTTP')
		if (req) {
			req.onreadystatechange = processReqChange;
			req.open('POST', url_login, true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send(data);
		}
	}
}

function processReqChange() {
	// only if req shows 'loaded'
	if (req.readyState == 4) {
		// only if 'OK'
		if (req.status == 200) {
			eval(what);
		} else {
			alert('There was a problem retrieving the XML data:\n' +
				req.responseText);
		}
	}
}

var nameID="";
var funcionok="";
var resultado="";
function traeURL(url, name2, funcionFinal, funcionOK)
{
	
	chequearSesion(); // forzamos a chequear la actividad
	
	nameID = name2;
	var url2=url+"&nocache="+new Date().getTime();
	http.open("GET",url,true);
	http.onreadystatechange = handleHttpResponse;
	http.send(null);
	if(funcionOK)
	{
		funcionok=funcionOK;
	}
	if(funcionFinal) eval(funcionFinal);
	
}
function handleHttpResponse() 
{
  if (http.readyState == 4) // completo
  {
  	if (http.status == 200)
  	{
		codigo = http.responseText;
		if (!funcionok)
		{
			if(document.getElementById(nameID)){
				document.getElementById(nameID).innerHTML = codigo;
			}
		}
		else
		{
			resultado=codigo;
			eval(funcionok);
			codigo="";
			funcionok="";
		}
	} 
	else 
	{
		if(document.getElementById(nameID)){
			//document.getElementById(nameID).innerHTML = "error al cargar el archivo AA";
			//handleHttpResponse()
		}
	}

  } 
  /*else if (http.readyState==2) // recibiendo
  {
  	document.getElementById(nameID).innerHTML="";
  	document.getElementById(nameID).innerHTML="<img src='interfaz/inmohost/images/precarga.gif' width='50' height='50' border='0' />";	
  }*/
}
function getHTTPObject() 
{
  var xmlhttp;
  /*@cc_on
  @if (@_jscript_version >= 5)
    try 
    {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } 
    catch (e) 
    {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (E) 
      {
        xmlhttp = false;
      }
    }
  @else
  xmlhttp = false;
  @end @*/
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') 
  {
    try 
    {
      xmlhttp = new XMLHttpRequest();
    }
    catch (e) 
    {
      xmlhttp = false;
    }
  }
  return xmlhttp;
}

function act_select(regs,tabla,filtro_val,select,multiple,url_act,orden)
{
	var myurl=url_act + '/camposSelect.php?regs=';
	myurl+=regs+"&tablas="+tabla+"&filtro="+filtro_val+"&xtras= order by "+orden;
	traeURL(myurl,select,null,"act_div_"+select+"('"+multiple+"')");
}
function act_div_pro_id(multiple)
{
	document.getElementById("div_"+nameID).innerHTML = "<select "+multiple+" name=\"pro_id\" onchange=\"act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_id');\" class=\"inputForm\" tabindex=\"1\">"+resultado+"</select>";
	document.getElementById("div_loc_id").innerHTML = "<select "+multiple+" name=\"loc_id\" onchange=\"\" class=\"inputForm\" tabindex=\"1\"><option value=\"0\">Indistinto</option></select>";
}
function act_div_loc_id(multiple)
{
	document.getElementById("div_"+nameID).innerHTML = "<select name=\"loc_id\" "+multiple+" onchange=\"\" class=\"inputForm\" tabindex=\"1\">"+resultado+"</select>";
}

var http = getHTTPObject(); 
