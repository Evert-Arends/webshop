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

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">

        <!-- PAGE HEADER -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Producten</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem">
            <?php
            foreach ($this->Products as $product) {
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="card h-100">
                        <h1><span class="badge badge-danger deal-badge">50%</span></h1>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?= $product->getName(); ?></a>
                            </h4>
                            <h5><?= $product->getPrice(); ?></h5>
                            <p class="card-text">
                                <?= $string = strlen($product->getDescription()) > 100 ? substr($product->getDescription(), 0, 100) . "... " : $product->getDescription(); ?>
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


            <!--            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">-->
            <!--                <div class="card h-100">-->
            <!--                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>-->
            <!--                    <div class="card-body">-->
            <!--                        <h4 class="card-title">-->
            <!--                            <a href="#">Item One</a>-->
            <!--                        </h4>-->
            <!--                        <h5>$24.99</h5>-->
            <!--                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet-->
            <!--                            numquam-->
            <!--                            aspernatur!</p>-->
            <!--                    </div>-->
            <!--                    <div class="card-footer">-->
            <!--                        <div class="row">-->
            <!--                            <div class="reviews_product col-10">-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="far fa-star"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-2">-->
            <!--                                <button class="btn heart-button float-right"><i class="far fa-heart"></i></button>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            -->
            <!--            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">-->
            <!--                <div class="card h-100">-->
            <!--                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>-->
            <!--                    <h1><span class="badge badge-danger deal-badge">50%</span></h1>-->
            <!--                    <div class="card-body">-->
            <!--                        <h4 class="card-title">-->
            <!--                            <a href="#">Item Two</a>-->
            <!--                        </h4>-->
            <!--                        <h5>$24.99</h5>-->
            <!--                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet-->
            <!--                            numquam-->
            <!--                            aspernatur!</p>-->
            <!--                    </div>-->
            <!--                    <div class="card-footer">-->
            <!--                        <div class="row">-->
            <!--                            <div class="reviews_product col-10">-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="fa fa-star"></i>-->
            <!--                                <i class="far fa-star"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-2">-->
            <!--                                <button class="btn heart-button float-right"><i class="far fa-heart"></i></button>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

        </div>

    </div>

</div>
