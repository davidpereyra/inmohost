<?php 
header("Content-type: application/xml");
	
	include("../php/config.php");		
	if(!isset($graf)){
		$graf="torta";
	}
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "<!DOCTYPE root SYSTEM 'extra/graficos/$graf/config.dtd'>";
if($graf=='torta'){

echo "<root>
	<config>
		<textProps>			
			<fontFace>Arial</fontFace>
			<fontSize>12</fontSize>
			<fontColor>000000</fontColor>
			<format>1</format>
			<labelPre></labelPre>
			<labelPost></labelPost>
			<thousandSep>.</thousandSep>
		</textProps>
		<pieProps>		
			<style>1</style>
			<outerSize>200</outerSize>
			<innerSize>100</innerSize>
			<innerColor>ffffff</innerColor>
			<speed>0</speed>
		</pieProps>		
		<products>
			<product>
				<name>Casas</name>
				<value>1910</value>
				<color>6699CC</color>
				<url></url>
				<target></target>
			</product>
			<product>
				<name>Departamentos</name>
				<value>1596</value>
				<color>FF9900</color>
				<url></url>
				<target></target>
			</product>
			<product>
				<name>Oficinas</name>
				<value>1153</value>
				<color>00CC99</color>
				<url></url>
				<target></target>
			</product>
		</products>			
	</config>
</root>";
} else if($graf=='lineal'){
echo "
<root>
	<config>
		<xLabel>
			<fontSize>12</fontSize>
			<fontColor>DBAC91</fontColor>
		</xLabel>
		<yLabel>			
			<fontFace>Trebuchet MS</fontFace>
			<fontSize>12</fontSize>
			<fontColor>333333</fontColor>
			<fontDecoration>0</fontDecoration>
			<labelPre></labelPre>
			<labelPost></labelPost>
			<thousandSep>.</thousandSep>
		</yLabel>
		<graphProps>
			<xPos>70</xPos>
			<yPos>70</yPos>
			<rowsNumber>12</rowsNumber>
			<colsNumber>12</colsNumber>
			<hSpace>35</hSpace>
			<vSpace>20</vSpace>
			<chartScale>250</chartScale>
			<chartStart>0</chartStart>
			<gridColor>709FCF</gridColor>
			<bgColor>4B87C2</bgColor>
			<borderColor>3871A9</borderColor>
			<speed>15</speed>
		</graphProps>		

		<products>
			<product>
				<name>Casas</name>
				<values>2510,1530,777,940,1350,2200,2340,2400,1500,1000,2010,1100</values>				
				<size>16</size>
				<color>999999</color>
				<textColor>000000</textColor>
			</product>
			<product>
				<name>Departamentos</name>
				<values>1000,1200,1709,1020,757,1200,2098,1223,1500,1500,1000,1800</values>				
				<size>12</size>
				<color>FF6600</color>
				<textColor>000000</textColor>
			</product>
			<product>
				<name>Oficinas</name>
				<values>100,120,179,109,257,208,298,223,150,150,180,180</values>				
				<size>12</size>
				<color>006699</color>
				<textColor>000000</textColor>
			</product>

		</products>
		<xLabels>Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Deciembre</xLabels>
	</config>
</root>";

}
?>
