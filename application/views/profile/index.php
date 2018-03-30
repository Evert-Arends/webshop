<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 19-2-18
 * Time: 13:07
 */
?>

    <div class="row">

        <?php $this->loadSnippet("sidebar_product"); ?>

        <!-- CONTENT -->
        <div class="col-xl-9 col-lg-12 col-md-12">
            <!-- HEADER -->
            <div class="row custom-margin">
                <div class="col-12">
                    <h3 class="partial-title" style="">Profiel</h3>
                </div>
            </div>

            <!-- Profile -->
            <div class="row" style="margin-top: 1rem;">
                <div class="col-12">
                    <div class="jumbotron">
                        <h5>Profielgegevens</h5>
                        <ul class="list-group" style="list-style: none;">
                            <li>Voornaam: <?= $this->user->first_name; ?></li>
                            <li>Achternaam: <?= $this->user->last_name; ?></li>
                            <li>E-Mail adres <?= $this->user->email; ?></li>
                            <li>Datum geregistreerd: <?= $this->user->date_registered; ?></li>
                        </ul>
                        <?php
                        if($this->user->roles_name == "Admin") {
                            echo "<a href='".BASEPATH."admin' class='btn btn-success'>Beheerderspaneel</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-table"></i>Uw geplaatste orders
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    if ($this->userOrders) {
                                        ?>
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
                                        foreach ($this->userOrders as $order) {
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
                                                            data-toggle="modal"
                                                            data-target="#orderRuleModal<?= $order->getId(); ?>"
                                                            data-id="<?php ?>">
                                                        Bestelling bekijken
                                                    </button>
                                                </td>
                                            </tr>

                                            <?php
                                        }

                                        ?>
                                        </tbody>
                                        <?php
                                    } else {
                                        echo "Er zijn geen orders gevonden.";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
if ($this->userOrders) {
    foreach ($this->userOrders as $order) {
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
                                            <td class="product_price">
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