  <?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12 main-chart">
        <h3><i class="fa fa-dashboard"></i> <?php echo $data['title']; ?></h3>
        <hr>
        
        <div class="row mt">
          <div class="col-md-4 col-sm-4 mb">
            <div class="grey-panel pn donut-chart">
              <div class="grey-header">
                <h5>ÉTAT DU SYSTÈME</h5>
              </div>
              <div class="canvas-container" style="padding: 20px;">
                <i class="fa fa-check-circle fa-4x" style="color: #4ecdc4;"></i>
                <h4>Base de données : Connecté</h4>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
              <div class="darkblue-header">
                <h5>UTILISATEURS</h5>
              </div>
              <canvas id="serverstatus02" height="120" width="120"></canvas>
              <p>Session active pour : <?php echo $_SESSION['user_prenom']; ?></p>
              <footer>
                <div class="pull-left">
                  <h5><i class="fa fa-user"></i> Role: <?php echo ($_SESSION['user_id_groupe'] == 1) ? 'Admin' : 'Technicien'; ?></h5>
                </div>
              </footer>
            </div>
          </div>
        </div></div></div></section>
</section>
<?php require_once APPROOT . '/layout/footer.php'; ?>