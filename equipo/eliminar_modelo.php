<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_modelo=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario_it.modelo WHERE SECUENCIAL = '$secuencial_modelo';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Modelo eliminado correctamente');"
                    . "location.href = 'modelos.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


