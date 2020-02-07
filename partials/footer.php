<footer class="text-white">
<nav class="navbar-expand-sm bg-danger  navbar-dark ">
<div class="row offset-2">

  <div  class="col-3">
  <h3>Menu rapide</h3>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php ROOT;?>accueil.php ">Acceuil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php ROOT;?>mentionlegale.php ">Mention legales</a>
    </li>
    
  </ul>

    </div>
    <div class="col-3 mt-4">
        <form action="">
            <input type="text" name="newsletters" placeholder="inscrivez-vous aux newsleters">
            <button type="submit">Envoyer</button>
        </form>
    </div>
    <div class="col-2 mt-4 ">
        <p>copyright &copy; 2020</p>
    </div>
</nav>
</footer>
<script>
        $(document).ready(function(){
            $('[type = "search"]').focus(function(){
              $(this).attr('class','form-control col-12 text-center');
            });
            $('button').click(function(){
        let search = $('#mcle').val();
          console.log(search);
      });
      }); 
      
     
        </script>
</body>
</html>