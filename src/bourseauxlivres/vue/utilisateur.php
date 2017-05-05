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
            if(isset($utilisateur)) {
        ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $utilisateur->adresse_email;?>" disabled>
                </div>
                <div class="form-group">
                    <label for="is_admin">Administrateur</label>
                    <?php
                        if($utilisateur->is_admin == 1){
                            echo '<input type="checkbox" id="is_admin" name="is_admin" value="1" checked>';
                        }else{
                            echo '<input type="checkbox" id="is_admin" name="is_admin" value="1">';
                        }
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Modifier" />
            </form>
        <?php
            }
        ?>
    </div>
</div> <!-- /container -->