<?php 

if($nEtape != 4) {
?>
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
        <p>
            Pour le dépôt d'ouvrages d'un adhérent merci de suivre les étapes indiquées ci-dessous.
        </p>
    </div>
    <div class="row">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . 1; ?>" type="button" class="btn <?php if($nEtape == 1){echo 'btn-primary';}else{echo 'btn-default';} ?>  btn-circle">1</a>
                    <p>Recherche adhérents</p>
                </div>
                <div class="stepwizard-step">
                    <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . 2; ?>" type="button" class="btn <?php if($nEtape == 2){echo 'btn-primary';}else{echo 'btn-default';} ?> btn-circle">2</a>
                    <p>Sélection d'ouvrages</p>
                </div>
                <div class="stepwizard-step">
                    <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . 3; ?>" type="button" class="btn <?php if($nEtape == 3){echo 'btn-primary';}else{echo 'btn-default';} ?> btn-circle">3</a>
                    <p>Finalisation</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php 
            if($nEtape == 1){
        ?>
        <form role="form" method="POST" action="">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Etape 1</h3>
                        <div class="form-group">
                            <label class="control-label">Rechercher un adhérent</label>
                            <input type="text" class="form-control" name="rechercheAdherents" placeholder="Taper nom prénom">
                        </div>
                        <input type="submit" class="btn btn-default btn-lg" value="Rechercher">
                        <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . ($nEtape+1); ?>"><button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button></a>
                    </div>
                </div>
            </div>
        </form>
        <?php
            }
            if($nEtape == 2){
        ?>
        <form role="form" method="POST" action="">
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Etape 2</h3>
                        <div class="form-group">
                            <label class="control-label">Rechercher des ouvrages</label>
                            <input type="text" class="form-control" name="rechercheOuvrages" placeholder="Taper nom ouvrage">
                        </div>
                        <input type="submit" class="btn btn-default btn-lg" value="Rechercher" >
                        <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . ($nEtape+1); ?>"><button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button></a>
                    </div>
                </div>
            </div>
        </form>
        <?php
            }
            if($nEtape == 3){
        ?>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Finalisation - Adhérent <?php if(isset($_SESSION['depot_adherent_select'])){ echo '('.$_SESSION['depot_adherent_select']->nom . ' ' . $_SESSION['depot_adherent_select']->prenom .')';}?></h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Titre</th>
                                    <th>Editeur</th>
                                    <th>Type</th>
                                    <th>Classe</th>
                                    <th>Section</th>
                                    <th>Etat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <?php
                                if(isset($_SESSION['depot_manuel_select']['manuels'])){
                                    foreach ($_SESSION['depot_manuel_select']['manuels'] as $key => $value) {
                                        echo '
                                                <tr>
                                                    <td>' . $value->isbn . '</td>
                                                    <td>' . $value->nom . '</td>
                                                    <td>' . $value->editeur . '</td>
                                                    <td>' . $m_matiere->get_matiere($value->type)->libelle . '</td>
                                                    <td>' . $m_classe->get_classe($value->classe)->libelle . '</td>
                                                    <td>' . $m_section->get_section($value->section)->libelle . '</td>
                                                    <td>' . $m_etat->get_etat($_SESSION['depot_manuel_select']['etats_manuels'][$key])->intitule . '</td>
                                                    <td class="text-center">
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="supprimerElementPanier"  value="'. $value->isbn .'">
                                                            <input type="submit" class="btn btn-danger btn-xs" value="Retirer">
                                                        </form>
                                                    </td>
                                                </tr>
                                        ';
                                    }
                                }
                            ?>
                        </table>
                        <a href="<?php echo ADRESSE_ABSOLUE_URL . 'depot/' . ($nEtape+1); ?>"><button class="btn btn-success btn-lg pull-right" type="submit">Finir</button></a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </div> <!-- /row -->
    <hr>
    <!-- Recherche adhérents ou ouvrage-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">

            <?php
                if($rechercheAdherents) {
            ?>
            <div class="page-header">
                <h1>Liste d'adhérents</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Prénom</th>
                        <th>Adresse</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php
                    foreach ($adherents as $adherent) {
                        echo '
                                <tr>
                                    <td>' . $adherent->id . '</td>
                                    <td>' . $adherent->nom . ' ' . $adherent->prenom . '</td>
                                    <td>' . $adherent->adresse . ' ' . $adherent->ville . ' ' . $adherent->code_postal . '</td>
                                    <td class="text-center">
                                        <form method="POST" action="">
                                            <input type="hidden" name="ajoutAdherentPanier"  value="'. $adherent->id .'">
                                            <input type="submit" class="btn btn-info btn-xs" value="Ajouter">
                                        </form>
                                    </td>
                                </tr>';                                
                    }
                ?>
            </table>
            <?php
                }
                if($rechercheOuvrages) {
            ?>
            <div class="page-header">
                <h1>Liste d'ouvrage</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Nom</th>
                        <th>Editeur</th>
                        <th>Matiere</th>
                        <th>Classe</th>
                        <th>Section</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php
                    foreach ($ouvrages as $ouvrage) {
                        $panierOuvrages = '
                                            <tr>
                                                <td>' . $ouvrage->isbn . '</td>
                                                <td>' . $ouvrage->nom . '</td>
                                                <td>' . $ouvrage->editeur . '</td>
                                                <td>' . $m_matiere->get_matiere($ouvrage->type)->libelle . '</td>
                                                <td>' . $m_classe->get_classe($ouvrage->classe)->libelle . '</td>
                                                <td>' . $m_section->get_section($ouvrage->section)->libelle . '</td>
                                                <td class="text-center">
                                                    <form method="POST" action="">
                                                        <select name="etatManuel" class="form-control">';
                        if(isset($etats)){
                            foreach ($etats as $etat) {
                                $panierOuvrages .= '<option value="'.$etat->id. '">'.$etat->intitule.'</option>';
                            }
                        }

                        $panierOuvrages .= '</select>
                                            <input type="hidden" name="ajoutManuelPanier"  value="'. $ouvrage->isbn .'">
                                            <input type="submit" class="btn btn-info btn-xs" value="Ajouter">
                                        </form>
                                    </td>
                                </tr>
                            ';

                        echo $panierOuvrages;
                    }
                ?>
            </table>
            <?php
                }
            ?>
        </div>


        <?php
        if($nEtape != 3){
        ?>
            <div class="col-xs-6 col-md-4">
                <div class="page-header">
                    <h1>Panier</h1>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        Adhérent sélectionné : <?php if(isset($_SESSION['depot_adherent_select'])){ echo '('.$_SESSION['depot_adherent_select']->nom . ' ' . $_SESSION['depot_adherent_select']->prenom .')';}?>
                    </a>
                    <?php 
                        if(isset($_SESSION['depot_manuel_select']['manuels'])){
                            foreach ($_SESSION['depot_manuel_select']['manuels'] as $ouvrage) {
                                echo '<a href="#" class="list-group-item">' . $ouvrage->nom . ' ' . $ouvrage->editeur . ' ' . $m_matiere->get_matiere($ouvrage->type)->libelle . ' ' . $m_classe->get_classe($ouvrage->classe)->libelle . ' ' . $m_section->get_section($ouvrage->section)->libelle.'</a>';
                            }
                        }
                    ?>
                </div>
            </div>
        <?php
        }   
        ?>
    </div>
    </div>
</div><!-- /container -->
<?php
}else {
?>
<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $nom_page; ?></h1>
            <?php
                if(isset($resultat) && $resultat){
                    echo $code_retour[4];
                }
            ?>
    </div>
<?php
}
?>