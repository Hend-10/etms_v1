<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Gestion des Seuils d'Alerte</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4>
                <i class="fa fa-warning"></i> Configuration des Limites
                <a href="<?php echo URLROOT; ?>/seuils/add" class="btn btn-success btn-sm pull-right" style="margin-right: 20px;">
                    <i class="fa fa-plus"></i> Nouveau Seuil
                </a>
            </h4>
            <hr>
            <thead>
              <tr>
                <th>Capteur</th>
                <th>Temp Min/Max</th>
                <th>Humidité Min/Max</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data['seuils'] as $seuil) : ?>
            <tr>
                <td><strong><?php echo $seuil->Nom_cap; ?></strong></td>
                <td>
                    <span class="label label-info" style="font-size: 14px;"><?php echo $seuil->tmp_min; ?>°C</span> -
                    <span class="label label-danger" style="font-size: 14px;"><?php echo $seuil->tmp_max; ?>°C</span>
                </td>
                <td>
                    <span class="label label-default" style="font-size: 14px;"><?php echo $seuil->th_min; ?>%</span> - 
                    <span class="label label-primary" style="font-size: 14px;"><?php echo $seuil->th_max; ?>%</span>
                </td>
                <td>
                <a href="<?php echo URLROOT; ?>/seuils/edit/<?php echo $seuil->id_seuil; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo URLROOT; ?>/seuils/delete/<?php echo $seuil->id_seuil; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Supprimer ce seuil ?')"><i class="fa fa-trash-o"></i></a>
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