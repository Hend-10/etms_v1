<aside>
  <div id="sidebar" class="nav-collapse">
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered">
        <a href="#">
            <img src="<?php echo URLROOT; ?>/assets/img/photo/<?php echo $data['userProfilImg'] ?? 'default.png'; ?>" class="img-circle" width="80">
        </a>
      </p>
      <h5 class="centered">
        <?php echo ($data['userPrenom'] ?? 'Admin') . ' ' . ($data['userNom'] ?? 'User'); ?>
      </h5>

      <li class="mt">
        <a href="<?php echo URLROOT; ?>/home">
          <i class="fa fa-dashboard"></i>
          <span>Tableau de bord</span>
        </a>
      </li>

      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-thermometer-three-quarters"></i>
          <span>Métrologie</span>
        </a>
        <ul class="sub">
          <li><a href="<?php echo URLROOT; ?>/records">Historique des données</a></li>
          <li><a href="<?php echo URLROOT; ?>/sensors/cartographie">Cartographie</a></li>
        </ul> 
      </li>

      <li>
        <a href="<?php echo URLROOT; ?>/alertes/index">
          <i class="fa fa-bell"></i>
          <span>Alertes</span>
          <?php if(isset($data['alert_count']) && $data['alert_count'] > 0) : ?>
            <span class="label label-danger pull-right"><?php echo $data['alert_count']; ?></span>
          <?php endif; ?>
        </a>
      </li>

      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-users"></i>
          <span>Utilisateurs</span>
        </a>
        <ul class="sub">
          <li><a href="<?php echo URLROOT; ?>/users/index">Liste des utilisateurs</a></li>  
          <li><a href="<?php echo URLROOT; ?>/users/add">Ajouter un utilisateur</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-cogs"></i>
          <span>Configuration</span>
        </a>
        <ul class="sub">
          <li><a href="<?php echo URLROOT; ?>/capteurs/index">Capteurs</a></li>
          <li><a href="<?php echo URLROOT; ?>/emplacements/index">Emplacements</a></li>
          <li><a href="<?php echo URLROOT; ?>/categories">Catégories</a></li>
          <li><a href="<?php echo URLROOT; ?>/seuils/index">Seuils</a></li>
          <li><a href="<?php echo URLROOT; ?>/affectations/index">Affectations</a></li>
        </ul>
      </li>
    </ul>
  </div>
</aside>