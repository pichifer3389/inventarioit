<?php
	
	require ('../dbconfig.php');
	
	$id_departamento = $_POST['SECUENCIAL'];
	
	$queryM = "SELECT SECUENCIAL, NOMBRE FROM inventario_it.puesto WHERE CODIGODEPARTAMENTOS = '$id_departamento' ORDER BY NOMBRE";
	$resultadoM = $conn->query($queryM);
	
	$html= "<option value='0'>Seleccionar Departamento</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['SECUENCIAL']."'>".$rowM['NOMBRE']."</option>";
	}
	
	echo $html;
		