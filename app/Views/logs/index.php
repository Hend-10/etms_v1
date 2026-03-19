<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<section id="main-content">
  <section class="wrapper">
    
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-history"></i> Journal d'audit</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="<?php echo URLROOT; ?>/home">Accueil</a></li>
          <li class="active">Journal d'activités</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="content-panel" style="padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 1px rgba(0,0,0,0.05);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
             <h4><i class="fa fa-angle-right"></i> Historique des actions (Qui a fait quoi quand)</h4>
          </div>
          
          <table id="logsTable" class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th><i class="fa fa-user"></i> Utilisateur</th>
                <th><i class="fa fa-bookmark"></i> Action</th>
                <th><i class="fa fa-info-circle"></i> Détails de l'opération</th>
                <th><i class="fa fa-calendar"></i> Date & Heure</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data['logs'])): ?>
                <?php foreach($data['logs'] as $log): ?>
                <tr>
                  <td style="font-weight: 600;"><?php echo htmlspecialchars($log->nom_utilisateur); ?></td>
                  <td>
                    <?php 
                      $action = strtolower($log->action);
                      $label = 'info';
                      if (mb_strpos($action, 'supprim') !== false) $label = 'danger';
                      if (mb_strpos($action, 'ajout') !== false) $label = 'success';
                      if (mb_strpos($action, 'connexion') !== false) $label = 'primary';
                    ?>
                    <span class="label label-<?php echo $label; ?>"><?php echo htmlspecialchars($log->action); ?></span>
                  </td>
                  <td class="text-muted"><?php echo htmlspecialchars($log->details); ?></td>
                  <td><?php echo date('d/m/Y H:i:s', strtotime($log->date_action)); ?></td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="4" class="text-center">Aucune activité enregistrée.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</section>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script>
// Use a check to ensure jQuery is ready before calling DataTable
function initDataTable() {
    if (typeof $.fn.DataTable === "undefined") {
        console.error("DataTables library not loaded yet. Retrying...");
        setTimeout(initDataTable, 100);
        return;
    }

    $('#logsTable').DataTable({
        "order": [[ 3, "desc" ]],
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                className: 'btn btn-danger btn-sm'
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
        }
    });
}

$(document).ready(function() {
    initDataTable();
});
</script>

<?php require APPROOT . '/layout/footer.php'; ?>