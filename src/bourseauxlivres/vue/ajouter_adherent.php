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
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
            </div>
            <div class="row">
                <div class="form-group col-xs-6">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
                </div>
                <div class="form-group col-xs-6">
                    <label for="codePostal">Code Postal</label>
                    <input type="text" class="form-control" id="codePostal" name="codePostal" placeholder="Code Postal">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div> <!-- /container -->