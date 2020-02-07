<?php 
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    $sql = "SELECT * FROM chambre";
    $res = mysqli_query($connect, $sql);
}
if(isset($_POST['soumis']) && !empty($_POST['numchambre'])&& !empty($_POST['prix']) && !empty($_POST['nbpers'])){
  $numchambre = trim(addslashes(htmlentities($_POST['numchambre'])));
    $prix = trim(addslashes(htmlentities($_POST['prix'])));
    $nbpers = trim(addslashes(htmlentities($_POST['nbpers'])));
    $nblits = trim(addslashes(htmlentities($_POST['nblits'])));
    $confort = trim(addslashes(htmlentities($_POST['confort'])));
    $description  = trim(addslashes(htmlentities($_POST['description'])));
    $image = $_FILES['image']['name'];

    $destination = '../image/';
    move_uploaded_file($_FILES['image']['tmp_name'],$destination.$_FILES['image']['name']);
    if($connect){

    
    $sql2 = "INSERT INTO chambre(numchambre, Prix,nblits,nbpers ,confort,image,description) VALUES('$numchambre','$prix','$nblits','$nbpers','$confort','$image','$description')";
    $res = mysqli_query($connect,$sql2);
   if($res){
       header("location: select.php");
   }else{
       echo"echec d'insertion";
   }
}
}else{
    echo "echec ...";
}
?>


<?php require_once('../partials/header.php'); var_dump($_POST); ?>

<div class="card col-4 offset-4">
    <div class="card-header text-center"><strong>Ajouter une chambre</strong></div>
    <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
    <label for="">Numero de chambre</label>
      <input type="number" class="form-control" id=""  name="numchambre">
    </div>
    <div class="col">
    <label for="">Prix</label>
      <input type="number" class="form-control"  name="prix">
    </div>
  </div>
  <div class="row">
    <div class="col">
        <label for="">Nombre de lit</label>
      <input type="number" class="form-control"  name="nblits">
    </div>
    <div class="col">
        <label for="">Confort</label>
      <input type="text" class="form-control"  name="confort">
    </div>
    </div>
    <div class="form-group col">


    
    
    </div>
    </div>
    <div class="row">
    <div class="col">
        <label for="">Image</label>
        <input type="file" class="form-control-file border" name='image'>
    </div>
    <div class="col">
        <label for="">Nombre de personne</label>
        <input type="number" class="form-control-file border" name='nbpers'>
    </div>
    </div>
    <div class=" col">
        <label for="">Description</label>
        <textarea class='form-control' id="" cols="30" rows="5" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name='soumis' >Soumettre</button>
</form>
    
    </div>
</div>





<?php require_once('../partials/footer.php') ?>