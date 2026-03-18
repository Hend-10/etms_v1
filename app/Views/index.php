<?php require APPROOT . '/layout/head.php'; ?>
<?php require APPROOT . '/layout/header.php'; ?>
<?php require APPROOT . '/layout/sidebar.php'; ?>

<section id="main-content">
  <section class="wrapper">

    <!-- Page Title -->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">
          <i class="fa fa-dashboard"></i> Tableau de bord
        </h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="<?php echo URLROOT; ?>/home">Accueil</a></li>
          <li class="active">Tableau de bord</li>
        </ol>
      </div>
    </div>

    <!-- ══ KPI CARDS ═══════════════════════════════════════ -->
    <div class="row">

      <!-- Capteurs actifs -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget-panel" style="background:#3ecfbf;border-radius:6px;padding:20px;color:#fff;margin-bottom:20px;">
          <div style="display:flex;justify-content:space-between;align-items:flex-start;">
            <div>
              <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;opacity:0.85;">Capteurs actifs</div>
              <div style="font-size:2.2rem;font-weight:700;line-height:1.2;margin:6px 0;">
                <?php echo $data['activeCapteurs']; ?>
                <span style="font-size:1rem;opacity:0.7;">/ <?php echo $data['totalCapteurs']; ?></span>
              </div>
              <div style="font-size:0.78rem;opacity:0.8;">Dernières 24 h</div>
            </div>
            <i class="fa fa-wifi" style="font-size:2.5rem;opacity:0.25;"></i>
          </div>
          <a href="<?php echo URLROOT; ?>/capteurs/index" style="display:block;margin-top:14px;padding-top:10px;border-top:1px solid rgba(255,255,255,0.25);font-size:0.78rem;color:#fff;text-decoration:none;opacity:0.85;">
            Voir les capteurs <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Records aujourd'hui -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget-panel" style="background:#5cb85c;border-radius:6px;padding:20px;color:#fff;margin-bottom:20px;">
          <div style="display:flex;justify-content:space-between;align-items:flex-start;">
            <div>
              <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;opacity:0.85;">Records aujourd'hui</div>
              <div style="font-size:2.2rem;font-weight:700;line-height:1.2;margin:6px 0;">
                <?php echo number_format($data['recordsToday']); ?>
              </div>
              <div style="font-size:0.78rem;opacity:0.8;">Total : <?php echo number_format($data['totalRecords']); ?></div>
            </div>
            <i class="fa fa-line-chart" style="font-size:2.5rem;opacity:0.25;"></i>
          </div>
          <a href="<?php echo URLROOT; ?>/records" style="display:block;margin-top:14px;padding-top:10px;border-top:1px solid rgba(255,255,255,0.25);font-size:0.78rem;color:#fff;text-decoration:none;opacity:0.85;">
            Voir l'historique <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Température moyenne -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget-panel" style="background:#f0ad4e;border-radius:6px;padding:20px;color:#fff;margin-bottom:20px;">
          <div style="display:flex;justify-content:space-between;align-items:flex-start;">
            <div>
              <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;opacity:0.85;">Temp. moy. (1 h)</div>
              <div style="font-size:2.2rem;font-weight:700;line-height:1.2;margin:6px 0;">
                <?php echo $data['avgTmp']; ?> °C
              </div>
              <div style="font-size:0.78rem;opacity:0.8;">Humidité : <?php echo $data['avgHum']; ?> %</div>
            </div>
            <i class="fa fa-thermometer-half" style="font-size:2.5rem;opacity:0.25;"></i>
          </div>
          <a href="<?php echo URLROOT; ?>/records" style="display:block;margin-top:14px;padding-top:10px;border-top:1px solid rgba(255,255,255,0.25);font-size:0.78rem;color:#fff;text-decoration:none;opacity:0.85;">
            Voir les mesures <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Alertes ouvertes -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget-panel" style="background:#d9534f;border-radius:6px;padding:20px;color:#fff;margin-bottom:20px;">
          <div style="display:flex;justify-content:space-between;align-items:flex-start;">
            <div>
              <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;opacity:0.85;">Alertes actives</div>
              <div style="font-size:2.2rem;font-weight:700;line-height:1.2;margin:6px 0;">
                <?php echo $data['openAlerts']; ?>
              </div>
              <div style="font-size:0.78rem;opacity:0.8;"><?php echo $data['sensorsInAlert']; ?> capteur<?php echo $data['sensorsInAlert'] != 1 ? 's' : ''; ?> hors seuil</div>
            </div>
            <i class="fa fa-bell" style="font-size:2.5rem;opacity:0.25;"></i>
          </div>
          <a href="<?php echo URLROOT; ?>/alertes/index" style="display:block;margin-top:14px;padding-top:10px;border-top:1px solid rgba(255,255,255,0.25);font-size:0.78rem;color:#fff;text-decoration:none;opacity:0.85;">
            Voir les alertes <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>

    </div><!-- /.row KPIs -->


    <!-- ══ CHARTS ROW ══════════════════════════════════════ -->
    <div class="row">

      <!-- Records – 7 derniers jours -->
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bar-chart"></i> Records – 7 derniers jours
          </div>
          <div class="panel-body">
            <canvas id="recordsChart" height="110"></canvas>
          </div>
        </div>
      </div>

      <!-- Top emplacements -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-map-marker"></i> Top emplacements
          </div>
          <div class="panel-body" style="padding:10px 16px;">
            <?php if (!empty($data['topEmplacements'])): ?>
              <?php $maxVal = max(array_map(fn($e) => $e->total, $data['topEmplacements'])); ?>
              <?php foreach ($data['topEmplacements'] as $emp): ?>
                <div style="margin-bottom:14px;">
                  <div style="display:flex;justify-content:space-between;font-size:0.82rem;margin-bottom:4px;">
                    <span><?php echo htmlspecialchars($emp->nom_emp); ?></span>
                    <span class="text-muted"><?php echo number_format($emp->total); ?></span>
                  </div>
                  <div class="progress" style="margin:0;height:8px;">
                    <div class="progress-bar" style="width:<?php echo round(($emp->total/$maxVal)*100); ?>%;background:#3ecfbf;"></div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-muted text-center">Aucune donnée.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div><!-- /.row charts -->


    <!-- ══ SENSOR CHART + ALERTS TABLE ════════════════════ -->
    <div class="row">

      <!-- Temp & humidité par capteur -->
      <div class="col-lg-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-thermometer-half"></i> Temp. &amp; Humidité par capteur (24 h)
          </div>
          <div class="panel-body">
            <canvas id="sensorChart" height="180"></canvas>
          </div>
        </div>
      </div>

      <!-- Alertes récentes -->
      <div class="col-lg-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bell"></i> Alertes récentes
            <a href="<?php echo URLROOT; ?>/alertes/index" class="pull-right" style="font-size:0.78rem;">Voir tout</a>
          </div>
          <div class="panel-body" style="padding:0;">
            <table class="table table-hover table-condensed" style="margin:0;">
              <thead>
                <tr>
                  <th>Capteur</th>
                  <th>Emplacement</th>
                  <th>Temp.</th>
                  <th>Humidité</th>
                  <th>Statut</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data['recentAlerts'])): ?>
                  <?php foreach ($data['recentAlerts'] as $alert): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($alert->Nom_cap); ?></td>
                    <td><?php echo htmlspecialchars($alert->nom_emp); ?></td>
                    <td><?php echo $alert->tmp; ?> °C</td>
                    <td><?php echo $alert->th; ?> %</td>
                    <td>
                      <?php
                      $s = strtolower($alert->statut);
                      if (mb_strpos($s, 'résolu') !== false) {
                          $cls = 'success';
                      } elseif (mb_strpos($s, 'en cours') !== false) {
                          $cls = 'warning';
                      } else {
                          $cls = 'danger';
                      }
                    ?>
                      <span class="label label-<?php echo $cls; ?>"><?php echo htmlspecialchars($alert->statut); ?></span>
                    </td>
                    <td class="text-muted" style="font-size:0.8rem;"><?php echo date('d/m H:i', strtotime($alert->date_rec)); ?></td>
                  </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="6" class="text-center text-muted" style="padding:20px;">Aucune alerte récente</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div><!-- /.row alerts -->


  </section><!-- /.wrapper -->
