    <?php require APPROOT . '/layout/head.php'; ?>
    <?php require APPROOT . '/layout/header.php'; ?>
    <?php require APPROOT . '/layout/sidebar.php'; ?>

    <section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Modifier le Capteur</h3>
        
        <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> ID Capteur: <?php echo $data['id_cap']; ?></h4>
            
            <form class="form-horizontal style-form" action="<?php echo URLROOT; ?>/capteurs/edit/<?php echo $data['id_cap']; ?>" method="post">
                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nouveau Nom</label>
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control" value="<?php echo $data['Nom_cap']; ?>" required>
                </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit">Mettre à jour</button>
                        <a href="<?php echo URLROOT; ?>/capteurs/index" class="btn btn-theme04">Annuler</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
    </section>

    <?php require APPROOT . '/layout/footer.php'; ?>