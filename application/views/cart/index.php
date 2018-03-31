<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 10:52
 */
?>

<div class="row">

    <?php $this->loadSnippet("sidebar_product"); ?>

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">

        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Winkelwagen</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem">
            <div class="col-12 appendMsg">
                <table id="cart" class="table table-hover table-condensed" style="background: whitesmoke;">
                    <?php
                    if (!empty($this->cart)) {
                    ?>
                    <thead>
                    <tr>
                        <th style="width:30%">Product</th>
                        <th style="width:15%">Prijs</th>
                        <th style="width:30%">Aantal</th>
                        <th style="width:15%" class="text-center">Subtotaal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($this->cart as $key => $product) {
                        $productID = $product["product"];
                        ?>

                        <tr <?php echo "id=" . $product["product"]; ?>>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..."
                                                                         class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h5 style="margin-top: 0.5rem !important;"><?= $product["model"]->getName() ?></h5>
                                    </div>
                                </div>
                            </td>
                            <script>
                                $(document).ready(function () {
                                    var quantity = parseInt($('#<?php echo $key . "-quantity"; ?>').val());
                                    editSubtotal(quantity);
                                    refreshPrice();

                                    $('#<?php echo $key . "-plus"; ?>').click(function (e) {
                                        e.preventDefault();
                                        var quantity = parseInt($('#<?php echo $key . "-quantity"; ?>').val());
                                        $('#<?php echo $key . "-quantity"; ?>').val(quantity + 1);
                                        editSubtotal(quantity + 1);
                                        updateAmount('<?php echo BASEPATH . "cart"; ?>', '<?= $key ?>', quantity + 1, '<?= $productID ?>');
                                        refreshPrice();
                                    });

                                    $('#<?php echo $key . "-minus"; ?>').click(function (e) {
                                        e.preventDefault();
                                        var quantity = parseInt($('#<?php echo $key . "-quantity"; ?>').val());
                                        if (quantity > 1) {
                                            $('#<?php echo $key . "-quantity"; ?>').val(quantity - 1);
                                            editSubtotal(quantity - 1);
                                            updateAmount('<?php echo BASEPATH . "cart"; ?>', '<?= $key ?>', quantity - 1, '<?= $productID ?>');
                                            refreshPrice();
                                        }
                                    });

                                    function editSubtotal(quantity) {
                                        refreshPrice();
                                        var price = $('#<?php echo $key . "-price"; ?>').text();
                                        var stripped = price.replace(/\€/g, '');
                                        var intPrice = parseFloat(stripped) * quantity;
                                        var fixedPrice = intPrice.toFixed(2);
                                        document.getElementById('<?php echo $key . "-subtotal"; ?>').innerHTML = "€" + fixedPrice;
                                    }

                                });
                            </script>
                            <td data-th="Prijs" <?php echo "id=" . $key . "-price"; ?>>
                                €<?= $product["model"]->getDiscountPrice(); ?></td>
                            <td data-th="Aantal">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button"
                                            <?php echo "id=" . $key . "-minus"; ?>
                                                class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input readonly type="text"
                                           class="form-control" <?php echo "id=" . $key . "-quantity"; ?>
                                           name="quantity"
                                           min="1" max="100" value="<?= $product["amount"] ?>">
                                    <div class="input-group-append">
                                        <button type="button"
                                            <?php echo "id=" . $key . "-plus"; ?>
                                                class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Subtotaal"
                                class="text-center subtotal" <?php echo "id=" . $key . "-subtotal"; ?>>
                            </td>

                            <td class="actions" data-th="">
                                <button data-attr="<?= $key ?>" id="rmv" class="btn btn-danger btn-sm"
                                        onclick="clickHandler(this, '<?= $key ?>')">

                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" class="hidden-xs"></td>
                        <td id="" class="hidden-xs text-center font-weight-bold">Exclusief BTW</td>
                        <td id="total-price-ex-btw" class="hidden-xs text-center font-weight-bold"></td>
                        <td colspan="1" class="hidden-xs"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="hidden-xs"></td>
                        <td id="" class="hidden-xs text-center font-weight-bold">Inclusief BTW</td>
                        <td id="total-price-inc-btw" class="hidden-xs text-center font-weight-bold">0</td>
                        <td colspan="1" class="hidden-xs"></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Doorwinkelen</a>
                        </td>
                        <td colspan="3" class="hidden-xs"></td>
                        <td><a href="<?= BASEPATH ?>" class="btn btn-success btn-block">Betalen <i
                                        class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <?php
                }else{
                        echo "<div class='alert alert-danger'>Geen producten in winkelwagen.</div>";
                }
                ?>
                <script>
                    function clickHandler(o, key) {
                        $(o).parent().parent().remove();
                        deleteFromCart('<?php echo BASEPATH . "cart"; ?>', key);
                        refreshPrice();
                    }

                    function refreshPrice() {
                        if($('#cart tbody').children().length === 0){
                            $("#cart").remove();
                            $(".appendMsg").append("<div class='alert alert-danger'>Geen producten in winkelwagen.</div>");
                        }

                        //Var init
                        var sum = 0;
                        var exBTW = 0;
                        var sum2 = 0;
                        var incBTW = 0;
                        //For each subtotal(per product)
                        $(".subtotal").each(function () {
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
                                document.getElementById('total-price-ex-btw').innerHTML = "€" + exBTW;
                                document.getElementById('total-price-inc-btw').innerHTML = "€" + incBTW;
                            }
                        });
                    }
                </script>
            </div>
        </div>

    </div>

</div>
