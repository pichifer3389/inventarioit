<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_empleado=$_GET['id'];
  
            $res=mysqli_query($conn,"SELECT * FROM empleado WHERE SECUENCIAL='$secuencial_empleado' ");
            $row=mysqli_fetch_array($res);
            $estado=$row['CODIGOESTADO'];
 
            if( $estado==4) {
			
                     //$sql="UPDATE inventario_it.empleado SET CODIGOESTADO='5' where SECUENCIAL='$secuencial_empleado'"; 
                     $sql="UPDATE inventario_it.usuario SET CODIGOESTADO='5' where CODIGOEMPLEADO='$secuencial_empleado'";
                  
		} else{
                    
                  $sql="UPDATE inventario_it.empleado SET CODIGOESTADO='4' where SECUENCIAL='$secuencial_empleado'";
                }
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Estado del empleado actualizado correctamente!');"
                    . "location.href = 'empleados.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


