<main role="main" id="products" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Producten</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>admin">Dashboard</a>
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
                                <th>Korting</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Prijs(Ex btw)</th>
                                <th>Categorie</th>
                                <th>Korting</th>
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
                                        <?php
                                        if ($product->getDiscount()) {
                                            ?>
                                            <td><?= $product->getDiscount(); ?></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td>-</td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <a href="<?= BASEPATH ?>edit_product/?id=<?= $product->getId(); ?>"
                                               class="btn btn-warning btn-sm" role="button">Bewerken</a>
                                            <button type="button" class="deleteModelOpener btn btn-danger btn-sm"
                                                    data-toggle="modal" data-target="#deleteModal"
                                                    data-id="<?= $product->getId(); ?>">
                                                Verwijderen
                                            </button>
                                        </td>
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

<script>
    $(document).on("click", ".deleteModelOpener", function () {
        var productId = $(this).data('id');
        $(".modal-footer #productId").val(productId);
    });
</script>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product verwijderen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Weet u zeker dat u dit product wilt verwijderen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                <form id="deleteProduct" name="deleteProduct" method="POST" action="<?= BASEPATH ?>delete_product/">
                    <input type="hidden" name="productId" id="productId" value=""/>
                    <button type="submit" id="deleteProductBtn" name="deleteProductBtn" class="btn btn-danger">
                        Verwijderen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>