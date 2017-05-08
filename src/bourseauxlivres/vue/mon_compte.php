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
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $utilisateur->adresse_email; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirmation mot de passe</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div> <!-- /container -->