<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-link"></i> Affectation des Capteurs</h3>
    
    <div class="row mt">
      <div class="col-md-4">
        <div class="form-panel">
          <h4><i class="fa fa-plus"></i> Nouvelle Affectation</h4>
          <hr>
          <form action="<?php echo URLROOT; ?>/affectations/add" method="POST">
            <div class="form-group">
              <label>Choisir un Capteur</label>
              <select name="id_cap" class="form-control" required>
                <?php foreach($data['capteurs'] as $capteur) : ?>
                  <option value="<?php echo $capteur->id_cap; ?>"><?php echo $capteur->Nom_cap; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Choisir un Emplacement</label>
              <select name="id_emp" class="form-control" required>
                <?php foreach($data['emplacements'] as $emp) : ?>
                  <option value="<?php echo $emp->id_emp; ?>"><?php echo $emp->nom_emp; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-theme btn-block">Affecter</button>
          </form>
        </div>
      </div>

      <div class="col-md-8">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-tasks"></i> Liste des Affectations Actives</h4>
            <hr>
            <thead>
              <tr>
                <th>Capteur</th>
                <th>Emplacement</th>
                <th>Date Affectation</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['affectations'] as $aff) : ?>
              <tr>
                <td><strong><?php echo $aff->Nom_cap; ?></strong></td>
                <td><span class="label label-info"><?php echo $aff->nom_emp; ?></span></td>
                <td><?php echo $aff->daj; ?></td>
                <td>
                  <a href="<?php echo URLROOT; ?>/affectations/delete/<?php echo $aff->id_affec; ?>" 
                     class="btn btn-danger btn-xs" 
                     onclick="return confirm('Retirer cette affectation ?')">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require APPROOT . '/layout/footer.php'; ?>