<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-map-marker"></i> Gestion des Emplacements</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4>
                <i class="fa fa-building"></i> Liste des Lieux
                <a href="<?php echo URLROOT; ?>/emplacements/add" class="btn btn-success btn-sm pull-right" style="margin-right: 20px;">
                    <i class="fa fa-plus"></i> Nouveau Lieu
                </a>
            </h4>
            <hr>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom de l'Emplacement</th>
                <th>Date de Création</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['emplacements'] as $emp) : ?>
              <tr>
                <td><?php echo $emp->id_emp; ?></td>
                <td><?php echo $emp->nom_emp; ?></td>
                <td><?php echo $emp->daj; ?></td>
                <td>
                  <a href="<?php echo URLROOT; ?>/emplacements/edit/<?php echo $emp->id_emp; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo URLROOT; ?>/emplacements/delete/<?php echo $emp->id_emp; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Supprimer cet emplacement ?')"><i class="fa fa-trash-o"></i></a>
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