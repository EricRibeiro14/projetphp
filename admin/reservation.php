

    <?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
$success = "";
$erreur="";
if($connect){
  if(isset($_GET['id'])){
    
      if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['datearrivee'])&& !empty($_POST['datedepart'])){ 
           //reservation
              $datearrivee = $_POST['datearrivee'];
              $datedepart = $_POST['datedepart'];
              if($datearrivee < $datedepart){
            //Client
              $nom = trim(addslashes(htmlentities($_POST['nom'])));
              $prenom = trim(addslashes(htmlentities($_POST['prenom'])));
              $tel = (int)$_POST['telephone'];
              $adresse = trim(addslashes(htmlentities($_POST['adresse'])));
              $numchambre = (int)$_GET['id'];
              $verif_client = "SELECT * FROM client WHERE nom = '$nom' AND prenom = '$prenom' AND tel = '$tel' AND adresse = '$adresse'";
              $result_verif_client = mysqli_query($connect,$verif_client);
              $rows = mysqli_fetch_assoc($result_verif_client);
              $verif_resa = "SELECT * FROM reservations WHERE numchambre = '$numchambre' AND datearivee = '$datearrivee' AND datedepart = '$datedepart'";
              $result_verif_resa = mysqli_query($connect,$verif_resa);
              $rows2 = mysqli_fetch_assoc($result_verif_resa);

              if($rows){
                $numClient = "SELECT numclient FROM client WHERE nom = '$nom' AND prenom = '$prenom' AND tel = '$tel' AND adresse = '$adresse'";
                $result_numClient = mysqli_query($connect,$numClient);
                $rows3 = mysqli_fetch_assoc($result_numClient);
                
                if($rows2){
                  $erreur = '<div class="alert alert-danger text-center  mt-5">Cette chambre n\'est pas disponible a vos dates.</div>';
                }else{
                  $resa = "INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) VALUES (".$rows3['numclient'].",'$numchambre','$datearrivee','$datedepart')";
                  $result_resa = mysqli_query($connect, $resa);
                  if($result_resa){
                    header('location:result_resa.php?numChambre='.$numchambre);
                  }else{
                      $erreur = '<div class="alert alert-danger text-center mt-5">Erreur lors de l\'éxecution de la requête.</div>';
                  }
                }
              }else{
                $client = "INSERT INTO client(nom, prenom, tel, adresse) VALUES ('$nom','$prenom','$tel','$adresse')";
                $result_client = mysqli_query($connect, $client);
                if($rows2){
                  
                  $erreur = '<div class="alert alert-danger text-center  mt-5">Cette chambre n\'est pas disponible a vos dates.</div>';
                }else{
                  $numClient = "SELECT numclient FROM client WHERE nom = '$nom' AND prenom = '$prenom' AND tel = '$tel' AND adresse = '$adresse'";
                  $result_numClient = mysqli_query($connect,$numClient);
                  $rows3 = mysqli_fetch_assoc($result_numClient);
                  $resa = "INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) VALUES (".$rows3['numclient'].",'$numchambre','$datearrivee','$datedepart')";
                  $result_resa = mysqli_query($connect, $resa);
                  if($result_client && $result_resa){
                     $success = '<div class="alert alert-success">felicitation votre reservation a été prise en compte </div> ';
                  }else{
                      $erreur = '<div class="alert alert-danger text-center col-4 offset-4 mt-5">Erreur lors de l\'éxecution de la requête.test</div>';
                  }
                }
              }

      }else{
        $erreur = "<div class='alert alert-danger text-center'><strong> les dates ne sont pas correct</strong> </div>";
      }
    }else{
      $erreur = "Merci de compléter tous les champs.";
    }
  }
}
require_once('../partials/header.php');
?>

<div class="container col-5 bg-warning rounded">

<form class="pt-3 pb-3 mt-5 mb-5  " method="POST">
<h3 class="text-center">Créé votre reservation :</h3>
<div class="row mt-3 ">
  <div class="form-group  col-6">
    <label  for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="nom">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="prenom">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  </div>
  <div class="row ">
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Telephone</label>
    <input type="number" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="telephone">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Adresse</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="adresse">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  </div>
  <div class="row ">
  <div class="form-group  col-6">
    <label for="exampleInputPassword1">Date d'arrivee</label>
    <input type="date" class="form-control"  placeholder="" name="datearrivee">
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputPassword1">Date de depart</label>
    <input type="date" class="form-control" placeholder="" name="datedepart">
  </div>
  </div>
  <p class="text-center mt-4">
  <button type="submit" class="btn btn-primary" name="soumis">Réserver</button>
    <?=$success?>
    <?=$erreur?>
    </p>
    
</form>
</div>




  <?php require_once('../partials/footer.php');?>



  