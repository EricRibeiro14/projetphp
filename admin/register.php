<?php require_once('../connexion.php'); 
require_once("authentification/securite.php");
$mdp="";
if($_SESSION['user']['role'] == 1){
if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pwd'])&& !empty($_POST['pwd2'])){
    $login = trim(htmlspecialchars(addslashes($_POST['login'])));
    $pass = md5(trim(htmlspecialchars(addslashes($_POST['pwd']))));
    $pass2 = md5(trim(htmlspecialchars(addslashes($_POST['pwd2']))));
    $role = (int)trim(htmlspecialchars(addslashes($_POST['role'])));
    
    if($connect){
        if($pass == $pass2){
            $sql = "INSERT INTO utilisateurs (login,pass,role) VALUES ('$login','$pass','$role')";
            $res = mysqli_query($connect,$sql);
            if($res){
                header("location:index.php");
            }else{
                echo"echec d'inscription";
            }
        }else{
        $mdp = '<div class="alert alert-danger text-center"><strong>les mots de passe ne corespondent pas</strong></div>';
            }
        }
    }
?>

<?php require_once('../partials/header.php'); ?>
<div class=" offset-4 col-4">
<div class="card m-3">
  <div class="card-header text-center">Page d'inscription</div>
  <div class="card-body">
    <form action="" method="POST">
    <p class="text-center">
        <img style='width:200px; height:200px' src="../image/profil.png" alt="">
    </p>
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" placeholder="Entrez votre login" id="login" name="login">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <input type="password" class="form-control" placeholder="Entrez votre mot de passe" id="pwd" name="pwd">
    </div>
    <div class="form-group">
        <label for="pwd2">Verifier mot de passe:</label>
        <input type="password" class="form-control" placeholder="Verifiez votre mot de passe:"  id="pwd2" name="pwd2">
    </div>
    <div class="form-group">
        <label for="role">Choisir utilisateur:</label>
        <select class="form-control" id="role" name="role">
            <option hidden>Choix</option>
            <option value="2">utilisateur</option>
            <option value="1">Administrateur</option>
            <option value="3">employés</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn btn-success btn-block" name="soumis">Inscription</button>
    <?=$mdp?>
    </form>
    </div>
    </div>

</div>
<?php require_once('../partials/footer.php'); 

}else{
    #header('location:index.php');
}


?>