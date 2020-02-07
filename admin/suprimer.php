<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    if(isset($_GET['numchambre'])){
        $id = (int)htmlentities(trim($_GET['numchambre']));
        $req = "SELECT image FROM chambre WHERE numchambre = ".$id;
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_assoc($result);
        $sql ="DELETE FROM chambre WHERE numchambre = ".$id;
        $res = mysqli_query($connect,$sql);
        if($res){
            unlink("../image/".$data['image']);
            header("location:select.php");
        }else{
            echo"echec de supresion";
        }
    }
}


?>