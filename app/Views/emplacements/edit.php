<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Modifier l'Emplacement</h3>
    
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-edit"></i> ID Emplacement: <?php echo $data['id_emp']; ?></h4>
          
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/emplacements/edit/<?php echo $data['id_emp']; ?>" method="post">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom du Lieu</label>
              <div class="col-sm-10">
                <input type="text" name="nom_emp" class="form-control" value="<?php echo $data['nom_emp']; ?>" required>
              </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Mettre à jour</button>
                    <a href="<?php echo URLROOT; ?>/emplacements/index" class="btn btn-theme04">Annuler</a>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require APPROOT . '/layout/footer.php'; ?>