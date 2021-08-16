<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_tipo_equipo=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario_it.tipo_equipo WHERE SECUENCIAL = '$secuencial_tipo_equipo';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Tipo de equipo eliminado correctamente');"
                    . "location.href = 'tipo_equipo.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


