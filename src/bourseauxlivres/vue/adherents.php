<div class="container">
    <div class="row">
    	<div class="page-header">
		    <h1><?php echo $nom_page; ?></h1>
		</div>
		<table class="table table-striped">
			<thead>
				<a href="<?php echo ADRESSE_ABSOLUE_URL . 'ajouter_adherent';?>" class="btn btn-primary btn-xs pull-right"><b>+</b>Ajouter un adhérent</a>
				<tr>
					<th>ID</th>
					<th>Nom Prénom</th>
					<th>Adresse</th>
					<th>Date de cotisation</th>
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
								<td>' . $t_texte->quand($adherent->date_cotisation)  . '</td>
								<td class="text-center">
									<a class="btn btn-info btn-xs" href="'. ADRESSE_ABSOLUE_URL . 'adherent/' . $adherent->id .'"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
									<a href="'. ADRESSE_ABSOLUE_URL . 'supprimer_adherent/' . $adherent->id .'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
								</td>
							</tr>
					';
				}
			?>
		</table>
    </div>
</div> <!-- /container -->