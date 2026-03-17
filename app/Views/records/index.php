<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> <?php echo $data['title']; ?></h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-database"></i> Table: Enregistrements Capteurs</h4>
            <hr>
            <thead>
              <tr>
                <th><i class="fa fa-hashtag"></i> ID Rec</th>
                <th><i class="fa fa-microchip"></i> ID Capteur</th>
                <th><i class="fa fa-fire"></i> Température</th>
                <th><i class="fa fa-tint"></i> Humidité</th>
                <th><i class="fa fa-calendar"></i> Date & Heure</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['records'] as $record) : ?>
              <tr>
                <td><?php echo $record->id_rec; ?></td>
                <td><?php echo $record->id_cap; ?></td>
                
                <td>
                    <?php if($record->tmp > 30) : ?>
                        <span class="label label-danger">
                            <i class="fa fa-warning"></i> <?php echo $record->tmp; ?> °C
                        </span>
                    <?php else : ?>
                        <span class="label label-success">
                            <?php echo $record->tmp; ?> °C
                        </span>
                    <?php endif; ?>
                </td>

                <td>
                    <span class="label label-info">
                        <?php echo $record->hum; ?> %
                    </span>
                </td>
                
                <td><?php echo $record->date_rec; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div></div></div></section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>