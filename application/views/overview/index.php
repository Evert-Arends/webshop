<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 10:52
 */
?>

<div class="row">
    <?php $this->loadSnippet("sidebar"); ?>

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">

        <!-- PAGE HEADER -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Producten</h3>
            </div>
            <div class="col-12">
                <form method="GET" class="form form-inline">
                    <input type="search" name="q" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Zoeken..."/>
                    <?php
                    if (!empty($this->request->get["cat"])) {
                        ?>
                        <input type="search" hidden name="cat"
                               value="<?php echo !empty($this->request->get["cat"]) ? htmlspecialchars($this->request->get["cat"]) : ''; ?>"/>
                        <?php
                    }
                    if (!empty($this->request->get["page"])) {
                        ?>
                        <input type="search" hidden name="page"
                               value="<?php echo !empty($this->request->get["page"]) ? htmlspecialchars($this->request->get["page"]) : ''; ?>"/>
                        <?php
                    }
                    ?>
                    <input type="submit" class="form-control btn btn-primary" value="Zoeken"/>
                </form>
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
                    $total = $this->productCount;
                    $perpage = 16;
                    $totalPages = ceil($total / $perpage);

                    $cat = $this->checkUrlParameter("cat");
                    $search = $this->checkUrlParameter("q");

                    $basePath = BASEPATH . "overview";

                    if ($page <= 1) {

                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    } else {
                        $j = $page - 1;
                        echo "<li class='page-item'><a class='page-link' href='" . $basePath . "?page=1$cat$search' tabindex='-2'><i class='fas fa-angle-double-left'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='" . $basePath . "?page=$j$cat$search' tabindex='-1'><i class='fas fa-angle-left'></i></a></li>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i <> $page) {
                            echo "<li class='page-item'><a class='page-link' href='" . $basePath . "?page=$i$cat$search'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                    }

                    if ($page == $totalPages) {
                        echo "<li class='page-item disabled'><a class='page-link' href=''><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item disabled'><a class='page-link'><i class='fas fa-angle-double-right'></i></a></li>";
                    } else {
                        $j = $page + 1;
                        echo "<li class='page-item'><a class='page-link' href='" . $basePath . "?page=$j$cat$search'><i class='fas fa-angle-right'></i></a></li>";
                        echo "<li class='page-item'><a class='page-link' href='" . $basePath . "?page=$totalPages$cat$search'><i class='fas fa-angle-double-right'></i></a></li>";
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