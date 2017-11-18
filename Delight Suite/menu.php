<?php
include "conect.php";
if (!isset($_SESSION)){
    session_start();
    $_SESSION["URL"] = "http://localhost:8082/Delight%20Suite/";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Deligth</title>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_SESSION["URL"];?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_SESSION["URL"];?>css/estilos.css">
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color: black">
    <a class="navbar-brand" style="font-size: 40px; font-family: Monotype Corsiva" href="#">
      <img src="<?php echo $_SESSION["URL"];?>images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
      Deligth Suite 
    </a>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-size: 18px; font-family: Georgia; color: #FFFFFF;">
      <ul class="navbar-nav mr-auto ml-auto text-center" style="">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio <i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Servicios
          </a>
          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink" style="background-color: black;">
            <a class="dropdown-item" href="#" style="color: gray">Catalogo de Habitaciones</a>
            <a class="dropdown-item" href="#" style="color: gray">Catalogo de Productos</a>
            <a class="dropdown-item" href="#" style="color: gray">Otros Servicios</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Quienes Somos <i class="fa fa-users" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo $_SESSION["URL"];?>form_reserva.php" class="nav-link">Reservas <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto <i class="fa fa-paper-plane" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
      <div>
        <a href="" class="btn btn-secondary">Admin <i class="fa fa-user-secret" aria-hidden="true"></i></a>
      </div>
      <!--<button class="btn btn-primary" style="font-family: Verdana; font-weight: bold;">Administrar</button>-->
    </div>
  </nav>
  <div class="form-group message">
      <div class='alert<?php
      if(!isset($_REQUEST['success'])) {
          echo "alertaVisible";
      }else{
          if($_REQUEST['success']=="done"){
              echo " alert-success";
          }else{
              echo " alert-danger";
          }
      }?>'>
              <?php if(isset($_REQUEST['success']))
              {
                  if (($_REQUEST['success'])=="done"){
                      echo "<b>Success: </b>".$_REQUEST['message'];
                  }
                  if (($_REQUEST['success'])=="false"){
                      echo "<b>Error: </b>".$_REQUEST['message']."";
                  }
              } ?>
  </div>
  </div>