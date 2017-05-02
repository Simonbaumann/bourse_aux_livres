<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $nom_page; ?></h1>
        </div>
        <p>
            Pour la vente d'ouvrages à un adhérent merci de suivre les étapes indiquées ci-dessous.
        </p>
    </div>
    <div class="row">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Recherche adhérents</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Sélection d'ouvrages</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Finalisation</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form role="form">
            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Etape 1</h3>
                        <div class="form-group">
                            <label class="control-label">Rechercher un adhérent</label>
                            <input type="text" class="form-control" placeholder="Taper nom prénom">
                        </div>
                        <button class="btn btn-default btn-lg" type="button" >Rechercher</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Etape 2</h3>
                        <div class="form-group">
                            <label class="control-label">Rechercher des ouvrages</label>
                            <input type="text" class="form-control" placeholder="Taper nom ouvrage">
                        </div>
                        <button class="btn btn-default btn-lg" type="button" >Rechercher</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Finalisation</h3>
                        <button class="btn btn-success btn-lg pull-right" type="submit">Finir</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <!-- Recherche adhérents ou ouvrages -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="page-header">
                <h1>Liste d'adhérents ou ouvrage</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Parent ID</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>News</td>
                    <td>News Cate</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Sélectionner</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Products</td>
                    <td>Main Products</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Sélectionner</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Blogs</td>
                    <td>Parent Blogs</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Sélectionner</a></td>
                </tr>
            </table>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="page-header">
                <h1>Panier</h1>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    Utilsiateur sélectionné
                </a>
                <a href="#" class="list-group-item">Ouvrage 1</a>
                <a href="#" class="list-group-item">Ouvrage 2</a>
                <a href="#" class="list-group-item">Ouvrage 3</a>
                <a href="#" class="list-group-item">Ouvrage 4</a>
            </div>
        </div>
    </div>
</div><!-- /container -->