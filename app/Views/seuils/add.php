<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Configurer un Nouveau Seuil</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-sliders"></i> Limites de Sécurité</h4>
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/seuils/add" method="post">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Capteur</label>
              <div class="col-sm-10">
                <select name="id_cap" class="form-control" required>
                  <option value="">-- Choisir un capteur --</option>
                  <?php foreach($data['capteurs'] as $capteur) : ?>
                    <option value="<?php echo $capteur->id_cap; ?>"><?php echo $capteur->Nom_cap; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Température (°C)</label>
              <div class="col-sm-5">
                <input type="number" step="0.01" name="min_t" class="form-control" placeholder="Minimum" required>
              </div>
              <div class="col-sm-5">
                <input type="number" step="0.01" name="max_t" class="form-control" placeholder="Maximum" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Humidité (%)</label>
              <div class="col-sm-5">
                <input type="number" step="0.01" name="min_h" class="form-control" placeholder="Minimum" required>
              </div>
              <div class="col-sm-5">
                <input type="number" step="0.01" name="max_h" class="form-control" placeholder="Maximum" required>
              </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Enregistrer</button>
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