<?php 
  require_once APPROOT . '/layout/head.php'; 
  require_once APPROOT . '/layout/header.php'; 
  require_once APPROOT . '/layout/sidebar.php'; 
?>

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> <?php echo $data['title']; ?></h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <div class="pull-right" style="margin-right: 20px; margin-top: 10px;">
              <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-success">
                  <i class="fa fa-plus"></i> Ajouter un personnel
              </a>
          </div>
          <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-users"></i> Liste du personnel</h4>
            <hr>
            <thead>
              <tr>
                <th><i class="fa fa-bullhorn"></i> Nom & Prénom</th>
                <th class="hidden-phone"><i class="fa fa-envelope"></i> Email</th>
                <th><i class="fa fa-bookmark"></i> Statut</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($data['users'])) : ?>
                <?php foreach($data['users'] as $user) : ?>
                <tr>
                  <td><?php echo $user->nom . ' ' . $user->prenom; ?></td>
                  <td class="hidden-phone"><?php echo $user->email; ?></td>
                  <td><span class="label label-info label-mini">Actif</span></td>
                  <td>
                    <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $user->id_user; ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <form style="display:inline;" action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->id_user; ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Supprimer cet utilisateur ?')">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>
                </td>
                </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="4" class="text-center">La base de données est vide.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<?php require_once APPROOT . '/layout/footer.php'; ?>