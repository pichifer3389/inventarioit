<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_estado=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario_it.estado WHERE SECUENCIAL = '$secuencial_estado';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Estado eliminado correctamente');"
                    . "location.href = 'estado.php';</script>";
} else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script languaje='javascript'>alert('Este estado posee vinculos con otros registros!');"
                    . "location.href = 'estado.php';</script>";
}
mysqli_close($conn);


