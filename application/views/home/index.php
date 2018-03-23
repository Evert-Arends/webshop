<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 9-2-18
 * Time: 12:25
 */
?>

<div class="row">

    <!-- SIDEBAR -->
    <div class="col-lg-3 col-md-3" style="border-right: 1px solid #215678; margin-top: 1.5rem;">
        <h3 class="partial-title" style="">Categorieen</h3>
        <div class="custom-margin">
            <div class="card">
                <div class="card-body">
<!--                    --><?php
//                    loopCategories($this->AllRootCategories);
//                    function loopCategories($categories)
//                    {
//                        foreach ($categories as $cat) {
//                            echo "<ul class='list-group list-group-flush'>";
//                            echo "<li class='list-group-item' style='padding: 0 1.25rem;'>" . $cat->getId() . " - " . $cat->getName() . "</li>";
//                            if ($cat->getChildren()) {
//                                echo "<li class='list-group-item' style='padding: 0 1.25rem;'>";
//                                loopCategories($cat->getChildren());
//                                echo "</li>";
//                            }
//                            echo "</ul>";
//                        }
//                    }
//
//                    ?>

<!--                    <link href="--><?//= APPPATH?><!--/assets/css/sidebar.css" rel="stylesheet">-->

                    <div class="just-padding">

                        <div class="list-group list-group-root well">

                            <a href="#item-1" class="list-group-item" data-toggle="collapse">
                                <i class="glyphicon glyphicon-chevron-right"></i>Item 1
                            </a>
                            <div class="list-group collapse" id="item-1">

                                <a href="#item-1-1" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 1.1
                                </a>
                                <div class="list-group collapse" id="item-1-1">
                                    <a href="#" class="list-group-item">Item 1.1.1</a>
                                    <a href="#" class="list-group-item">Item 1.1.2</a>
                                    <a href="#" class="list-group-item">Item 1.1.3</a>
                                </div>

                                <a href="#item-1-2" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 1.2
                                </a>
                                <div class="list-group collapse" id="item-1-2">
                                    <a href="#" class="list-group-item">Item 1.2.1</a>
                                    <a href="#" class="list-group-item">Item 1.2.2</a>
                                    <a href="#" class="list-group-item">Item 1.2.3</a>
                                </div>

                                <a href="#item-1-3" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 1.3
                                </a>
                                <div class="list-group collapse" id="item-1-3">
                                    <a href="#" class="list-group-item">Item 1.3.1</a>
                                    <a href="#" class="list-group-item">Item 1.3.2</a>
                                    <a href="#" class="list-group-item">Item 1.3.3</a>
                                </div>

                            </div>

                            <a href="#item-2" class="list-group-item" data-toggle="collapse">
                                <i class="glyphicon glyphicon-chevron-right"></i>Item 2
                            </a>
                            <div class="list-group collapse" id="item-2">

                                <a href="#item-2-1" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 2.1
                                </a>
                                <div class="list-group collapse" id="item-2-1">
                                    <a href="#" class="list-group-item">Item 2.1.1</a>
                                    <a href="#" class="list-group-item">Item 2.1.2</a>
                                    <a href="#" class="list-group-item">Item 2.1.3</a>
                                </div>

                                <a href="#item-2-2" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 2.2
                                </a>
                                <div class="list-group collapse" id="item-2-2">
                                    <a href="#" class="list-group-item">Item 2.2.1</a>
                                    <a href="#" class="list-group-item">Item 2.2.2</a>
                                    <a href="#" class="list-group-item">Item 2.2.3</a>
                                </div>

                                <a href="#item-2-3" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 2.3
                                </a>
                                <div class="list-group collapse" id="item-2-3">
                                    <a href="#" class="list-group-item">Item 2.3.1</a>
                                    <a href="#" class="list-group-item">Item 2.3.2</a>
                                    <a href="#" class="list-group-item">Item 2.3.3</a>
                                </div>

                            </div>


                            <a href="#item-3" class="list-group-item" data-toggle="collapse">
                                <i class="glyphicon glyphicon-chevron-right"></i>Item 3
                            </a>
                            <div class="list-group collapse" id="item-3">

                                <a href="#item-3-1" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 3.1
                                </a>
                                <div class="list-group collapse" id="item-3-1">
                                    <a href="#" class="list-group-item">Item 3.1.1</a>
                                    <a href="#" class="list-group-item">Item 3.1.2</a>
                                    <a href="#" class="list-group-item">Item 3.1.3</a>
                                </div>

                                <a href="#item-3-2" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 3.2
                                </a>
                                <div class="list-group collapse" id="item-3-2">
                                    <a href="#" class="list-group-item">Item 3.2.1</a>
                                    <a href="#" class="list-group-item">Item 3.2.2</a>
                                    <a href="#" class="list-group-item">Item 3.2.3</a>
                                </div>

                                <a href="#item-3-3" class="list-group-item" data-toggle="collapse">
                                    <i class="glyphicon glyphicon-chevron-right"></i>Item 3.3
                                </a>
                                <div class="list-group collapse" id="item-3-3">
                                    <a href="#" class="list-group-item">Item 3.3.1</a>
                                    <a href="#" class="list-group-item">Item 3.3.2</a>
                                    <a href="#" class="list-group-item">Item 3.3.3</a>
                                </div>

                            </div>

                        </div>

                    </div>
                    <script>
                        $(function() {

                            $('.list-group-item').on('click', function() {
                                $('.glyphicon', this)
                                    .toggleClass('glyphicon-chevron-right')
                                    .toggleClass('glyphicon-chevron-down');
                            });

                        });
                    </script>
                    <style>
                        .just-padding {
                            padding: 15px;
                        }

                        .list-group.list-group-root {
                            padding: 0;
                            overflow: hidden;
                        }

                        .list-group.list-group-root .list-group {
                            margin-bottom: 0;
                        }

                        .list-group.list-group-root .list-group-item {
                            border-radius: 0;
                            border-width: 1px 0 0 0;
                        }

                        .list-group.list-group-root > .list-group-item:first-child {
                            border-top-width: 0;
                        }

                        .list-group.list-group-root > .list-group > .list-group-item {
                            padding-left: 30px;
                        }

                        .list-group.list-group-root > .list-group > .list-group > .list-group-item {
                            padding-left: 45px;
                        }

                        .list-group-item .glyphicon {
                            margin-right: 5px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">

        <!-- PRODUCTS ONE -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Aanbiedingen</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem">
            <?php
            foreach ($this->DiscountProducts as $product) {
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="<?= $product->getPhoto(); ?>" alt=""></a>
                        <?php
                        if ($product->getDiscount()) {
                            ?>
                            <h1><span class="badge badge-danger deal-badge"><?= $product->getDiscount() ?>%</span></h1>
                            <?php
                        }
                        ?>
                        <div class="card-body">

                            <h4 class="card-title">
                                <a href="#"><?= $product->getName(); ?></a>
                            </h4>

                            <?php
                            if ($product->getDiscount()) {
                                ?>
                                <h5 style="text-decoration: line-through;">€<?= $product->getPrice(); ?></h5>

                                <?php
                                $sellingPrice = $product->getPrice() - ($product->getPrice() * ($product->getDiscount() / 100));
                                ?>

                                <h5 class="font-weight-bold">€<?= $sellingPrice ?></h5>

                                <?php
                            } else {
                                ?>
                                <h5>€<?= $product->getPrice(); ?></h5>
                            <?php } ?>

                            <p class="card-text">
                                <?= $string = strlen($product->getDescription()) > 100 ? substr($product->getDescription(), 0, 30) . "... " : $product->getDescription(); ?>
                            </p>
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
                <?php
            }
            ?>
        </div>

        <!-- PRODUCTS TWO -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Uitgelicht</h3>

            </div>
        </div>

        <div class="row custom-margin">
            <?php
            foreach ($this->RandomProducts as $product) {
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="<?= $product->getPhoto(); ?>" alt=""></a>
                        <?php
                        if ($product->getDiscount()) {
                            ?>
                            <h1><span class="badge badge-danger deal-badge"><?= $product->getDiscount() ?>%</span></h1>
                            <?php
                        }
                        ?>
                        <div class="card-body">

                            <h4 class="card-title">
                                <a href="#"><?= $product->getName(); ?></a>
                            </h4>

                            <?php
                            if ($product->getDiscount()) {
                                ?>
                                <h5 style="text-decoration: line-through;">€<?= $product->getPrice(); ?></h5>

                                <?php
                                $sellingPrice = $product->getPrice() - ($product->getPrice() * ($product->getDiscount() / 100));
                                ?>

                                <h5 class="font-weight-bold">€<?= $sellingPrice ?></h5>

                                <?php
                            } else {
                                ?>
                                <h5>€<?= $product->getPrice(); ?></h5>
                            <?php } ?>

                            <p class="card-text">
                                <?= $string = strlen($product->getDescription()) > 100 ? substr($product->getDescription(), 0, 30) . "... " : $product->getDescription(); ?>
                            </p>
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
                <?php
            }
            ?>
        </div>

    </div>


</div>
