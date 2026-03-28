<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>

<style>
    .dt-buttons {
        margin-bottom: 15px;
        float: left;
    }
    .dt-button {
        background-color: #5cb85c !important; /* Green like Prince Medical Success label */
        color: white !important;
        border: none !important;
        padding: 5px 15px !important;
        border-radius: 4px !important;
        font-size: 13px !important;
    }
    .dt-button:hover {
        background-color: #449d44 !important;
    }
</style>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> <?php echo $data['title']; ?></h3>
    
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel" style="padding: 15px;">
          <h4><i class="fa fa-database"></i> Historique (Intervalles de 30 min)</h4>
          <hr>
          
          <div class="row mb-4" style="margin-bottom: 20px;">
              <div class="col-md-3">
                  <label><b>Du (Start Date):</b></label>
                  <input type="date" id="min-date" class="form-control">
              </div>
              <div class="col-md-3">
                  <label><b>Au (End Date):</b></label>
                  <input type="date" id="max-date" class="form-control">
              </div>
          </div>

          <table id="recordsTable" class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th><i class="fa fa-hashtag"></i> ID</th>
                <th><i class="fa fa-microchip"></i> Capteur</th>
                <th><i class="fa fa-fire"></i> Température</th>
                <th><i class="fa fa-tint"></i> Humidité</th>
                <th><i class="fa fa-calendar"></i> Date & Heure</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['records'] as $record) : ?>
              <tr>
                <td><?php echo $record->id_rec; ?></td>
                <td><?php echo $record->Nom_cap; ?></td>
                <td>
                    <span class="label label-<?php echo ($record->tmp > 30) ? 'danger' : 'success'; ?>">
                        <?php echo $record->tmp; ?> °C
                    </span>
                </td>
                <td><span class="label label-info"><?php echo $record->th; ?> %</span></td>
                <td><?php echo $record->date_rec; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        if ($('#recordsTable').length) {
            // Re-initialize the table with the CSV button
            var table = $('#recordsTable').DataTable({
                "destroy": true,    // This stops the "Cannot reinitialise" error
                "dom": 'Bfrtip',    // This puts the Button (B) on the screen
                "buttons": [
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-download"></i> Télécharger CSV',
                        className: 'dt-button',
                        title: 'Prince_Medical_Records_' + new Date().toISOString().slice(0,10)
                    }
                ],
                "pageLength": 25,
                "order": [[4, "desc"]],
                "language": {
                    "search": "Rechercher:"
                }
            });
            
            // Re-bind the date filter logic to the new table instance
            $('#min-date, #max-date').on('change', function() {
                table.draw();
            });
        }
    });
</script>