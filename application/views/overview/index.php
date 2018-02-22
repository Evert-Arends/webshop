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
        <h3 class="partial-title" style="">Categorieen</h3>
        <div class="custom-margin">
            <div class="card">
                <div class="card-body">

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
                        <a href="#"><img class="card-img-top" src="<?= $product->getPhoto(); ?>" alt=""></a>
                        <?php
                        if ($product->getDiscount()) {
                            ?>
                            <h1><span class="badge badge-danger deal-badge"><?= $product->getDiscount() ?>%</span></h1>
                            <?php
                        }
                        ?>
                        <div class="card-body"<?php if ($product->getDiscount()) {
                            echo "style='margin-top:-10px!important'";
                        } ?>>

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

        <!-- PAGINATION-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php

                $page = $this->pageNumber;

                if (isset($page)) {
                    $rs = $this->productCount;
                    $total = $rs->Total;
                    $perpage = 16;
                    $totalPages = ceil($total / $perpage);

                    if ($page <= 1) {

                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    } else {
                        $j = $page - 1;
                        echo "<li class='page-item'><a class='page-link' href='/webshop/index/overview/page/1/' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/webshop/index/overview/page/$j/' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i <> $page) {
                            echo "<li class='page-item'><a class='page-link' href='/webshop/index/overview/page/$i/'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                    }

                    if ($page == $totalPages) {
                        echo "<li class='page-item disabled'><a class='page-link' href=''><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link'><i class='fas fa-angle-double-right'></i></a></li>";
                    } else {
                        $j = $page + 1;
                        echo "<li class='page-item'><a class='page-link' href='/webshop/index/overview/page/$j/'><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/webshop/index/overview/page/$totalPages/'><i class='fas fa-angle-double-right'></i></a></li>";
                    }


                }
                ?>
            </ul>
        </nav>
    </div>


</div>