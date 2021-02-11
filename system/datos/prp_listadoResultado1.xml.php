<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	if(!isset($page)) $page = 0;
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "
<inmodb>
		<paginacion>
			<offest>10</offest>
			<totalDatos>65</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>
	<propiedades>
		<columna>
			<prp_id>1</prp_id>
			<prp_dom><![CDATA[domicilio ()]]></prp_dom>
			<prp_tip><![CDATA[barrio]]></prp_tip>
			<prp_con>19</prp_con>
			<prp_llav>21</prp_llav>
			<prp_pes>50000</prp_pes>
			<prp_dol>4365</prp_dol>
			<prp_inmo>19</prp_inmo>
			<prp_citas>1</prp_citas>
			<prp_ficha>1</prp_ficha>
		</columna>
		<columna>
			<prp_id>2</prp_id>
			<prp_dom><![CDATA[domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio ]]></prp_dom>
			<prp_tip><![CDATA[barrio]]></prp_tip>
			<prp_con>19</prp_con>
			<prp_llav>21</prp_llav>
			<prp_pes>50000</prp_pes>
			<prp_dol>4365</prp_dol>
			<prp_inmo>19</prp_inmo>
			<prp_citas>1</prp_citas>
			<prp_ficha>1</prp_ficha>
		</columna>
		<columna>
			<prp_id>2</prp_id>
			<prp_dom><![CDATA[domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio ]]></prp_dom>
			<prp_tip><![CDATA[barrio]]></prp_tip>
			<prp_con>19</prp_con>
			<prp_llav>21</prp_llav>
			<prp_pes>50000</prp_pes>
			<prp_dol>4365</prp_dol>
			<prp_inmo>19</prp_inmo>
			<prp_citas>0</prp_citas>
			<prp_ficha>0</prp_ficha>
		</columna>
		<columna>
			<prp_id>2</prp_id>
			<prp_dom><![CDATA[domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio ]]></prp_dom>
			<prp_tip><![CDATA[barrio]]></prp_tip>
			<prp_con>19</prp_con>
			<prp_llav>21</prp_llav>
			<prp_pes>50000</prp_pes>
			<prp_dol>4365</prp_dol>
			<prp_inmo>19</prp_inmo>
			<prp_citas>0</prp_citas>
			<prp_ficha>0</prp_ficha>
		</columna>
		<columna>
			<prp_id>2</prp_id>
			<prp_dom><![CDATA[domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio domicilio ]]></prp_dom>
			<prp_tip><![CDATA[barrio]]></prp_tip>
			<prp_con>19</prp_con>
			<prp_llav>21</prp_llav>
			<prp_pes>50000</prp_pes>
			<prp_dol>4365</prp_dol>
			<prp_inmo>19</prp_inmo>
			<prp_citas>0</prp_citas>
			<prp_ficha>1</prp_ficha>
		</columna>
	</propiedades>
</inmodb>";

?>