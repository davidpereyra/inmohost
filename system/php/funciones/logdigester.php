<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	include("../config.php");
	
//================================================================================================
//================================================================================================
//==================Log Digester 1.1==============================================================
/*
	Released March 23, 2006 by Jake Olefsky
	Copyright by Jake Olefsky
	http://www.jakeo.com/software/logdigester/index.php

	This software is free to use and modify for non-commercial purposes only.  For commercial use
	of this software please contact me.  Please keep this readme intact at the top of this file.
	
	If you improve this script, please email me a copy of the improvement so everyone can benefit. 
	
	REQUIREMENTS:
				PHP 4.3+ compiled with safe mode turned off or with permissions set so this script
				can read the php error log file.
	
	SUMMARY:
				It is highly recommended that you log your errors to a file instead of displaying
				them in the browser.  As this log file grows, it can become difficult to find and 
				react to errors. This script will read and analyze your php error log and spit out a
				more readable version with the worst errors highlighted so you can fix those first.
				
				These are the recommended settings for your php.ini file.
				
				error_reporting  =  E_ALL
				display_errors = Off
				log_errors = On
				ignore_repeated_errors = Off
				ignore_repeated_source = Off
				error_log = /path/to/php_error.log
				
	INSTALL:
				Just drop this file somewhere where you can access it via the web. Then modify 
				the $file variable below to point to your error log. If you run multiple websites
				from the same server, you may want to add some filters so you can quickly narrow
				down the errors by site.  Simple place a unique path identifier in the filter[] array.
				Add more rows to add more filters.
				
				It would be a good idea to put a password on the webpage so only you can see it, 
				especially if you leave the 'allow_show_source' option turned on since this allows you
				to view the source code of any file on your server!  
				
				You may also want to setup a cron job to empty the error log file once a day, just to keep
				things tidy.
				
	UN-INSTALL: 
				Simply remove this script
	
	
	VERSION HISTORY:
	1.0		March 3, 2006
	1.1		March 24, 2006  
		Now you can view the actual source code that caused each error. Nifty.
		Filters to narrow the results. Usefull for debuging a particular site.
*/

//Each element in the filter array will allow you to narrow down the results by whether or not this word
//appears in the file path of the script with the error.
//$filter[0] = "/website3/htdocs";
//$filter[1] = "C:\wamp\www\inmohostV2.0\system\actualizador_pre.php";
//$filter[] = "/website3/htdocs";

