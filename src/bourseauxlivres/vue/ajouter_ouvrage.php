<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $nom_page; ?></h1>
            <?php 
                if($codeRetour != -1) {
                    echo $code_retour[$codeRetour]; 
                };
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
                    <?php
                        if(isset($matieres)){
                            foreach ($matieres as $matiere) {
                                echo '<option value="'.$matiere->id. '">'.$matiere->libelle.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group" id="classe" name="classe">
                <label for="editeur">Classe</label>
                <select id="classeSelection" name="classe" class="form-control" onChange="gestionClasse(this);">
                   <?php
                        if(isset($classes)){
                            foreach ($classes as $classe) {
                                echo '<option value="'.$classe->id. '">'.$classe->libelle.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group" id ="section" name="section">
                <label for="editeur">Section</label>
                <select id="sectionSelect" name="section" class="form-control">
                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div> <!-- /container -->


<script>
    (function() {
        gestionClasse(document.getElementById("classeSelection"));
    })();

    function listerSections(libelle){
        var http = new XMLHttpRequest();
        var url = "http://localhost:8098/bourseauxlivres/liste_sections";
        var values;
        var params = "valeur="+libelle;

        http.open("POST", url, false);

        //Send the proper header information along with the request
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
              values = http.responseText;        
            }
        }
        http.send(params);
        return values;
    }

    function gestionClasse(selectElement){
        if(selectElement.options[selectElement.selectedIndex].text == 'Seconde'){
            var selection = listerSections(selectElement.options[selectElement.selectedIndex].text);
            document.getElementById("sectionSelect").innerHTML = selection;
        }else{
            var selection = listerSections('KOSeconde');
            document.getElementById("sectionSelect").innerHTML = selection;
        }
    }
    
</script>