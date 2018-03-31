<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 9-2-18
 * Time: 12:25
 */
?>

<div class="row">

    <?php $this->loadSnippet("sidebar"); ?>

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

                        <?php
                        $images = $product->getImages();
                        if ($images) {
                            ?>
                            <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"
                               style="height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="<?= $images[0]->getLocation(); ?>" alt="">
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"
                               style="height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="<?php echo APPPATH ?>assets/images/notfound.png"
                                     alt="">
                            </a>
                            <?php
                        }
                        ?>

                        <?php
                        if ($product->getDiscount()) {
                            ?>
                            <h1><span class="badge badge-danger deal-badge"><?= $product->getDiscount() ?>%</span></h1>
                            <?php
                        }
                        ?>
                        <div class="card-body">

                            <h4 class="card-title">
                                <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"><?= $product->getName(); ?></a>
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
                                <div class="reviews_product col-10"></div>
                                <div class="col-2">
                                    <button class="btn heart-button float-right"
                                            onclick="addToCart('<?php echo BASEPATH . "cart"; ?>', '<?= $product->getID() ?>', '<?= $product->getName() ?>', '1')">
                                        <i class="fa fa-cart-plus"></i>
                                    </button>
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

                        <?php
                        $images = $product->getImages();
                        if ($images) {
                            ?>
                            <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"
                               style="height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="<?= $images[0]->getLocation(); ?>" alt="">
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"
                               style="height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="<?php echo APPPATH ?>assets/images/notfound.png"
                                     alt="">
                            </a>
                            <?php
                        }
                        ?>

                        <?php
                        if ($product->getDiscount()) {
                            ?>
                            <h1><span class="badge badge-danger deal-badge"><?= $product->getDiscount() ?>%</span>
                            </h1>
                            <?php
                        }
                        ?>
                        <div class="card-body">

                            <h4 class="card-title">
                                <a href="<?= BASEPATH ?>product/?id=<?= $product->getID(); ?>"><?= $product->getName(); ?></a>
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
                                <div class="reviews_product col-10"></div>
                                <div class="col-2">
                                    <button class="btn heart-button float-right"
                                            onclick="addToCart('<?php echo BASEPATH . "cart"; ?>', '<?= $product->getID() ?>', '<?= $product->getName() ?>', '1')">
                                        <i class="fa fa-cart-plus"></i></button>
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
