// JavaScript Document
 var myObjBox="";
 var mouseX=0;
 var mouseY=0;
 
function toolTip(file,me) {
	 	//alert(mouseY);
		myObjBox=me;
		//document.getElementById('toolTipBox').innerHTML="";
		//traeURL(file, "toolTipBox", "");
		//alert(fileGenericoHtml+"?file="+file)
		iframeToolTip.location.replace(fileGenericoHtml+"?file="+file);

		//window.onscroll=updatePos;
		updatePos();
 }
function position(event){
	mouseX = event.clientX;
	mouseY = event.clientY;
}

function hideToolTip() {
       parent.iframeToolTip.location.replace("about:blank");
	   parent.document.getElementById('toolTipBox').style.display="none";
}
function updatePos(){
		
		var posX = (mouseX-2+document.body.scrollLeft)/2;
		var posY = (mouseY-2+document.body.scrollTop)/2;
		
		document.getElementById('toolTipBox').style.left = posX+"px";		
		document.getElementById('toolTipBox').style.top  = posY+"px";

		document.getElementById('toolTipBox').style.display="block";
		
}