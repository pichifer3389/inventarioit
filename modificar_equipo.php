<?php session_start();
date_default_timezone_set('America/Tegucigalpa');

 require_once 'dbconfig.php';
$error=false;
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-actualizar'])) {
    $id_equipo_a=$_POST['id'];
     $descripcion=trim($_POST['descripcion']);
    $marca=trim($_POST['marca']); 
    $modelo=trim($_POST['modelo']);
    $numero_inventario=trim($_POST['numero_inventario']); 
    $asignado=$_POST['asignado']; 
    $ip=$_POST['ip'];
    $agencia=$_POST['agencia']; 
    
    
            $sql="UPDATE inventario_it.marca SET descripcion='$descripcion',marca='$marca',modelo='$modelo',numero_inventario='$numero_inventario',nombre='$asignado',ip='$ip',agencia='$agencia' where id_equipo='$id_equipo_a'";
                if (mysqli_query($conn, $sql)) {
                
                //$error=true;
                //$confirmar_ingreso="El registro se guardo correctamente";
                header('location:administracion.php');
                        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   mysqli_close($conn);
    
            
                }   

    
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventario IT</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/icheck.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
<link href="plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="plugins/dropzone/dropzone.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block"><span class="theme_color">Inventario</span> IT</div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>
    <!--\\\\\\\ brand end \\\\\\-->
    <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
      <div class="top_left">
        <div class="top_left_menu">
            <ul>
          
            </ul>
        </div>
      </div>
      <!--\<a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Task</span> </a>\-->
      <div class="top_right_bar">
        <div class="top_right">
          <div class="top_right_menu">
            <ul>
              
              
             
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><span class="user_adminname"><?php echo $_SESSION['nombre']; ?></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="profile.html"><i class="fa fa-user"></i> Perfil</a> </li>
            <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuración</a></li>
            <li> <a href="login.php"><i class="fa fa-power-off"></i> Salir</a> </li>
          </ul>
        </div>

        <!--\<a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>\-->
        
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

      <!--\\\\\\\left_nav start \\\\\\-->
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Buscar" />
      </div>
      <div class="left_nav_slidebar">
        <ul>
          
          <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-edit"></i> Equipo <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul class="opened" style="display:block">
             <li> <a href="administracion.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="theme_color">Administración</b> </a> </li>
             
            </ul>
          </li>
          
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i>Usuarios <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
              <li> <a href="administrar_usuarios.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Mantenimiento</b> </a> </li>
              
            </ul>
          </li>
          
          
          
          
        </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Vision Fund HN</h1>
          
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
              <li><a href="administracion.php">Inicio</a></li>
            <li><a href="#">Equipo</a></li>
            <li class="active">Administración</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
    
        
        <div class="row">
        <div class="col-md-12">
               
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Modificación de equipos</h3>
            </div>
         <div class="porlets-content">
             
            
             
          <div class="adv-table editable-table ">
             
                          <div class="clearfix">
                              <form role="form" method="post" class="row"> 
                                           
                                              <?php 
                                $id_equipo_m = $_GET['id'];

 

                                        $sql = "SELECT * FROM inventario.equipo where id_equipo='$id_equipo_m'";
                                        $query = $conn->query($sql);

                             while($row = $query->fetch_assoc()){?>
                                
                                                 
                                                
                                                                                                  
                                                    <?php $id_equipo_m= $row['id_equipo'];?>
                                                    <?php $descripcion_m= $row['descripcion']; ?>
                                                    <?php $marca_m= $row['marca']; ?>
                                                    <?php $modelo_m= $row['modelo']; ?>
                                                    <?php $numero_inventario_m= $row['numero_inventario']; ?>
                                                    <?php $nombre_m= $row['nombre'] ?>
                                                    <?php $ip_m= $row['ip'] ?>
                                                    <?php $agencia_m= $row['agencia']; ?>
                                                    
                                                
                                                
                                                    
                                                    <div class="form-group col-md-6"  >
                                                    <label>Id</label>
                                                    <input type="text" name="id"  class="form-control"  value="<?= $id_equipo_m ?>" readonly>
                                                    
                                                  
                                                </div>
                                                 
                                                
                                                
                                                 <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label>Descripción</label>
                                                    <input type="text" name="descripcion"  class="form-control" value="<?= $descripcion_m?>" required>
                                                    
                                                    </div>
                                                       
                                                    <div class="form-group col-md-6"  >
                                                    <label>Marca</label>
                                                    <input type="text" name="marca"  class="form-control" value="<?= $marca_m?>" required>
                                                    
                                                    </div>
                                  
                                                     <div class="form-group col-md-6" style="margin-bottom: 35px" >
                                                    <label>Modelo</label>
                                                    <input type="text" name="modelo"  class="form-control" value="<?= $modelo_m?>" required>
                                                    
                                                    </div>
                                  
                                                 <div class="form-group col-md-6"  >
                                                    <label>No. Inventario</label>
                                                    <input type="text" name="numero_inventario"  class="form-control" value="<?= $numero_inventario_m?>" required>
                                                    
                                                    </div>
                                  
                                                    <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label>Asignado a </label>
                                                    <input type="text" name="asignado"  class="form-control" value="<?= $nombre_m?>" required>
                                                    
                                                    </div>
                                        
                                                  <div class="form-group col-md-6" style="margin-bottom: 35px" >
                                                    <label>IP </label>
                                                    <input type="text" name="ip"  class="form-control" value="<?= $ip_m?>" required>
                                                    
                                                    </div>
                                                 
                                                    <div class="form-group col-md-6"  >
                                                    <label>IP </label>
                                                    <input type="text" name="agencia"  class="form-control" value="<?= $agencia_m?>" required>
                                                    
                                                    </div>                                        
                                                
                                                
                                                 
                                                   
                                                 
                                                
                                                
                                                 
                                                 <div class="col-lg-12 controls" text-align center>
                                      <button id="btn-guardar" class="btn  btn-primary btn-lg " type="submit" name="btn-actualizar">Actualizar <i class="fa fa-refresh"></i></button>
                                      <a id="btn-cancelar" class="btn btn-danger btn-lg " href="administracion.php" name="btn-cancelar">Cancelar <i class="fa fa-times"></i></a>		
										
                                    </div>
                                                        
                                                       <?php }?>
                                                </form> 
                            
                          </div>
                          <div class="margin-top-10"></div>
                        
                      </div>
 
            </div><!--/porlets-content-->  
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
        
        
     
        
 
        
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
   










  

















<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-chart.js"></script>
<script src="js/graph.js"></script>
<script src="js/edit-graph.js"></script>
<script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
<script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

<script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="plugins/sparkline/jquery.customSelect.min.js" ></script> 
<script src="plugins/sparkline/sparkline-chart.js"></script> 
<script src="plugins/sparkline/easy-pie-chart.js"></script>
<script src="plugins/morris/morris.min.js" type="text/javascript"></script> 
<script src="plugins/morris/raphael-min.js" type="text/javascript"></script>  
<script src="plugins/morris/morris-script.js"></script> 





<script src="plugins/demo-slider/demo-slider.js"></script>
<script src="plugins/knob/jquery.knob.min.js"></script> 




<script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/scroll/jquery.nanoscroller.js"></script>

<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/data-tables/jquery.dataTables.js"></script>
<script src="plugins/data-tables/DT_bootstrap.js"></script>
<script src="plugins/data-tables/dynamic_table_init.js"></script>
<script src="plugins/edit-table/edit-table.js"></script>

 
 <script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>

</body>
</html>


