<?php 
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
$erreur="";
if($connect){
    $sql = "SELECT * FROM reservations";
    $res = mysqli_query($connect, $sql);

    if(isset($_GET['id'])){
        $id = (int)trim(htmlspecialchars($_GET['id']));
        $sql1 = "SELECT * FROM reservations WHERE numchambre=".$id;
        $res1 = mysqli_query($connect,$sql1);
        if($res1){
            $data = mysqli_fetch_assoc($res1);
            $libelle = "";
        }
        
    }
}

if(isset($_POST['soumis']) && !empty($_POST['datedepart'])){
   
    $datedepart = trim(addslashes(htmlentities($_POST['datedepart'])));
        if($data['datedepart'] > $_POST['datedepart']){
            $erreur = "<div class='alert alert-danger col text-center mt-3'><strong>La modification n'est pas correcte</strong></div>";
        
        }else{      
    $sql2 = "UPDATE reservations SET datedepart = '$datedepart'
    WHERE numchambre=".$id;
    $res = mysqli_query($connect,$sql2);

   if($res){
       header("location:selectresa.php");
   }else{
       echo"echec de modification";
   }
} 
}
  

?>


<?php require_once('../partials/header.php'); ?>

<div class="card offset-4 col-4 mt-3 mb-3">
    <div class="card-header text-center"><h3>Modification de reservation</h3></div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="">Numero de chambre</label>
                    <input type="text" class="form-control" id=""  name="numchambre" value="<?= $data['numchambre'];?>" disabled>
                </div>
                <div class="col">
                    <label for="">Numero client</label>
                    <input type="number" class="form-control" id=""  name="numclient" value="<?= $data['numclient'];?>" disabled>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <label for="">Date d'arrivee</label>
                    <input type="date" class="form-control"  name="prix" value="<?= $data['datearivee']; ?>" disabled>
                </div>  
            

            
                <div class="col">
                    <label for="">Date de depart</label>
                    <input type="date" class="form-control"  name="datedepart" value="<?= $data['datedepart'];?>">
                </div>
                
            
                <button type="submit" class="btn btn-primary btn-block mt-4" name='soumis' >Valider</button>
                 <?=$erreur?>
            </form>

        </div>
    </div>
</div>





<?php require_once('../partials/footer.php') ?>