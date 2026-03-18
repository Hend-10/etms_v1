<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Gestion des Capteurs</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4>
                <i class="fa fa-microchip"></i> Liste des Capteurs 
                <a href="<?php echo URLROOT; ?>/capteurs/add" class="btn btn-success btn-sm pull-right" style="margin-right: 20px;">
                    <i class="fa fa-plus"></i> Nouveau Capteur
                </a>
            </h4>
            <hr>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom du Capteur</th>
                <th>Date Création</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['capteurs'] as $capteur) : ?>
              <tr>
                <td><?php echo $capteur->id_cap; ?></td>
                <td><?php echo $capteur->Nom_cap; ?></td>
                <td><?php echo $capteur->daj; ?></td>
                <td>
                  <a href="<?php echo URLROOT; ?>/capteurs/edit/<?php echo $capteur->id_cap; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo URLROOT; ?>/capteurs/delete/<?php echo $capteur->id_cap; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Supprimer ce capteur ?')"><i class="fa fa-trash-o"></i></a>
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