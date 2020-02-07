
<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    if(isset($_POST['mcle'])){
        $mcle = trim(htmlspecialchars($_POST['mcle']));
        $sql = "SELECT * FROM chambre WHERE nbpers LIKE '$mcle%'";
    }else{
        $sql = "SELECT * FROM chambre";
    }   
        $res = mysqli_query($connect,$sql);
        require_once('../partials/header.php');
}

?>

<div class="container">
<p class='text-right mt-2'>
            <a href="ajouter.php" class="btn btn-warning"><i class='fa fa-plus'></i>Ajouter</a>
        </p>
       
        <div class='input-group justify-content-end '>
            <input  type="search" class="form-control col-4 text-center" name="mcle" id='mcle' placeholder="Rechercher" value="">
            <button type="button">
                <i class="fa fa-search" ></i>
            </button>
        </div>
        
    <table class='table table-striped'> 
        
        <thead >
            <tr >
                <th>Numero de chambre</th>
                <th>Prix</th>
                <th>nombre de personnes</th>
                <th>Photo</th>
                <th class="text-center " colspan = 3>Action</th>
                
            </tr>
        </thead>
        <tbody >
        <?php  if($res){
                    while($rows = mysqli_fetch_assoc($res)){
                         $sql = "SELECT * FROM chambre ";
                    
                
                         
            
        ?>
        <tr class="">
            <td class="align-middle"><?= $rows['numchambre'] ?></td>
            <td class="align-middle"><?= $rows['prix'] ?>&euro;</td>
            <td class="align-middle"><?= $rows['nbpers'] ?></td>
            <td class="align-middle"><img src="../image/<?= $rows['image'];?>" style='width:250px; height:200px' alt=""></td>
            <td class="align-middle"><a href="detail.php?id=<?= $rows['numchambre'] ?>" class="btn btn-primary" ><i class="fas fa-info "> Detail </a></td>
            <?php if(isset($_SESSION['user']['role'])){
                if($_SESSION['user']['role'] == 1){?>
                    <td class="align-middle"><a href="editer.php?id=<?= $rows['numchambre'] ?>" class="btn btn-success"><i class="fas fa-pen"> Editer </a><td>
                    <td class="align-middle"><a onclick="return confirm('Etes vous sur de vouloir suprimer')" href="suprimer.php?numchambre=<?=$rows['numchambre']?>" class="btn btn-danger"><i class="fas fa-trash"> Suprimer </a></td>                  
               <?php }}?>
            </tr>
            <?php }} ?>
        </tbody>
         
        
    </table>
</div>
<?php
require_once('../partials/footer.php')
?>