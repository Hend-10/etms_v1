<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter un Emplacement</h3>
    
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-map-marker"></i> Nouveau Lieu</h4>
          
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/emplacements/add" method="post">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom de l'Emplacement</label>
              <div class="col-sm-10">
                <input type="text" name="nom_emp" class="form-control" placeholder="Ex: Salle Serveur, Bureau 101..." required>
              </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Enregistrer</button>
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