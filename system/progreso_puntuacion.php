<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

include ("php/config.php");
include ("php/sec_head.php");
$otraCSS = "styleInterno.css";
?>
<!DOCTYPE HTML>
<html>
    <head>
         <?php
        include("head.php");
        ?>
        <?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\"" . _FILE_CSS_MENUEXTRA . "\");
</style>\n"; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="../interfaz/inmohost/progress/src/jquery.percentageloader-0.1.js"></script>
        <link rel="stylesheet" href="../interfaz/inmohost/progress/src/jquery.percentageloader-0.1.css"></script>

    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        #topLoader {
            width: 256px;
            height: 256px;
            margin-bottom: 32px;
        }

        #container {
            width: 260px;
            height: 253px;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        #animateButton {
            width: 256px;
        }
    </style>

</head>
<body>
    <table class="tableClara">  
        <tr class="tr1">
          <td><h1>Exposicion de tu inmueble</h1></td>
        </tr>
        <tr><td> </td> </tr>
        <tr> <td>
                <div id="container" >

                    
                    <div id="topLoader">      
                    </div></td>
                </tr>
                <tr class="tr1">  <td><h1>PESO M&Aacute;XIMO: 100</h1></td> </tr>

    </table>

    <script>
              
        $(function() {
            $topLoader = $("#topLoader").percentageLoader({width: 256, height: 256, controllable : false, progress : 0.0, onProgressUpdate : function(val) {
                    $topLoader.setValue(Math.round(val * 100.0));
                        
                }});
            $topLoader.setValue('');
                
            for(i=0;i<parent.window.length;i++){
                if(parent.window[i].name == "prp_modificar_content" || parent.window[i].name == "<?php echo $win_prp ?>_content" ){
                     if(typeof parent.window[i].calcular_porcentaje == 'function' ){
                            var valor = parent.window[i].calcular_porcentaje();                              
                            actualizar_porcentaje(valor);
                            parent.window[i].document.getElementById('prp_visibilidad').value = valor;
                     }
                    
                }
            }
        });  
            
        function actualizar_porcentaje(porcentaje){
                
            var kb = 0;
            var totalKb = 100;
            var progreso = 0;
                    
            var animateFunc = function() {
                kb += 1;
                $topLoader.setProgress(kb / totalKb);
                progreso = (kb / totalKb);
       
              
                if (kb < porcentaje) {
                    setTimeout(animateFunc, 5);
                } else {
                    topLoaderRunning = false;
                        
                }
            }
                
            if(porcentaje==0){
                $topLoader.setProgress(0);
            }else{
                setTimeout(animateFunc, 15);
            }
        }
            
    </script>
</div>
</body>
</html>