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
            if(isset($utilisateur) && $codeRetour == -1) {
        ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vous êtes sur le point de supprimer l'utilisateur suivant : </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $utilisateur->adresse_email;?>" disabled>
                </div>
                <input type="submit" class="btn btn-danger" name="submit" value="Supprimer" />
            </form>
        <?php
            }
        ?>
    </div>
</div> <!-- /container -->