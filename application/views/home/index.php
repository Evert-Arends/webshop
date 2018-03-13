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
                <div class="card-body sidebar">
                    <!--                    --><?php
                    //                    loopCategories($this->AllRootCategories);
                    //                    function loopCategories($categories)
                    //                    {
                    //                        foreach ($categories as $cat) {
                    //                            echo "<ul>";
                    //                            echo "<li>" . $cat->getId() . " - " . $cat->getName() . "</li>";
                    //                            if ($cat->getChildren()) {
                    //                                loopCategories($cat->getChildren());
                    //                            }
                    //                            echo "</ul>";
                    //                        }
                    //                    }
                    //
                    //                    ?>


                    <ul class="list-sidebar bg-defoult">
                        <li><a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i
                                        class="fa fa-th-large"></i> <span class="nav-label"> Dashboards </span> <span
                                        class="fa fa-chevron-left pull-right"></span> </a>
                            <ul class="sub-menu collapse" id="dashboard">
                                <li class="active"><a href="#">CSS3 Animation</a></li>
                                <li><a href="#">General</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Tabs & Accordions</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">FontAwesome</a></li>
                                <li><a href="#">Slider</a></li>
                                <li><a href="#">Panels</a></li>
                                <li><a href="#">Widgets</a></li>
                                <li><a href="#">Bootstrap Model</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a></li>
                        <li><a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i
                                        class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span> <span
                                        class="fa fa-chevron-left pull-right"></span> </a>
                            <ul class="sub-menu collapse" id="products">
                                <li class="active"><a href="#">CSS3 Animation</a></li>
                                <li><a href="#">General</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Tabs & Accordions</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">FontAwesome</a></li>
                                <li><a href="#">Slider</a></li>
                                <li><a href="#">Panels</a></li>
                                <li><a href="#">Widgets</a></li>
                                <li><a href="#">Bootstrap Model</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                        </li>
                        <li><a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i
                                        class="fa fa-table"></i> <span class="nav-label">Tables</span><span
                                        class="fa fa-chevron-left pull-right"></span></a>
                            <ul class="sub-menu collapse" id="tables">
                                <li><a href=""> Static Tables</a></li>
                                <li><a href=""> Data Tables</a></li>
                                <li><a href=""> Foo Tables</a></li>
                                <li><a href=""> jqGrid</a></li>
                            </ul>
                        </li>
                        <li><a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i
                                        class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span
                                        class="fa fa-chevron-left pull-right"></span></a>
                            <ul class="sub-menu collapse" id="e-commerce">
                                <li><a href=""> Products grid</a></li>
                                <li><a href=""> Products list</a></li>
                                <li><a href="">Product edit</a></li>
                                <li><a href=""> Product detail</a></li>
                                <li><a href="">Cart</a></li>
                                <li><a href=""> Orders</a></li>
                                <li><a href=""> Credit Card form</a></li>
                            </ul>
                        </li>
                        <li><a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span> </a></li>
                        <li><a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a>
                        </li>
                    </ul>

                    <style>

                        a {
                            background-color: transparent;
                            text-decoration: none;
                        }

                        a:active, a:hover {
                            outline: 0;
                        }

                        /***********************  TOP Bar ********************/
                        .sidebar {
                            transition: all 0.5s ease-in-out;
                        }

                        .bg-defoult {
                            background-color: #222;
                        }

                        .sidebar ul {
                            list-style: none;
                            margin: 0px;
                            padding: 0px;
                        }

                        .sidebar li a, .sidebar li a.collapsed.active {
                            display: block;
                            padding: 8px 12px;
                            color: #fff;
                            border-left: 0px solid #dedede;
                            text-decoration: none
                        }

                        .sidebar li a.active {
                            background-color: #000;
                            border-left: 5px solid #dedede;
                            transition: all 0.5s ease-in-out
                        }

                        .sidebar li a:hover {
                            background-color: #000 !important;
                        }

                        .sidebar li a i {
                            padding-right: 5px;
                        }

                        .sidebar ul li .sub-menu li a {
                            position: relative
                        }

                        .sidebar ul li .sub-menu li a:before {
                            font-family: FontAwesome;
                            content: "\f105";
                            display: inline-block;
                            padding-left: 0px;
                            padding-right: 10px;
                            vertical-align: middle;
                        }

                        .sidebar ul li .sub-menu li a:hover:after {
                            content: "";
                            position: absolute;
                            left: -5px;
                            top: 0;
                            width: 5px;
                            background-color: #111;
                            height: 100%;
                        }

                        .sidebar ul li .sub-menu li a:hover {
                            background-color: #222;
                            padding-left: 20px;
                            transition: all 0.5s ease-in-out
                        }

                        .sub-menu {
                            border-left: 5px solid #dedede;
                        }

                        .sidebar li a .nav-label, .sidebar li a .nav-label + span {
                            transition: all 0.5s ease-in-out
                        }

                        .sidebar.fliph li a .nav-label, .sidebar.fliph li a .nav-label + span {
                            display: none;
                            transition: all 0.5s ease-in-out
                        }

                        .sidebar.fliph {
                            width: 42px;
                            transition: all 0.5s ease-in-out;

                        }

                        .sidebar.fliph li {
                            position: relative
                        }

                        .sidebar.fliph .sub-menu {
                            position: absolute;
                            left: 39px;
                            top: 0;
                            background-color: #222;
                            width: 150px;
                            z-index: 100;
                        }

                    </style>
                    <script>
                        $(document).ready(function () {
                            $('button').click(function () {
                                $('.sidebar').toggleClass('fliph');
                            });


                        });
                    </script>


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
