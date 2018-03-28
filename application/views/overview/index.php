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
                    <style>
                        .no-border {
                            border: none !important;
                            margin: 0 !important;
                            padding: 1px 7px !important;
                        }
                    </style>
                    <?php
                    loopCategories($this->AllRootCategories);
                    function loopCategories($categories)
                    {
                        foreach ($categories as $cat) {
                            echo "<ul class='list-group list-group-flush no-border'>";
                            echo "<li class='list-group-item no-border'><a href='/webshop/overview/?cat=" . $cat->getId() . "'>" . $cat->getId() . " - " . $cat->getName() . "</a></li>";
                            if ($cat->getChildren()) {
                                echo "<li class='list-group-item no-border'>";
                                loopCategories($cat->getChildren());
                                echo "</li>";
                            }
                            echo "</ul>";
                        }
                    }

                    ?>
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

        <!-- PRODUCTEN -->
        <div class="row" style="margin-top: 1rem">
            <?php
            if (isset($this->Products)) {
            foreach ($this->Products as $product) {
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="card h-100">
                        <?php
                        $images = $product->getImages();
                        if ($images) {
                            ?>
                            <a href="/webshop/product/?id=<?= $product->getID(); ?>"
                               style="height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="<?= $images[0]->getLocation(); ?>" alt="">
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="/webshop/product/?id=<?= $product->getID(); ?>"
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
                        <div class="card-body"<?php if ($product->getDiscount()) {
                            echo "style='margin-top:-10px!important'";
                        } ?>>

                            <h4 class="card-title">
                                <a href="/webshop/product/?id=<?= $product->getID(); ?>"><?= $product->getName(); ?></a>
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

                    if (isset($_GET['cat'])) {
                        $cat = "&cat=" . $_GET['cat'];
                    } else {
                        $cat = "";
                    }

                    if ($page <= 1) {

                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    } else {
                        $j = $page - 1;
                        echo "<li class='page-item'><a class='page-link' href='/webshop/overview/?page=1$cat' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/webshop/overview/?page=$j$cat' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i <> $page) {
                            echo "<li class='page-item'><a class='page-link' href='/webshop/overview/?page=$i$cat'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                    }

                    if ($page == $totalPages) {
                        echo "<li class='page-item disabled'><a class='page-link' href=''><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link'><i class='fas fa-angle-double-right'></i></a></li>";
                    } else {
                        $j = $page + 1;
                        echo "<li class='page-item'><a class='page-link' href='/webshop/overview/?page=$j$cat'><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/webshop/overview/?page=$totalPages$cat'><i class='fas fa-angle-double-right'></i></a></li>";
                    }


                }
                ?>
            </ul>
        </nav>
        <?php
        } else {
            echo "<div class='alert alert-danger col-md-6' style='margin-left: 15px;'>Geen producten gevonden.</div>";
        }
        ?>
    </div>


</div>