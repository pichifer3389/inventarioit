<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_agencia=$_GET['id'];
  
            $res=mysqli_query($conn,"SELECT * FROM agencias WHERE SECUENCIAL='$secuencial_agencia' ");
            $row=mysqli_fetch_array($res);
            $estado=$row['SECUENCIALESTADO'];
 
            if( $estado==4) {
			
                     $sql="UPDATE inventario_it.agencias SET SECUENCIALESTADO='5' where SECUENCIAL='$secuencial_agencia'";   
                  
		} else{
                    
                  $sql="UPDATE inventario_it.agencias SET SECUENCIALESTADO='4' where SECUENCIAL='$secuencial_agencia'";
                }
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Estado de la agencia actualizado correctamente!');"
                    . "location.href = 'agencias.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


