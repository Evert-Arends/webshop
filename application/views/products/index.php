<main role="main" id="products" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Producten</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/webshop/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Producten</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>Producten inzien
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Prijs(Ex btw)</th>
                                <th>Categorie</th>
                                <th>Bewerken</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Prijs(Ex btw)</th>
                                <th>Categorie</th>
                                <th>Bewerken</th>
                                <th>Verwijderen</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($this->Products) {
                                foreach ($this->Products as $product) {
                                    ?>
                                    <tr>
                                        <td><?= $product->getName(); ?></td>
                                        <td><?= $product->getPrice(); ?></td>
                                        <?php $cat = $product->getCategory(); ?>
                                        <td><?= $cat->getName(); ?></td>
                                        <td><?= $product->getName(); ?></td>
                                        <td><?= $product->getName(); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>