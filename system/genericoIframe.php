<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

?>
<iframe name="iframeDIV" id="iframeDIV" style="width:250px; height:280px; border:#33FF00 dashed 1px; margin:0px; padding:0px;" align="top" frameborder="0" width="250" height="280" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="auto" src="<?php echo $file; ?>">
</iframe>

