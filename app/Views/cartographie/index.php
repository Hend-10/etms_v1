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
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-file-pdf-o"></i> Télécharger un Plan</h4>
          <form class="form-inline" action="<?php echo URLROOT; ?>/cartographie/upload" method="post" enctype="multipart/form-data">
            <select name="emp_id" class="form-control" required style="width: 200px;">
                <option value="">-- Emplacement --</option>
                <?php foreach($data['emplacements'] as $emp) : ?>
                    <option value="<?php echo $emp->id_emp; ?>"><?php echo $emp->nom_emp; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="pdf_file" class="form-control" accept=".pdf" required>
            <button type="submit" class="btn btn-theme">Ajouter</button>
          </form>
        </div>
      </div>
    </div>

    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel" style="padding:15px;">
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-list"></i> Plans Enregistrés</h4>
            <hr>
            <thead>
              <tr>
                <th>Emplacement</th>
                <th>Fichier</th>
                <th>Uploader</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['pdfs'] as $pdf) : ?>
              <tr>
                <td><b><?php echo $pdf->nom_emp; ?></b></td>
                <td><a href="<?php echo URLROOT; ?>/uploads/pdf/<?php echo $pdf->file_name; ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Voir PDF</a></td>
                <td><span class="label label-info"><?php echo $pdf->uploaded_by; ?></span></td>
                <td><?php echo date('d/m/Y H:i', strtotime($pdf->upload_date)); ?></td>
                <td>
                  <a href="<?php echo URLROOT; ?>/cartographie/delete/<?php echo $pdf->id; ?>/<?php echo $pdf->file_name; ?>" 
                     class="btn btn-danger btn-xs" onclick="return confirm('Supprimer?')"><i class="fa fa-trash-o"></i></a>
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

<?php require_once APPROOT . '/layout/footer.php'; ?> 