</section><!-- /#main-content -->

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function () {
  // ── Records per day ──────────────────────────────────────
  var rLabels = <?php echo json_encode(array_map(fn($r) => date('d/m', strtotime($r->jour)), $data['recordsPerDay'])); ?>;
  var rValues = <?php echo json_encode(array_map(fn($r) => (int)$r->total, $data['recordsPerDay'])); ?>;

  new Chart(document.getElementById('recordsChart'), {
    type: 'bar',
    data: {
      labels: rLabels,
      datasets: [{
        label: 'Records',
        data: rValues,
        backgroundColor: 'rgba(62,207,191,0.25)',
        borderColor: '#3ecfbf',
        borderWidth: 1.5,
        borderRadius: 4,
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        x: { grid: { color: 'rgba(0,0,0,0.05)' } },
        y: { grid: { color: 'rgba(0,0,0,0.05)' }, beginAtZero: true }
      }
    }
  });

  // ── Sensor temp & humidity ───────────────────────────────
  var sLabels  = <?php echo json_encode(array_map(fn($s) => $s->Nom_cap, $data['sensorStats'])); ?>;
  var sTmpVals = <?php echo json_encode(array_map(fn($s) => (float)$s->avg_tmp, $data['sensorStats'])); ?>;
  var sHumVals = <?php echo json_encode(array_map(fn($s) => (float)$s->avg_hum, $data['sensorStats'])); ?>;

  new Chart(document.getElementById('sensorChart'), {
    type: 'bar',
    data: {
      labels: sLabels,
      datasets: [
        {
          label: 'Temp (°C)',
          data: sTmpVals,
          backgroundColor: 'rgba(240,173,78,0.3)',
          borderColor: '#f0ad4e',
          borderWidth: 1.5,
          borderRadius: 4,
        },
        {
          label: 'Humidité (%)',
          data: sHumVals,
          backgroundColor: 'rgba(62,207,191,0.2)',
          borderColor: '#3ecfbf',
          borderWidth: 1.5,
          borderRadius: 4,
        }
      ]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } } },
      scales: {
        x: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { font: { size: 10 }, maxRotation: 30 } },
        y: { grid: { color: 'rgba(0,0,0,0.05)' }, beginAtZero: true }
      }
    }
  });
})();
</script>

<?php require APPROOT . '/layout/footer.php'; ?>