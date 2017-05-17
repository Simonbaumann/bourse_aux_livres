<div class="container">
    <div class="row">
    	<div class="page-header">
		    <h1><?php echo $nom_page; ?></h1>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Ouvrage</th>
					<th>Etat</th>
					<th>Prix</th>
					<th>Adhérent</th>
				</tr>
			</thead>
			<?php
				foreach ($manuels as $manuel) {
					echo '
							<tr>
								<td>' . $m_ouvrage->get_ouvrage($manuel->id_ouvrage)->isbn . ' ' . $m_ouvrage->get_ouvrage($manuel->id_ouvrage)->nom . ' ' . $m_ouvrage->get_ouvrage($manuel->id_ouvrage)->editeur . '</td>
								<td>' . $m_etat->get_etat($manuel->id_etat)->intitule . '</td>
								<td>' . $manuel->prix . '</td>
								<td>' . $m_adherent->get_adherent($manuel->id_adherent_depot)->nom .' ' . $m_adherent->get_adherent($manuel->id_adherent_depot)->prenom . '</td>
							</tr>
					';
				}
			?>
		</table>
    </div>
</div> <!-- /container -->