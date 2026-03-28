<?php 
  require APPROOT . '/layout/head.php'; 
  require APPROOT . '/layout/header.php'; 
  require APPROOT . '/layout/sidebar.php'; 
?>

<section id="main-content">
  <section class="wrapper">
    
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user"></i> Gestion des Utilisateurs</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="<?php echo URLROOT; ?>/home">Accueil</a></li>
          <li><i class="fa fa-users"></i><a href="<?php echo URLROOT; ?>/users">Utilisateurs</a></li>
          <li class="active">Modifier</li>
        </ol>
      </div>
    </div>

    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel" style="padding: 20px; border-radius: 5px;">
          <h4 class="mb"><i class="fa fa-edit"></i> Modifier le profil : <strong><?php echo htmlspecialchars($data['user']->prenom . ' ' . $data['user']->nom); ?></strong></h4>
          
          <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/users/edit/<?php echo $data['user']->id_user; ?>" method="post">
            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($data['user']->nom); ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
              <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($data['user']->prenom); ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($data['user']->email); ?>" required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Rôle (Groupe)</label>
                <div class="col-sm-10">
                    <select name="id_groupe" class="form-control" required>
                        <?php foreach($data['groupes'] as $groupe) : ?>
                            <option value="<?php echo $groupe->id_groupe; ?>" 
                                <?php echo ($groupe->id_groupe == $data['user']->id_groupe) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($groupe->nom_groupe); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nouveau Mot de passe</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Laisser vide pour conserver l'actuel">
                <span class="help-block" style="color: #999; font-size: 11px;">
                  <i class="fa fa-info-circle"></i> Ne remplissez ce champ que si vous souhaitez réinitialiser le mot de passe de cet utilisateur.
                </span>
              </div>
            </div>

            <div class="form-group text-right" style="padding-top: 20px; border-top: 1px solid #eff2f7; margin-top: 20px;">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-theme"><i class="fa fa-check"></i> Enregistrer les modifications</button>
                    <a href="<?php echo URLROOT; ?>/users" class="btn btn-default">Annuler</a>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<script src="<?php echo URLROOT; ?>/assets/lib/jquery/jquery.min.js"></script>
<script>
    if (typeof $.fn.DataTable === "undefined") {
        $.fn.DataTable = function() { 
            console.log("DataTable library not loaded on this page - ignoring call.");
            return this; 
        };
    }
</script>

<?php require APPROOT . '/layout/footer.php'; ?>