<?php
header("content-type: application/x-javascript");
	
	include ("../php/config.php");
	
	echo "
	function ampliarNews(idNews){
	
		parent.WinNews.setSize(450, 300);
		parent.WinNews.setLocation(75, parent.pageSize.windowWidth - 480);
		parent.WinNews.toFront();
		document.getElementById(\"rssFullNews\").style.display = \"\";
		document.getElementById(\"rssFullNewsTable\").style.width = \"435px\";
		
		traeURL(\""._FILE_XSL_GENERICO."?xml="._FILE_XML_RSS_FULL."&xsl="._FILE_XSL_RSS_FULL."&id=\"+idNews, \"rssFullNews\");
	
	}
	function cerrarNews(){
	
		parent.WinNews.setSize(210, 300);
		parent.WinNews.setLocation(75, parent.pageSize.windowWidth - 240);
		
		document.getElementById(\"rssFullNews\").style.display = \"none\";
		document.getElementById(\"rssFullNewsTable\").style.width = \"180px\";
		
	}";
	
?>