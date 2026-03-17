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
          <h4 class="mb"><i class="fa fa-edit"></i> Modifier les informations de : <strong><?php echo $data['user']->prenom . ' ' . $data['user']->nom; ?></strong></h4>
          
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/users/edit/<?php echo $data['user']->id_user; ?>" method="post">
            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" value="<?php echo $data['user']->nom; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
              <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" value="<?php echo $data['user']->prenom; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="<?php echo $data['user']->email; ?>" required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Groupe (Catégorie)</label>
                <div class="col-sm-10">
                    <select name="id_groupe" class="form-control" required>
                        <?php foreach($data['groupes'] as $groupe) : ?>
                            <option value="<?php echo $groupe->id_groupe; ?>" 
                                <?php echo ($groupe->id_groupe == $data['user']->id_groupe) ? 'selected' : ''; ?>>
                                <?php echo $groupe->nom_groupe; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nouveau Mot de passe</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Laisser vide pour ne pas modifier">
                <span class="help-block">Si vous ne souhaitez pas changer le mot de passe, ne remplissez pas ce champ.</span>
              </div>
            </div>

            <div class="form-group text-right" style="padding-right: 15px;">
                <button type="submit" class="btn btn-theme">Mettre à jour</button>
                <a href="<?php echo URLROOT; ?>/users" class="btn btn-default">Annuler</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>