<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
    if(isset($_GET['id'])){
        $idp = (int)$_GET['id'];
        if($connect){
         $sql = "SELECT * FROM chambre WHERE numchambre =".$idp;

         $res = mysqli_query($connect,$sql);
         if($res){
             $donnees = mysqli_fetch_assoc($res);
         }
        }
    }
?>


<?php require_once('../partials/header.php');?>
<h2 class='text-center'>Detail Chambre n° <?= $donnees['numchambre'];?></h2>
<div class="row">
    <div class="col-4">
        <img class="col rounded-circle" src="../image/<?=$donnees['image']?>" alt="">
    </div>
    
    <div class="col-5 ">   
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Numero de chambre</b> : <?=$donnees['numchambre'] ?></li>
        <li class="list-group-item"><b>Confort</b> : <?=$donnees['confort'] ?></li>
        <li class="list-group-item"><b>Prix</b> : <?=$donnees['prix']  ?> &euro;</li>
        <li class="list-group-item"><b>Nombre de personnes</b> : <?=$donnees['nbpers'] ?></li>
        <li class="list-group-item"><b>Description</b> : <?=$donnees['description'] ?></li>
        <div class="row offset-4">
        <li class="list-group-item "><a class="btn btn-secondary" href="accueil.php">Retour</a></li>
        <li class="list-group-item " ><a class="btn btn-success" href="reservation.php?id='<?=$donnees['numchambre'];?>''">Reserver</a></li>
        </div>
    </ul>
    
    </div>
</div>

<?php require_once('../partials/footer.php');?>