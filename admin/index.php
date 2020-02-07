<?php 
$erreur = "";
if(isset($_POST['soumis'])){
    if(!empty($_POST['login']) && !empty($_POST['pwd'])){
        $login = trim(htmlspecialchars(addslashes($_POST['login'])));
        $pass = md5(trim(htmlspecialchars(addslashes($_POST['pwd']))));
        require_once('../connexion.php');
        if($connect){
            $sql = "SELECT * FROM utilisateurs WHERE login = '$login' AND pass = '$pass'";
            $res = mysqli_query($connect,$sql);

            if($res){
                if(mysqli_num_rows($res) != 0){
                    $data = mysqli_fetch_assoc($res);
                    session_start();
                   /* $_SESSION['user']['login'] = $login;
                    $_SESSION['user']['pass'] = $pass;
                    $_SESSION['user']['roles'] = 2;*/
                    $_SESSION['user'] = $data;
                    header('location:select.php');
                }else{
                $erreur = '<div class="alert alert-danger text-center"><strong>le login ou le mot de passe ne corespond pas</strong></div>';
                }
            }
        }
    }else{
        $erreur = '<div class="alert alert-danger text-center"><strong>tout les champs ne sont pas rempli</strong></div>';
    }
}
?>
<?php require_once('../partials/header.php'); ?>
<div class=" offset-4 col-4">
<div class="card m-5">
    
    <div class="card-body">
    <p class="text-center">
        <img style='width:200px; height:200px' src="../image/profil.png" alt="">
    </p>
    <form action="" method="post">
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" placeholder="Entrer votre login" id="login" name="login">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" id="pwd" name="pwd">
    </div>
    
    <button type="submit" name="soumis" class="btn btn btn-success btn-block">Soumettre</button>
    </form><br>
       
    </div>
    <?=$erreur; ?>
    </div>
    
</div>

<?php  require_once('../partials/footer.php'); ?>