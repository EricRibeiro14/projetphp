<?php 
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image : url(../image/fond.png)">
<div >
<img src="../image/hote.png" alt="" style="width:1665px; height:270px">
</div>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black">
<a href="../image/logo.png"><img src="../image/logo.png" alt="" style="width:50px; height:50px"></a>
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php ROOT;?>accueil.php ">Accueil</a>
    </li>
    <?php  if(isset($_SESSION['user']['role'])){
              if($_SESSION['user']['role'] != 2){
        
    ?>
   
    <?php }} ?>
    
        <?php 
        if(isset($_SESSION['user']['role'])){?>
          <li class="nav-item dropdown ml-auto ">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Gestion
        <?php }
        
      ?>
      </a>
      
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 2){?>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php ROOT;?> select.php ">Chambre</a>
        <a class="dropdown-item" href="<?php ROOT;?> selectresa.php">reservation</a>
      <?php } ?>
    <li class="nav-item dropdown ml-auto ">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php 
        if(isset($_SESSION['user']['role'])){
          echo $_SESSION['user']['login'];
        }else{ 
        echo"profile";
      }?>
      </a>
      <div class="dropdown-menu">
      <?php if(!isset($_SESSION['user']['role'])){?>
        <a class="dropdown-item" href="<?php ROOT;?> index.php ">Connexion</a>
      <?php } ?>
        <a class="dropdown-item" href="<?php ROOT;?> authentification/logout.php">Déconnexion</a>
        <?php
        
        if(isset($_SESSION['user']['role'])){
        if($_SESSION['user']['role'] == 1){?>
          <a class="dropdown-item" href="<?php ROOT;?>register.php">Inscription</a>
        <?php
        }}?>
        </div>
    </li>

  </ul>
</nav>