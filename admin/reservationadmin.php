<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
$input = "";

if($connect){
  if(isset($_POST['soumis']) && !empty($_POST['numclient']) && !empty($_POST['datearrivee']) && !empty($_POST['datedepart'])){
            $numclient = (int)$_POST['numclient'];
            $datearrivee =$_POST['datearrivee'];
            $datedepart = $_POST['datedepart'];
            //$numchambre=0;
            if(isset($_GET['id'])){
            $numchambre = (int)$_GET['id'];
          }else{
            $numchambre = $_POST['numchambre'];
          }
            var_dump($_POST);echo"<br>";
            var_dump($_GET);
            $sql =  "INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) 
            VALUES ('$numclient','$numchambre','$datearrivee','$datedepart')";
            $res = mysqli_query($connect,$sql);
        if($res){
            header("location: selectresa.php");
        }else{
            echo"echec d'insertion";
        }   
    } 


}
require_once('../partials/header.php');
?>

<form class="m-5" method="POST">

<div class="row offset-4 col-8">
  <div class="form-group  col-6">
    <label for="">Numero client</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp"  required name="numclient">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <?php if(!isset($_GET['id'])){?>
  <div class="form-group  col-6">
    <label for="">Numero de chambre</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="numchambre"  required >
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <?php } ?>
  </div>
  <div class="row offset-2">
  <div class="form-group  col-4">
    <label for="exampleInputPassword1">Date d'arrivee</label>
    <input type="date" class="form-control"  placeholder=""required name="datearrivee">
  </div>
  <div class="form-group  col-4 offset-2">
    <label for="exampleInputPassword1">Date de depart</label>
    <input type="date" class="form-control" placeholder="" required name="datedepart">
  </div>
  </div>
  <button type="submit" class="btn btn-primary" name="soumis">Créé réservation</button>
</form>





  <?php require_once('../partials/footer.php');?>