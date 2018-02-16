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
    <div class="col-lg-3 col-md-3 sidebar" style="border-right: 1px solid #215678; margin-top: 1.5rem;">
        <h3 class="partial-title" style="">Categorieen</h3>
        <div class="custom-margin">
            <div class="card">
                <div class="card-body">
                    <ul>
                    <?php
                    //WIP!!-> getChildren not working in backend.
                    foreach ($this->AllRootCategories as $cat) {
                        echo "<li>" . $cat->getId() . " - " . $cat->getName() . "</li>";
                        echo "<ul>";
                        foreach ($cat->getChildren() as $child) {
                            echo "<li>" . $child->getId() . " - " . $child->getName() . "</li>";
                            echo "<ul>";
                            //print_r($child);
                            foreach ($child->getChildren() as $subchild) {
                                echo "<li>" . $subchild->getId() . " - " . $subchild->getName() . "</li>";
                                echo "<ul>";
                                foreach ($subchild->getChildren() as $ssc) {
                                    echo "<li>" . $ssc->getId() . " - " . $ssc->getName() . "</li>";
                                }
                                echo "</ul>";
                                //print_r($child);
                            }
                            echo "</ul>";
                        }
                        echo "</ul>";
                    }
                    ?>
                </ul>
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
                                <h5 style="text-decoration: line-through;">€<?= $product->getPrice() * 1.21; ?></h5>

                                <?php
                                $sellingPrice = $product->getPrice() - ($product->getPrice() * ($product->getDiscount() / 100));
                                ?>

                                <h5 class="font-weight-bold">€<?= $sellingPrice * 1.21 ?></h5>

                                <?php
                            } else {
                                ?>
                                <h5>€<?= $product->getPrice() * 1.21; ?></h5>
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
                                <h5 style="text-decoration: line-through;">€<?= $product->getPrice() * 1.21; ?></h5>

                                <?php
                                $sellingPrice = $product->getPrice() - ($product->getPrice() * ($product->getDiscount() / 100));
                                ?>

                                <h5 class="font-weight-bold">€<?= $sellingPrice * 1.21 ?></h5>

                                <?php
                            } else {
                                ?>
                                <h5>€<?= $product->getPrice() * 1.21; ?></h5>
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
