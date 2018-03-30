<main role="main" id="categories" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Ordergeschiedenis</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Orderoverzicht</li>
            </ol>
            <!-- DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>Orders inzien
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Ordernummer</th>
                                <th>Naam</th>
                                <th>E-Mail</th>
                                <th>Besteldatum</th>
                                <th>Bekijken</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Ordernummer</th>
                                <th>Naam</th>
                                <th>E-Mail</th>
                                <th>Besteldatum</th>
                                <th>Bekijken</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($this->allOrders) {
                                foreach ($this->allOrders as $order) {
                                    $user = $order->getUser();
                                    $rules = $order->getOrderRules();

                                    ?>
                                    <tr>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $user[0]->getFirstName() . " " . $user[0]->getLastName(); ?></td>
                                        <td><?= $user[0]->getEmail(); ?></td>
                                        <td><?= $order->getOrderDate(); ?></td>
                                        <td>
                                            <button type="button" class="orderRuleOpener btn btn-success btn-sm"
                                                    data-toggle="modal" data-target="#orderRuleModal<?= $order->getId(); ?>"
                                                    data-id="<?php ?>">
                                                Bestelling bekijken
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

<?php
if ($this->allOrders) {
    foreach ($this->allOrders as $order) {
        ?>
        <!-- Modal -->
        <div class="modal fade" id="orderRuleModal<?= $order->getId(); ?>" tabindex="-1" role="dialog"
             aria-labelledby="orderRuleModal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Bestelregels</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Prijs</th>
                                    <th>Aantal</th>
                                    <th>Subtotaal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user = $order->getUser();
                                $rules = $order->getOrderRules();
                                if ($rules) {
                                    foreach ($rules as $rule) {
                                        $product = $rule->getProduct();
                                        ?>
                                        <tr>
                                            <td><?= $product[0]->getName(); ?></td>
                                            <td class="price">
                                                €<?= $product[0]->getPrice(); ?></td>
                                            <td class="amount"><?= $rule->getAmount(); ?></td>
                                            <td class="subtotal<?= $order->getId(); ?>">
                                                €<?= $rule->getAmount() * $product[0]->getPrice(); ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                                <script>
                                    function setTotal() {
                                        //Var init
                                        var sum = 0;
                                        var exBTW = 0;
                                        var sum2 = 0;
                                        var incBTW = 0;
                                        //For each subtotal(per product)
                                        $(".subtotal<?= $order->getId(); ?>").each(function () {
                                            //Get subtotal
                                            var value = $(this).text();
                                            var strippedValue = value.replace(/\€/g, '');
                                            // add only if the value is number
                                            if (!isNaN(strippedValue) && strippedValue.length !== 0) {
                                                //Without BTW/VAT
                                                sum += parseFloat(strippedValue);
                                                exBTW = sum.toFixed(2);
                                                //BTW/VAT included
                                                sum2 = sum * 1.21;
                                                incBTW = sum2.toFixed(2);
                                                //Update table
                                                document.getElementById('total-price-inc-btw<?= $order->getId(); ?>').innerHTML = "€" + incBTW;
                                            }
                                        });
                                    }

                                </script>
                                <tfoot>
                                <tr>
                                    <th style="border: none;"></th>
                                    <th style="border: none;"></th>
                                    <th>Totaal (incl. BTW)</th>
                                    <th id="total-price-inc-btw<?= $order->getId(); ?>"></th>
                                </tr>
                                </tfoot>
                                <script>
                                    setTotal();
                                </script>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>