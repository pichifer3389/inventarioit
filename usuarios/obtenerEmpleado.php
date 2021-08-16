<?php
	
	require ('../dbconfig.php');
	
	$id_oficina = $_POST['SECUENCIAL'];
	
	$queryM = "SELECT SECUENCIAL, NOMBRE FROM inventario_it.empleado WHERE CODIGOESTADO=4 AND CODIGOOFICINA='$id_oficina' ORDER BY NOMBRE";
	$resultadoM = $conn->query($queryM);
	
	$html= "<option value='0'>Seleccionar Empleado</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['SECUENCIAL']."'>".$rowM['NOMBRE']."</option>";
	}
	
	echo $html;