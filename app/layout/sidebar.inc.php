<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/photo/<?php echo $userProfilImg; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered">
            <?php
            echo $userPrenom.' '.$userNom;
            ?>
          </h5>
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Tableau de bord</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="metrologie.php">
              <i class="fa fa-thermometer-three-quarters"></i>
              <span>Métrologie</span>
              </a>
              <ul class="sub">
              <li><a href="temp_humid.php">Température & Humidité</a></li>
              <li><a href="cartographie.php">Cartographie des capteurs</a></li>
              <!-- <li><a href="operation.php">2ème Redémarage</a></li>
              <li><a href="operation.php">3ème Redémarage</a></li> -->
            </ul> 
          </li>
          <!-- <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shield"></i>
              <span>Administration</span>
              </a>
              <ul class="sub">
              <li><a href="utilisateur.php">Utilisateur</a></li>
              <li><a href="groupe.php">Groupe</a></li>
              <li><a href="entite.php">Entité</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Configuration</span>
              </a>
              <ul class="sub">
              <li><a href="produit.php">Produit</a></li>
              <li><a href="operation.php">Opération</a></li>
              <li><a href="acces_produit.php">Accés Produit</a></li>
              <li><a href="matrice_operation.php">Matrice D'Opération</a></li>
            </ul>
          </li> -->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>