<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>

<section id="main-content">
  <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i> Tableau de bord</h3>
    <div class="row mt">
      <div class="col-lg-12">
        
        <div class="content-panel">
          <h4><i class="fa fa-check-circle"></i> État du Système</h4>
          <p>Base de données : <b><?php echo $data['db_status']; ?></b></p>
        </div>

      </div>
    </div>
  </section>
</section>
<?php require_once APPROOT . '/layout/footer.php'; ?>