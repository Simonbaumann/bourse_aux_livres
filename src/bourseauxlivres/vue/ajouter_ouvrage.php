<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $nom_page; ?></h1>
            <?php 
                if($codeRetour != -1) {
                    echo $code_retour[$codeRetour]; 
                } else echo $codeRetour;
            ?>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="editeur">Editeur</label>
                <input type="text" class="form-control" id="editeur" name="editeur" placeholder="Editeur">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control">
                    <option value="1">Mathématiques</option>
                    <option value="2">Français</option>
                    <option value="3">Philosophie</option>
                    <option value="4">Physique</option>
                    <option value="5">Chimie</option>
                </select>
            </div>
            <div class="form-group" id="classe" name="classe">
                <label for="editeur">Classe</label>
                <select name="classe" class="form-control">
                    <option value="1">Seconde</option>
                    <option value="2">Première</option>
                    <option value="3">Terminale</option>
                </select>
            </div>
            <div class="form-group" id ="section" name="section">
                <label for="editeur">Section</label>
                <select name="section" class="form-control">
                    <option value="1">S</option>
                    <option value="2">ES</option>
                    <option value="3">L</option>
                    <option value="4">STMG</option>
                    <option value="5">ST2S</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div> <!-- /container -->