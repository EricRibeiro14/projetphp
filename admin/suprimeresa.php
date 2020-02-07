<?php
require_once('../config.php');
require_once(ROOT.'authentification/securite.php');
require_once('../connexion.php');
if($connect){
    if(isset($_GET['id'])){
        $id = (int)htmlentities(trim($_GET['id']));
        $sql ="DELETE FROM reservations WHERE numchambre = ".$id;
        $res = mysqli_query($connect,$sql);
        if($res){
            header("location:selectresa.php");
        }else{
            echo"echec de supresion";
        }
    }
}


?>