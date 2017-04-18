<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo BOOTSTRAP_CSS;?>">
		<link rel="stylesheet" href="<?php echo STYLE_CSS;?>">
		<link rel="icon" href="<?php echo FAVICON;?>" />
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo DESCRIPTION_DEFAUT; ?>">
		<meta name="keywords" content="<?php echo KEYWORDS_DEFAUTS; ?>">
		<meta name="Author" content="Kristen VIGUIER et Simon BAUMANN" />

		<title><?php TITRE_DEFAUTS ;?></title>
	</head>
	<body>

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<!-- Pour l'affichage mobile -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Bourse aux livres</a>
				</div>

				<!--  nav links, forms, et autre contenu pour le toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Accueil</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ouvrages<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Lister</a></li>
								<li><a href="#">Ajouter</a></li>
								<li><a href="#">Supprimer</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adhérents<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Ajouter</a></li>
								<li><a href="#">Lister</a></li>
								<li><a href="#">Supprimer</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon compte<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Modifier</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Déconnexion</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>