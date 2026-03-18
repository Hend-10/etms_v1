<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel" style="padding: 25px; border-radius: 5px;">
          <h4 class="mb"><i class="fa fa-user"></i> Mon Profil Personnel</h4>
          <hr>
          <?php flash('profile_message'); ?>
          
          <div class="row">
            <div class="col-md-4 centered">
                <div class="profile-pic-container" style="margin-bottom: 20px;">
                    <img src="<?php echo URLROOT; ?>/assets/img/photo/<?php echo $_SESSION['user_photo'] ?? 'default.png'; ?>" 
                         class="img-circle" width="150" height="150" 
                         style="border: 4px solid #4ecdc4; object-fit: cover;">
                </div>
                
                <form action="<?php echo URLROOT; ?>/users/profile" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="btn btn-theme02">
                            <i class="fa fa-camera"></i> Choisir une photo
                            <input type="file" name="profile_image" style="display: none;" onchange="this.form.submit()">
                        </label>
                    </div>
                    <p class="text-muted small">Formats acceptés: JPG, PNG</p>
                </form>
            </div>
            
            <div class="col-md-8">
                <div class="user-details">
                    <h3 style="color: #4ecdc4;"><?php echo $_SESSION['user_prenom'] . ' ' . $_SESSION['user_nom']; ?></h3>
                    <p class="text-muted"><i class="fa fa-tag"></i> Rôle: <strong><?php echo $_SESSION['user_role']; ?></strong></p>
                    <hr>
                    
                    <table class="table table-borderless">
                        <tr>
                            <td style="width: 30%;"><i class="fa fa-envelope"></i> <strong>Email:</strong></td>
                            <td><?php echo $_SESSION['user_email']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-calendar"></i> <strong>Dernière connexion:</strong></td>
                            <td><?php echo date('d-m-Y H:i'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>