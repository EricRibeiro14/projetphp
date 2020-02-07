
<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    if(isset($_POST['mcle'])){
        $mcle = trim(htmlspecialchars($_POST['mcle']));
        $sql = "SELECT * FROM reservations WHERE numchambre LIKE '$mcle%'";
    }else{
        $sql = "SELECT * FROM reservations";
    }   
        $res = mysqli_query($connect,$sql);
        require_once('../partials/header.php');
}

?>

<div class="container">
<p class='text-right mt-2'>
            <a href="reservationadmin.php" class="btn btn-warning"><i class='fa fa-plus'></i>Ajouter</a>
        </p>
       
        <div class='input-group justify-content-end '>
            <input  type="search" class="form-control col-4 text-center" name="mcle" id='mcle' placeholder="Rechercher" value="">
            <button type="button">
                <i class="fa fa-search" ></i>
            </button>
        </div>
        
    <table class='table table-striped'> 
        
        <thead >
            <tr class="text-center" >
                <th>Numero client</th>
                <th>Numero de chambre</th>
                <th>Date d'arrivee</th>
                <th>Date de depart</th>
                <th colspan = 2>Action</th>
                
            </tr>
        </thead>
        <tbody >
        <?php  if($res){
                    while($rows = mysqli_fetch_assoc($res)){
                         $sql = "SELECT * FROM reservations ";
                    
                
                         
            
        ?>
        <tr>
            <td class="align-middle text-center"><?= $rows['numclient'] ?></td>
            <td class="align-middle text-center"><?= $rows['numchambre'] ?></td>
            <td class="align-middle text-center"><?= $rows['datearivee'] ?></td>
            <td class="align-middle text-center"><?= $rows['datedepart'] ?></td>
            <td class="align-middle text-center"><a href="editeresa.php?id=<?= $rows['numchambre'] ?>" class="btn btn-success"><i class="fas fa-pen"> Editer </a><td>
            <?php if(isset($_SESSION['user']['role'])){
                if($_SESSION['user']['role'] == 1){ ?>              
            <td class="align-middle text-center"><a onclick="return confirm('Etes vous sur de vouloir suprimer')" href="suprimeresa.php?id=<?=$rows['numchambre']?>" class="btn btn-danger"><i class="fas fa-trash"> Suprimer </a></td>
        <?php }}?>
            </tr>
            <?php }} ?>
        </tbody>
         
        
    </table>
</div>
<?php
require_once('../partials/footer.php')
?>