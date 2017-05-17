<div class="container">
    <div class="row">
    	<div class="page-header">
		    <h1><?php echo $nom_page; ?></h1>
		</div>
		<table class="table table-striped">
			<thead>
				<a href="<?php echo ADRESSE_ABSOLUE_URL . 'ajouter_ouvrage';?>" class="btn btn-primary btn-xs pull-right"><b>+</b>Ajouter un ouvrage</a>
				<tr>
					<th>ISBN</th>
					<th>Titre</th>
					<th>Editeur</th>
					<th>Type</th>
					<th>Classe</th>
					<th>Section</th>
					<th>Prix</th>
					<th>Date d'ajout</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<?php
				foreach ($ouvrages as $ouvrage) {
					echo '
							<tr>
								<td>' . $ouvrage->isbn . '</td>
								<td>' . $ouvrage->nom . '</td>
								<td>' . $ouvrage->editeur . '</td>
								<td>' . $m_matiere->get_matiere($ouvrage->type)->libelle . '</td>
								<td>' . $m_classe->get_classe($ouvrage->classe)->libelle . '</td>
								<td>' . $m_section->get_section($ouvrage->section)->libelle . '</td>
								<td>' . $ouvrage->prix_neuf . ' €</td>
								<td>' . $t_texte->quand($ouvrage->date_cotisation) . '</td>
								<td class="text-center">
									<a href="'. ADRESSE_ABSOLUE_URL . 'supprimer_ouvrage/' . $ouvrage->isbn .'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
								</td>
							</tr>
					';
				}
			?>
		</table>
    </div>
</div> <!-- /container -->