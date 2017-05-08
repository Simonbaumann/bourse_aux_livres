<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $nom_page; ?></h1> 
            <?php 
                if($codeRetour != -1) {
                    echo $code_retour[$codeRetour]; 
                }
            ?>
        </div>
        <?php 
            if(isset($adherent)) {
        ?>
            <form method="POST" action="">
                <div class="form-group">
	                <label for="nom">Nom</label>
	                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $adherent->nom; ?>" disabled>
	            </div>
	            <div class="form-group">
	                <label for="prenom">Prénom</label>
	                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $adherent->prenom; ?>" disabled>
	            </div>
	            <div class="form-group">
	                <label for="adresse">Adresse</label>
	                <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $adherent->adresse; ?>"  disabled>
	            </div>
	            <div class="row">
	                <div class="form-group col-xs-6">
	                    <label for="ville">Ville</label>
	                    <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $adherent->ville; ?>"  disabled>
	                </div>
	                <div class="form-group col-xs-6">
	                    <label for="codePostal">Code Postal</label>
	                    <input type="text" class="form-control" id="codePostal" name="codePostal" value="<?php echo $adherent->code_postal; ?>"  disabled>
	                </div>
	            </div>
            </form>
        <?php
            }
        ?>
    </div>
</div> <!-- /container -->