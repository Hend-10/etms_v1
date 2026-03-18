<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-bell"></i> Historique des Alertes</h3>
    
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-exclamation-triangle" style="color: #ed5565;"></i> Alertes Détectées</h4>
            <hr>
            <thead>
              <tr>
                <th><i class="fa fa-calendar"></i> Date & Heure</th>
                <th><i class="fa fa-hdd-o"></i> Capteur</th>
                <th><i class="fa fa-map-marker"></i> Emplacement</th>
                <th><i class="fa fa-thermometer-half"></i> Temp.</th>
                <th><i class="fa fa-tint"></i> Hum.</th>
                <th><i class="fa fa-info-circle"></i> Détails de l'Alerte</th> <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['alerts'] as $alert) : ?>
              <tr style="background-color: #fff5f5;">
                <td><?php echo $alert->date_rec; ?></td>
                <td><strong><?php echo $alert->Nom_cap; ?></strong></td>
                <td><span class="label label-theme"><?php echo $alert->nom_emp; ?></span></td>
                <td><b style="color: #ed5565;"><?php echo $alert->tmp; ?>°C</b></td>
                <td><b style="color: #48cfad;"><?php echo $alert->th; ?>%</b></td>
                
                <td>
                  <span class="label label-warning" style="font-size: 11px;">
                    <i class="fa fa-warning"></i> <?php echo $alert->statut; ?>
                  </span>
                </td>

                <td>
                  <a href="<?php echo URLROOT; ?>/alertes/delete/<?php echo $alert->id_alert; ?>" 
                     class="btn btn-danger btn-xs" 
                     onclick="return confirm('Supprimer cette alerte de l\'historique ?')">
                     <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          
          <?php if(empty($data['alerts'])) : ?>
            <div class="alert alert-success" style="margin: 20px;">
                <b>Bravo!</b> Aucune alerte n'est actuellement enregistrée dans le système.
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require APPROOT . '/layout/footer.php'; ?>