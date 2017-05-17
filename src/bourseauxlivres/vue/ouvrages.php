<div class="container">
    <div class="row">
    	<div class="page-header">
		    <h1><?php echo $nom_page; ?></h1>
		</div>
		<table class="table table-striped">
			<thead>
				<?php 
					if($_SESSION['is_admin'] == 1){
				?>
				<a href="<?php echo ADRESSE_ABSOLUE_URL . 'ajouter_ouvrage';?>" class="btn btn-primary btn-xs pull-right"><b>+</b>Ajouter un ouvrage</a>
				<?php
					}
				?>
				<tr>
					<th>ISBN</th>
					<th>Titre</th>
					<th>Editeur</th>
					<th>Type</th>
					<th>Classe</th>
					<th>Section</th>
					<th>Prix</th>
					<th>Date d'ajout</th>
				<?php 
					if($_SESSION['is_admin'] == 1){
				?>
					<th class="text-center">Action</th>
				<?php
					}
				?>
				</tr>
			</thead>
			<?php
				foreach ($ouvrages as $ouvrage) {
					$str = '<tr>
								<td>' . $ouvrage->isbn . '</td>
								<td>' . $ouvrage->nom . '</td>
								<td>' . $ouvrage->editeur . '</td>
								<td>' . $m_matiere->get_matiere($ouvrage->type)->libelle . '</td>
								<td>' . $m_classe->get_classe($ouvrage->classe)->libelle . '</td>
								<td>' . $m_section->get_section($ouvrage->section)->libelle . '</td>
								<td>' . $ouvrage->prix_neuf . ' €</td>
								<td>' . $t_texte->quand($ouvrage->date_cotisation) . '</td>';
					
					if($_SESSION['is_admin'] == 1){
						$str .= '<td class="text-center">
									<a href="'. ADRESSE_ABSOLUE_URL . 'supprimer_ouvrage/' . $ouvrage->isbn .'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
								</td>';
					}
					$str .= '</tr>';
					echo $str;
				}
			?>
		</table>
    </div>
</div> <!-- /container -->