//================================================================================================
//================================================================================================
?>
<html>
<head>
<title>PHP Error Log Digested</title>
<style type="text/css">
	.warnings, .latest, .errors, .instructions, .warnings, .notices, .code { border: 1px dashed #333333; background: #EEEEEE; padding: 5px;}
	.instructions p, .latest p, .notices p, .errors p { font-size: 10px; color:#000000; }
	.errors b, .warnings b { font-weight:bold; color: #000000; } 
	code {font-family: Courier,monospace; }
	p { white-space: nowrap }
</style>
<link href="../../../interfaz/inmohost/css/styleInterno.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

	if(!isset($type) || $type == "php") {
		$file = "../../"._FILE_LOG_PHP; //the path to your error log file
	}else {
		$file = "../../"._FILE_LOG_JAVASCRIPT; //the path to your error log file
	}
	$num_latest = 5; //the number of errors to show in the "Last Few Errors" section
	$allow_show_source = 1; //whether to allow the ability to view the source code of your php files

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <input name="php" type="button" class="<?php if(!isset($type) || $type == "php") echo "botonForm"; else echo "inputForm" ?>" id="php" value="Errores PHP" onClick="window.location.href = '<?php echo $_SERVER['PHP_SELF']."?type=php"; ?>';">
       &nbsp;&nbsp;&nbsp;<input name="javascript" type="button" class="<?php if($type == "javascript") echo "botonForm"; else echo "inputForm" ?>" id="javascript" value="Errores JAVASCRIPT" onClick="window.location.href = '<?php echo $_SERVER['PHP_SELF']."?type=javascript"; ?>';">
    </div></td>
  </tr>
</table>

<?php if(empty($_GET['display_error'])) { 
	
	function mysort($a,$b) {
		if($a[0] == $b[0]) {
		   return 0;
		}
		return ($a[0] > $b[0]) ? -1 : 1;
	}
	
	$handle = @fopen($file,"r");
	if($handle) {
	   while(!feof($handle)) {
			$line = fgets($handle, 4096); //get line
			
			if(empty($_GET['f']) || stristr($line,$_GET['f'])) {
				//stores the last few errors reported
				$latest[] = $line;
				if(sizeof($latest)>1+$num_latest) array_shift($latest);
				
				$line = ereg_replace(".* PHP ","",$line); //gets rid of timestamp
				
				//gets line number of error		
				ereg(" on line ([0-9]*)",$line,$linenumber); 
				$linenumber = $linenumber[1];
				if(empty($linenumber)) $linenumber=" ";
				$line = ereg_replace(" on line [0-9]*","",$line);
				
				$hash = md5($line); //make a unique id for this error
				
				//gets filepath
				ereg(" in ([^ ]*)",$line,$filepath); 
				$filepath = trim($filepath[1]);
				if(empty($filepath)) $filepath="";
				$line = ereg_replace(" in [^ ]*","",$line);
				
				//figures out severity of error
				$severity=3; 
				if(strstr($line,"Warning")!==FALSE) $severity=2;
				if(strstr($line,"Notice")!==FALSE) $severity=1;
				$line = ereg_replace("Notice:  ","",$line);
				$line = ereg_replace("Warning:  ","",$line);
				$line = ereg_replace("Error:  ","",$line);
		
				if(!empty($line)) {
					if(empty($res[$severity][$hash])) { //stuff this error into an array or increment counter for existing error
						$res[$severity][$hash][0]=1;
						$res[$severity][$hash][1]=$line;
						if(empty($allow_show_source)) $res[$severity][$hash][2]=$linenumber;
						else $res[$severity][$hash][2]="<a href='logdigester.php?display_error=".urlencode($filepath)."&amp;line=".$linenumber."#jump'>".$linenumber."</a>";
						$res[$severity][$hash][3]=$filepath;
						
					} else {
						$res[$severity][$hash][0]++; //repeat error, so increment the existsing value
						if(strstr($res[$severity][$hash][2],$linenumber)==FALSE) {
							if(empty($allow_show_source)) $res[$severity][$hash][2].=" ".$linenumber;
							else $res[$severity][$hash][2].=" <a href='logdigester.php?display_error=".urlencode($filepath)."&amp;line=".$linenumber."#jump'>".$linenumber."</a>";
						}
					}
				}
			}
		}
		fclose($handle);
		
		asort($res); //sort errors
		
		if(!empty($num_latest)) { 
			echo "<div class='latest'><b>&Uacute;ltimos:</b><br />";
			if(!empty($latest) && is_array($latest)) {
				foreach($latest as $error) {
					echo "<p>".$error."</p>";
				}
			} else {
				echo "no hay errores.<br />";
			}
			echo "</div><br />";
		}
		echo "<div class='errors'><b>Todos:</b><br />";
		if(!empty($res[3]) && is_array($res[3])) {
			usort($res[3],"mysort");
			foreach($res[3] as $error) {
				echo "<p>".$error[0]." ".$error[1]." ".$error[3]." ".$error[2]."</p>";
			}
		} else {
			echo "no hay errores.<br />";
		}
		echo "</div><br />";
		
		echo "<div class='warnings'><b>Advertencias:</b><br />";
		if(!empty($res[2]) && is_array($res[2])) {
			usort($res[2],"mysort");
			foreach($res[2] as $error) {
				echo "<p>".$error[0]." ".$error[1]." ".$error[3]." ".$error[2]."</p>";
			}
		} else {
			echo "no hay advertencias.<br />";
		}
		echo "</div><br />";
		
		echo "<div class='notices'><b>Noticias:</b><br />";
		if(!empty($res[1]) && is_array($res[1])) {
			usort($res[1],"mysort");
			foreach($res[1] as $error) {
				echo "<p>".$error[0]." ".$error[1]." ".$error[3]." ".$error[2]."</p>";
			}
		} else {
			echo "no hay noticias.<br />";
		}
		echo "</div>";
	
	} else {
		echo "Error al leer el archivo.";
	}
	?>
<?php } else if(!empty($allow_show_source)) { ?>
<div class="instructions"> <b><a href="http://www.jakeo.com/software/logdigester/index.php">Log Digester</a> Output</b> from <a href="logdigester.php">
  <?=$file?>
  </a><br />
  Showing errors from:
  <?=$_GET['display_error']?>
</div>
<div class="code">
  <?php
		$output = highlight_file($_GET['display_error'], true);
	
		//Line breaks are a little strange
		// dos = \r\n
		// unix = \n
		// mac = \r
		$output = str_replace("\r<br />","<br />", $output); //dos line breaks
		$output = str_replace("\r","<br />", $output); //mac line breaks
		$lines = explode("<br />",$output);
		
		for($i=0;$i<count($lines);$i++) {
			if($i+1==$_GET['line']) echo "<a name='jump'></a><font color='black'>***</font>&nbsp;";
			else echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			?>
  <font color="black">
  <?=$i+1?>
  </font>&nbsp;&nbsp;&nbsp;
  <?=$lines[$i]?>
  <br />
  <?php
		}
		
	?>
</div>

  <? } ?>
  <br>
  <br>
<div align="center">
  &Uacute;ltimo error detectado:(<?php echo date("d/m/Y H:i:s", filemtime($file)); ?>)
</div>
</body>
</html>
