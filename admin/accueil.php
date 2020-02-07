<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    $sql = "SELECT * FROM chambre";
    $res = mysqli_query($connect, $sql);
}


require_once('../partials/header.php');
?>
<div class="">
<div class="row">
 <?php  if($res){
          while($rows = mysqli_fetch_assoc($res)){
              $sql = "SELECT * FROM chambre ";?>                                                             
              <div class="card col-3 m-5" >
                <div class="card-head mt-3 "  style="background-image:url(../image/<?=$rows['image']?>);background-repeat: no-repeat ; " >
                  <p>
                    <br><br>                    
                    <br><br>
                    <br><br>
                  </p>
                  </div>
                  <div class="card-body">
                      <h4 class="card-title"><strong>chambre n° <?= $rows['numchambre'];?></strong></h4>
                      <p class="card-text">Some example text.</p>
                      
                  </div>
                  <div class="mt-5 ">
                  <p   class="align-middle"><a href="detailchambre.php?id=<?= $rows['numchambre'];?>" class="btn btn-primary col ">info</a></p>
                  </div>
                </div>
                              
<?php }} ?>
</div>
</div>
<?php require_once('../partials/footer.php'); ?>