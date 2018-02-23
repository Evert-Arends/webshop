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
    <div class="col-lg-3 col-md-3 sidebar" style="border-right: 1px solid #215678; margin-top: 1.5rem;">
        <h3 class="partial-title" style="">Uitgelicht</h3>
        <div class="custom-margin">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Item Four</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                        numquam
                        aspernatur!</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="reviews_product col-10">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="col-2">
                            <button class="btn heart-button float-right"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        <?php foreach ($this->product as $product) { ?>
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
                                            <div class="preview-pic tab-content">
                                                <div class="tab-pane active" id="pic-1"><img
                                                            src="http://via.placeholder.com/400x252/34568"/></div>
                                                <div class="tab-pane" id="pic-2"><img
                                                            src="http://via.placeholder.com/400x252/62201"/></div>
                                                <div class="tab-pane" id="pic-3"><img
                                                            src="http://via.placeholder.com/400x252/10378"/></div>
                                                <div class="tab-pane" id="pic-4"><img
                                                            src="http://via.placeholder.com/400x252/99574"/></div>
                                                <div class="tab-pane" id="pic-5"><img
                                                            src="http://via.placeholder.com/400x252/12345"/></div>
                                            </div>
                                            <ul class="preview-thumbnail nav nav-tabs">
                                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                                                src="http://via.placeholder.com/200x126/34568"/></a>
                                                </li>
                                                <li><a data-target="#pic-2" data-toggle="tab"><img
                                                                src="http://via.placeholder.com/200x126/62201"/></a>
                                                </li>
                                                <li><a data-target="#pic-3" data-toggle="tab"><img
                                                                src="http://via.placeholder.com/200x126/10378"/></a>
                                                </li>
                                                <li><a data-target="#pic-4" data-toggle="tab"><img
                                                                src="http://via.placeholder.com/200x126/99574"/></a>
                                                </li>
                                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                                                src="http://via.placeholder.com/200x126/12345"/></a>
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
                                                    <option value="1">Blue</option>
                                                    <option value="2">Red</option>
                                                    <option value="3">Green</option>
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
                                            <a href="cart.html" class="btn btn-success btn-lg btn-block text-uppercase">
                                                <i class="fa fa-shopping-cart"></i> Toevoegen
                                            </a>
                                        </form>
                                        <div class="reviews_product p-3 mb-2 ">
                                            3 reviews
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <a class="pull-right" href="#reviews">Bekijk alle beoordelingen</a>
                                        </div>
                                        <div class="datasheet p-3 mb-2 bg-info text-white">
                                            <a href="" class="text-white"><i class="fa fa-file"></i> Download
                                                productgegevens</a>
                                        </div>
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
                    <div class="row custom-margin">
                        <!-- Reviews -->
                        <div class="col-12" id="reviews">
                            <div class="card border-light mb-3">
                                <div class="card-header bg-primary text-white text-uppercase"><i
                                            class="fa fa-comment"></i>
                                    Beoordelingen
                                </div>
                                <div class="card-body product-information-card">
                                    <div class="review">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        <meta itemprop="datePublished" content="01-01-2016">
                                        January 01, 2018

                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        by Paul Smith
                                        <p class="blockquote">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                            posuere erat a ante.</p>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="review">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        <meta itemprop="datePublished" content="01-01-2016">
                                        January 01, 2018

                                        <span class="fa fa-star" aria-hidden="true"></span>
                                        <span class="fa fa-star" aria-hidden="true"></span>
                                        <span class="fa fa-star" aria-hidden="true"></span>
                                        <span class="fa fa-star" aria-hidden="true"></span>
                                        <span class="fa fa-star" aria-hidden="true"></span>
                                        by Paul Smith
                                        <p class="blockquote">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                            posuere erat a ante.</p>
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>

    </div>

</div>
