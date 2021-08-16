<?php session_start();

 // it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
	  header("Location: logout.php");
	  exit;
 }
 
 require'dbconfig.php';
 $error = false;
 
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-entrar']) ) {
  
  // prevent sql injections/ clear user invalid inputs
  $usuario_u = trim($_POST['usuario']);
  $usuario_u = strip_tags($usuario_u);
  $usuario_u = htmlspecialchars($usuario_u);
  
  $pass_u = trim($_POST['password']);
  $pass_u = strip_tags($pass_u);
  $pass_u = htmlspecialchars($pass_u);
  // prevent sql injections / clear user invalid inputs
  
	   $password_u = hash('sha256', $pass_u); // password hashing using SHA256
	  
	   $res=mysqli_query($conn,"SELECT USUARIO, PASSWORD, CODIGOESTADO FROM inventario_it.usuario WHERE USUARIO='$usuario_u'");
	   $row=mysqli_fetch_array($res);
	   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['PASSWORD']==$password_u && $row['CODIGOESTADO']=='4' ) {
		$_SESSION['user'] = $row['USUARIO'];
                $_SESSION['nombre']=$row['USUARIO'];
                $_SESSION["loggedin"] = true;
		header("Location: index.php");
                
               
            	
   } else {
		$errMSG = "Datos incorrectos, intente de nuevo...";
   }
    
  }
  
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventario</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  
  
  
  
  
  <div class="login_page">
  <div class="login_content">
  <div class="panel-heading border login_heading ">Inventario IT</div>
  <?php if(isset($errMSG)) { ?>
			        <div role="alert" class="alert  alert-danger  text-center">
						<?php 
							
							if(isset($errMSG)) { echo $errMSG; } 
						?>
					</div>
			<?php } ?>
 <form role="form" class="form-horizontal" method="post">
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="text" placeholder="Usuario" name="usuario" id="inputtext" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="password" placeholder="Password" name="password" id="inputPassword3" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <div class=" col-sm-10">
          <div class="checkbox checkbox_margin">
            <label class="lable_margin">
              <input type="checkbox"><p class="pull-left"> Recordar</p></label>
              <a href="index.php">
              <button class="btn btn-warning pull-right" type="submit" name="btn-entrar">Entrar</button>
              </a></div>
        </div>
      </div>
      
    </form>
 </div>
  </div>
  
  
  
  
  
  
  
  



<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
</body>
</html>
