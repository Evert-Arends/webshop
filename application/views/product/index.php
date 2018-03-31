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

    <script>
        $(document).ready(function () {
            var quantity = 1;

            $('.quantity-right-plus').click(function (e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
            });

            $('.quantity-left-minus').click(function (e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">

        <?php
        if ($this->product) {
            foreach ($this->product as $product) { ?>
                <div class="row custom-margin">
                    <div class="col-12">
                        <h3 class="partial-title" style=""><?= $product->getName(); ?></h3>
                        <div class="row custom-margin" style="margin-left: 0; margin-right: 0;">
                            <div class=" card bg-light image-card">
                                <div class="card-body image-card-body">
                                    <div class="row">
                                        <!-- Image -->
                                        <div class="col-12 col-lg-6">
                                            <div class="preview">
                                                <style>
                                                    .imgholder-big {
                                                        height: 300px;
                                                        width: 550px;
                                                        overflow: hidden;
                                                    }
                                                </style>
                                                <div class="preview-pic tab-content">
                                                    <div class="tab-pane active imgholder-big" id="pic-1"><img
                                                                src="<?= $product->getImages()[0]->getLocation(); ?>"/>
                                                    </div>
                                                    <div class="tab-pane imgholder-big" id="pic-2"><img
                                                                src="<?= $product->getImages()[1]->getLocation(); ?>"/>
                                                    </div>
                                                    <div class="tab-pane imgholder-big" id="pic-3"><img
                                                                src="<?= $product->getImages()[2]->getLocation(); ?>"/>
                                                    </div>
                                                    <div class="tab-pane imgholder-big" id="pic-4"><img
                                                                src="<?= $product->getImages()[3]->getLocation(); ?>"/>
                                                    </div>
                                                    <div class="tab-pane imgholder-big" id="pic-5"><img
                                                                src="<?= $product->getImages()[4]->getLocation(); ?>"/>
                                                    </div>
                                                </div>
                                                <ul class="preview-thumbnail nav nav-tabs">
                                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                                                    class="imgholder-small"
                                                                    src="<?= $product->getImages()[0]->getLocation(); ?>"/></a>
                                                    </li>
                                                    <li><a data-target="#pic-2" data-toggle="tab"><img
                                                                    class="imgholder-small"
                                                                    src="<?= $product->getImages()[1]->getLocation(); ?>"/></a>
                                                    </li>
                                                    <li><a data-target="#pic-3" data-toggle="tab"><img
                                                                    class="imgholder-small"
                                                                    src="<?= $product->getImages()[2]->getLocation(); ?>"/></a>
                                                    </li>
                                                    <li><a data-target="#pic-4" data-toggle="tab"><img
                                                                    class="imgholder-small"
                                                                    src="<?= $product->getImages()[3]->getLocation(); ?>"/></a>
                                                    </li>
                                                    <li><a data-target="#pic-5" data-toggle="tab"><img
                                                                    class="imgholder-small"
                                                                    src="<?= $product->getImages()[4]->getLocation(); ?>"/></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Add to cart -->
                                        <div class="col-12 col-lg-6 add_to_cart_block">

                                            <?php if ($product->getDiscount()) {
                                                $sellingPrice = $product->getPrice() - ($product->getPrice() * ($product->getDiscount() / 100));
                                                ?>
                                                <p class="price">€<?= $sellingPrice * 1.21 ?></p>
                                                <p class="price_discounted">€<?= $product->getPrice() * 1.21 ?></p>
                                            <?php } else { ?>
                                                <p class="price">€<?= $product->getPrice() * 1.21 ?></p>
                                            <?php } ?>
                                            <form method="get" action="cart.html">
                                                <div class="form-group">
                                                    <label for="colors">Kleur</label>
                                                    <select class="custom-select" id="colors">
                                                        <option selected>Select</option>
                                                        <option value="1">Blauw</option>
                                                        <option value="2">Rood</option>
                                                        <option value="3">Groen</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Aantal</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <button type="button"
                                                                    class="quantity-left-minus btn btn-danger btn-number"
                                                                    data-type="minus" data-field="">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" class="form-control" id="quantity"
                                                               name="quantity"
                                                               min="1" max="100" value="1"
                                                               style="margin-bottom: 0 !important;">
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                    class="quantity-right-plus btn btn-success btn-number"
                                                                    data-type="plus" data-field="">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        onclick="addToCart('<?php echo BASEPATH . "cart"; ?>', '<?= $product->getID() ?>', '<?= $product->getName() ?>', $('#quantity').val())"
                                                        class="btn btn-success btn-lg btn-block text-uppercase">
                                                    <i class="fa fa-shopping-cart"></i> Toevoegen
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row custom-margin">
                            <!-- Description -->
                            <div class="col-12">
                                <div class="card border-light mb-3">
                                    <div class="card-header bg-primary text-white text-uppercase"><i
                                                class="fa fa-align-justify"></i> Omschrijving
                                    </div>
                                    <div class="card-body product-information-card">
                                        <?= $product->getDescription(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="row custom-margin">
                <div class="col-12">
                    <h3 class="partial-title" style="">Product niet gevonden</h3>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
