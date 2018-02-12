<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 10:52
 */
?>

<div class="row">

    <!-- SIDEBAR -->
    <div class="col-lg-3 col-md-3" style="border-right: 1px solid #215678; margin-top: 1.5rem;">
        <h3 class="partial-title" style="">Uitgelicht</h3>
        <div class="jumbotron custom-margin">
            WIP
        </div>
    </div>

    <!-- PRODUCTS -->
    <div class="col-lg-9 col-md-9">

        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Winkelwagen</h3>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:40%">Product</th>
                        <th style="width:15%">Prijs</th>
                        <th style="width:20%">Aantal</th>
                        <th style="width:15%" class="text-center">Subtotaal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr <?php echo "id=product1 "; ?>>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..."
                                                                     class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product 1</h4>
                                </div>
                            </div>
                        </td>
                        <script>
                            $(document).ready(function () {
                                var quantity = parseInt($('#<?php echo "product1" . "-quantity"; ?>').val());
                                editSubtotal(quantity);
                                refreshPrice();

                                $('#<?php echo "product1" . "-plus"; ?>').click(function (e) {
                                    e.preventDefault();
                                    var quantity = parseInt($('#<?php echo "product1" . "-quantity"; ?>').val());
                                    $('#<?php echo "product1" . "-quantity"; ?>').val(quantity + 1);
                                    editSubtotal(quantity + 1);
                                    refreshPrice();
                                });

                                $('#<?php echo "product1" . "-minus"; ?>').click(function (e) {
                                    e.preventDefault();
                                    var quantity = parseInt($('#<?php echo "product1" . "-quantity"; ?>').val());
                                    if (quantity > 1) {
                                        $('#<?php echo "product1" . "-quantity"; ?>').val(quantity - 1);
                                        editSubtotal(quantity - 1);
                                        refreshPrice();
                                    }
                                });

                                function editSubtotal(quantity) {
                                    var price = $('#<?php echo "product1" . "-price"; ?>').text();
                                    var intPrice = parseFloat(price) * quantity;
                                    var fixedPrice = intPrice.toFixed(2);
                                    document.getElementById('<?php echo "product1" . "-subtotal"; ?>').innerHTML = fixedPrice;
                                }

                            });
                        </script>
                        <td data-th="Prijs" <?php echo "id=product1" . "-price"; ?>>1.99</td>
                        <td data-th="Aantal">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button"
                                        <?php echo "id=product1" . "-minus"; ?>
                                            class="quantity-left-minus btn btn-danger btn-number"
                                            data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input readonly type="text"
                                       class="form-control" <?php echo "id=product1" . "-quantity"; ?> name="quantity"
                                       min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button"
                                        <?php echo "id=product1" . "-plus"; ?>
                                            class="quantity-right-plus btn btn-success btn-number"
                                            data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td data-th="Subtotaal" class="text-center subtotal" <?php echo "id=product1" . "-subtotal"; ?>>
                            1.99
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <tr <?php echo "id=product2 "; ?>>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..."
                                                                     class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product 2</h4>
                                </div>
                            </div>
                        </td>
                        <script>
                            $(document).ready(function () {
                                var quantity = parseInt($('#<?php echo "product2" . "-quantity"; ?>').val());
                                editSubtotal(quantity);
                                refreshPrice();

                                $('#<?php echo "product2" . "-plus"; ?>').click(function (e) {
                                    e.preventDefault();
                                    var quantity = parseInt($('#<?php echo "product2" . "-quantity"; ?>').val());
                                    $('#<?php echo "product2" . "-quantity"; ?>').val(quantity + 1);
                                    editSubtotal(quantity + 1);
                                    refreshPrice();
                                });

                                $('#<?php echo "product2" . "-minus"; ?>').click(function (e) {
                                    e.preventDefault();
                                    var quantity = parseInt($('#<?php echo "product2" . "-quantity"; ?>').val());
                                    if (quantity > 1) {
                                        $('#<?php echo "product2" . "-quantity"; ?>').val(quantity - 1);
                                        editSubtotal(quantity - 1);
                                        refreshPrice();
                                    }
                                });

                                function editSubtotal(quantity) {
                                    var price = $('#<?php echo "product2" . "-price"; ?>').text();
                                    var intPrice = parseFloat(price) * quantity;
                                    var fixedPrice = intPrice.toFixed(2);
                                    document.getElementById('<?php echo "product2" . "-subtotal"; ?>').innerHTML = fixedPrice;
                                }
                            });
                        </script>
                        <td data-th="Prijs" <?php echo "id=product2" . "-price"; ?>>1.99</td>
                        <td data-th="Aantal">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button"
                                        <?php echo "id=product2" . "-minus"; ?>
                                            class="quantity-left-minus btn btn-danger btn-number"
                                            data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input readonly type="text"
                                       class="form-control" <?php echo "id=product2" . "-quantity"; ?> name="quantity"
                                       min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button"
                                        <?php echo "id=product2" . "-plus"; ?>
                                            class="quantity-right-plus btn btn-success btn-number"
                                            data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td data-th="Subtotaal" class="text-center subtotal" <?php echo "id=product2" . "-subtotal"; ?>>
                            1.99
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="hidden-xs"></td>
                        <td id="" class="hidden-xs text-center">Ex BTW</td>
                        <td id="total-price-ex-btw" class="hidden-xs text-center">1.99</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="hidden-xs"></td>
                        <td id="" class="hidden-xs text-center">Inc BTW</td>
                        <td id="total-price-inc-btw" class="hidden-xs text-center">0</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        </td>
                        <td colspan="3" class="hidden-xs"></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <script>
                    function refreshPrice() {
                        //Var init
                        var sum = 0;
                        var exBTW = 0;
                        var sum2 = 0;
                        var incBTW = 0;
                        //For each subtotal(per product)
                        $(".subtotal").each(function () {
                            //Get subtotal
                            var value = $(this).text();
                            // add only if the value is number
                            if (!isNaN(value) && value.length !== 0) {
                                //Without BTW/VAT
                                sum += parseFloat(value);
                                exBTW = sum.toFixed(2);
                                //BTW/VAT included
                                sum2 = sum * 1.21;
                                incBTW = sum2.toFixed(2);
                                //Update table
                                document.getElementById('total-price-ex-btw').innerHTML = exBTW;
                                document.getElementById('total-price-inc-btw').innerHTML = incBTW;
                            }
                        });
                    }
                </script>
            </div>
        </div>

    </div>

</div>