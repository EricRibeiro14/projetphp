<?php 
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    $sql = "SELECT * FROM chambre";
    $res = mysqli_query($connect, $sql);

    if(isset($_GET['id'])){
        $id = (int)trim(htmlspecialchars($_GET['id']));
        $sql1 = "SELECT * FROM chambre WHERE numchambre=".$id;
        $res1 = mysqli_query($connect,$sql1);
        if($res1){
            $data = mysqli_fetch_assoc($res1);
            $libelle = "";
        }
        
    }
}

if(isset($_POST['soumis']) && !empty($_POST['numchambre'])&& !empty($_POST['prix']) && !empty($_POST['nbpers'])){
    $numchambre = trim(addslashes(htmlentities($_POST['numchambre'])));
    $prix = (int)$_POST['prix'];
    $nblits = (int)$_POST['nblits'];
    $nbpers = $_POST['nbpers'];
    $confort = trim(addslashes(htmlentities($_POST['confort'])));
    $description  = trim(addslashes(htmlentities($_POST['description'])));
    $image = $_FILES['image']['name'];
  


    
if($image == ""){
    
    $sql2 = "UPDATE chambre 
    SET prix = '$prix', nblits = '$nblits', nbpers = '$nbpers', confort = '$confort' , description = '$description'
    WHERE numchambre='$id'";

}else{
    $sql2 = "UPDATE chambre SET prix = '$prix', nblits = '$nblits', nbpers = '$nbpers',image = '$image', confort = '$confort' , description = '$description'
    WHERE numchambre='$id'";
}
    $res = mysqli_query($connect,$sql2);
    var_dump($res);
   if($res){
       header("location:select.php");
   }else{
       echo"echec de modification";
   }
 
}
  

?>


<?php require_once('../partials/header.php'); ?>

<div class="card offset-3 col-6 mt-3 mb-3">
    <div class="card-header text-center"><h3>Modification des chambres</h3></div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="">Numero de chambre</label>
                    <input type="text" class="form-control" id=""  name="numchambre" value="<?= $data['numchambre'];?>">
                </div>

                <div class="col">
                    <label for="">prix</label>
                    <input type="text" class="form-control"  name="prix" value="<?= $data['prix']; ?>&euro;">
                </div>  
            </div>

            <div class="row">
                <div class="col">
                    <label for="">Nombre de lit</label>
                    <input type="text" class="form-control"  name="nblits" value="<?= $data['nblits'];?>">
                </div>
            
            
                <div class="col">
                    <label for="">Confort</label>
                    <input type="text" class="form-control"  name="confort" value="<?= $data['confort'];?>">
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <label for="">Image</label>
                    <input type="file" class="form-control-file border" name="image">
                    <img src="../image/<?=$data['image'];?>" alt="">
                </div>
                <div class="col">
                    <label for="">Nombre de personne</label>
                    <input type="text" class="form-control"  name="nbpers" value="<?= $data['nbpers'];?>">
                </div>
                </div>
            <div class="row">
                <div class=" col">
                    <label for="">Description</label>
                    <textarea class='form-control' id="" cols="30" rows="5" name="description"><?= $data['description'];?></textarea>
                </div>
            </div>
                <button type="submit" class="btn btn-primary btn-block" name='soumis' >Soumettre</button>
            
            </form>

        </div>
    </div>
</div>





<?php require_once('../partials/footer.php') ?>