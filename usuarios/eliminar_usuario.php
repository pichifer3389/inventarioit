<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_usuario=$_GET['id'];
  
            $res=mysqli_query($conn,"SELECT * FROM usuario WHERE SECUENCIAL='$secuencial_usuario' ");
            $row=mysqli_fetch_array($res);
            $estado=$row['CODIGOESTADO'];
 
            if( $estado==4) {
			
                     $sql="UPDATE inventario_it.usuario SET CODIGOESTADO='5' where SECUENCIAL='$secuencial_usuario'"; 
                     
                  
		} else{
                    
                  $sql="UPDATE inventario_it.usuario SET CODIGOESTADO='4' where SECUENCIAL='$secuencial_usuario'";
                }
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Estado del usuario actualizado correctamente!');"
                    . "location.href = 'mantenimiento.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


