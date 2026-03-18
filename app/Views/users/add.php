<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-user-plus"></i> Ajouter un nouvel utilisateur</h4>
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/users/add" method="post">
            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
              <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required>
                <span class="text-danger"><?php echo $data['email_err']; ?></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Mot de passe</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Rôle / Groupe</label>
              <div class="col-sm-10">
                <select name="id_groupe" class="form-control" required>
                  <option value="">-- Choisir un rôle --</option>
                  <?php foreach($data['groupes'] as $groupe) : ?>
                    <option value="<?php echo $groupe->id_groupe; ?>">
                        <?php echo $groupe->nom_groupe; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-theme">Enregistrer</button>
                <a href="<?php echo URLROOT; ?>/users/index" class="btn btn-default">Annuler</a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>