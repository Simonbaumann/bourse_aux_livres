<div class="container">
    <div class="row">
    	<div class="page-header">
		    <h1><?php echo $nom_page; ?></h1>
		</div>
		<table class="table table-striped">
			<thead>
				<a href="<?php echo ADRESSE_ABSOLUE_URL . 'ajouter_utilisateur';?>" class="btn btn-primary btn-xs pull-right"><b>+</b>Ajouter un utilisateur</a>
				<tr>
					<th>ID</th>
					<th>email</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<?php
				foreach ($utilisateurs as $utilisateur) {
					echo '
							<tr>
								<td>' . $utilisateur->id . '</td>
								<td>' . $utilisateur->adresse_email . '</td>
								<td class="text-center">
									<a class="btn btn-info btn-xs" href="'. ADRESSE_ABSOLUE_URL . 'utilisateur/' . $utilisateur->id .'"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
									<a href="'. ADRESSE_ABSOLUE_URL . 'supprimer_utilisateur/' . $utilisateur->id .'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
								</td>
							</tr>
					';
				}
			?>
		</table>
    </div>
</div> <!-- /container -->