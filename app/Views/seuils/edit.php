<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Modifier les Seuils</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-edit"></i> Capteur: <?php echo $data['Nom_cap']; ?></h4>
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/seuils/edit/<?php echo $data['id_seuil']; ?>" method="post">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Température (°C)</label>
              <div class="col-sm-5">
                <label>Min</label>
                <input type="number" step="0.01" name="min_t" class="form-control" value="<?php echo $data['min_t']; ?>" required>
              </div>
              <div class="col-sm-5">
                <label>Max</label>
                <input type="number" step="0.01" name="max_t" class="form-control" value="<?php echo $data['max_t']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Humidité (%)</label>
              <div class="col-sm-5">
                <label>Min</label>
                <input type="number" step="0.01" name="min_h" class="form-control" value="<?php echo $data['min_h']; ?>" required>
              </div>
              <div class="col-sm-5">
                <label>Max</label>
                <input type="number" step="0.01" name="max_h" class="form-control" value="<?php echo $data['max_h']; ?>" required>
              </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Mettre à jour</button>
                    <a href="<?php echo URLROOT; ?>/seuils/index" class="btn btn-theme04">Annuler</a>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require APPROOT . '/layout/footer.php'; ?>