<?php include('includes/head.inc.php'); ?>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="includes/login.inc.php" method="post">
        <h2 class="form-login-heading">Identifiez vous</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Nom d'utilisateur" autofocus name="username">
          <br>
          <input type="password" class="form-control" placeholder="Mot de passe" name="pwd">
          <br>
          <input class="btn btn-theme btn-block"  type="submit" name="connexion"><i class="fa fa-lock"></i> 
          
          <hr>
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Se souvenir de moi
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Mot de passe oublié?</a>
            </span>
            </label>
         
         

        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Mot de passe oublié ?</h4>
              </div>
              <div class="modal-body">
                <p>Entrez votre adresse e-mail ci-dessous pour réinitialiser votre mot de passe.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Annuler</button>
                <button class="btn btn-theme" type="button">Envoyer</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
