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
          <h4 class="mb"><i class="fa fa-user-plus"></i> Ajouter un nouveau membre au personnel</h4>
          
          <form class="form-horizontal style-form" method="POST" action="<?php echo URLROOT; ?>/users/add">
            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" placeholder="Entrez le nom" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
              <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" placeholder="Entrez le prénom" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="exemple@domaine.com" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Mot de passe</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="********" required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Groupe (Rôle)</label>
                <div class="col-sm-10">
                    <select name="id_groupe" class="form-control" required>
                        <option value="" disabled selected>Choisir un groupe...</option>
                        <?php foreach($data['groupes'] as $groupe) : ?>
                            <option value="<?php echo $groupe->id_groupe; ?>">
                                <?php echo $groupe->nom_groupe; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-actions text-right" style="padding-top: 20px;">
              <button type="submit" class="btn btn-theme">Enregistrer</button>
              <a href="<?php echo URLROOT; ?>/users" class="btn btn-default">Annuler</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>