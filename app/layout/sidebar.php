<aside>
  <div id="sidebar" class="nav-collapse">
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered">
        <a href="#">
            <img src="<?php echo URLROOT; ?>/assets/img/photo/<?php echo $data['userProfilImg'] ?? 'default.png'; ?>" class="img-circle" width="80">
        </a>
      </p>
      <h5 class="centered">
        <?php echo ($data['userPrenom'] ?? 'User') . ' ' . ($data['userNom'] ?? ''); ?>
      </h5>

      <li class="mt">
        <a class="active" href="<?php echo URLROOT; ?>/home">
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
          <li><a href="<?php echo URLROOT; ?>/sensors/temp_humid">Température & Humidité</a></li>
          <li><a href="<?php echo URLROOT; ?>/sensors/cartographie">Cartographie des capteurs</a></li>
        </ul> 
      </li>

      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-cogs"></i>
          <span>Configuration</span>
        </a>
        <ul class="sub">
          <li><a href="<?php echo URLROOT; ?>/products">Produit</a></li>
          <li><a href="<?php echo URLROOT; ?>/operations">Opération</a></li>
        </ul>
      </li>
    </ul>
    </div>
</aside>