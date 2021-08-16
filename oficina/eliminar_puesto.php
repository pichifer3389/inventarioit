<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_puesto=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario_it.puesto WHERE SECUENCIAL = '$secuencial_puesto';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Puesto eliminado correctamente');"
                    . "location.href = 'puestos.php';</script>";
} else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script languaje='javascript'>alert('El puesto no se puede eliminar porque tiene vinculos con otros registros!');"
                    . "location.href = 'puestos.php';</script>";
}
mysqli_close($conn);


