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
            if(!isset($ouvrage) ) echo "lol";
            if(isset($ouvrage) && $codeRetour == -1) {
        ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vous êtes sur le point de supprimer l'ouvrage suivant : </label><br><br>
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" value="<?php echo $ouvrage->isbn;?>" disabled><br>
                    <label for="isbn">Titre</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?php echo $ouvrage->nom;?>" disabled><br>
                    <label for="isbn">Editeur</label>
                    <input type="text" class="form-control" id="editeur" name="editeur" placeholder="editeur" value="<?php echo $ouvrage->editeur;?>" disabled><br>
                </div>
                <input type="submit" class="btn btn-danger" name="submit" value="Supprimer" />
            </form>
        <?php
            }
        ?>
    </div>
</div> <!-- /container -->