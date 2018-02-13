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

        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Productnaam</h3>
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
                                                            src="http://via.placeholder.com/200x126/34568"/></a></li>
                                            <li><a data-target="#pic-2" data-toggle="tab"><img
                                                            src="http://via.placeholder.com/200x126/62201"/></a></li>
                                            <li><a data-target="#pic-3" data-toggle="tab"><img
                                                            src="http://via.placeholder.com/200x126/10378"/></a></li>
                                            <li><a data-target="#pic-4" data-toggle="tab"><img
                                                            src="http://via.placeholder.com/200x126/99574"/></a></li>
                                            <li><a data-target="#pic-5" data-toggle="tab"><img
                                                            src="http://via.placeholder.com/200x126/12345"/></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Add to cart -->
                                <div class="col-12 col-lg-6 add_to_cart_block">

                                    <p class="price">99.00 $</p>
                                    <p class="price_discounted">149.90 $</p>
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
                                                <input type="text" class="form-control" id="quantity" name="quantity"
                                                       min="1" max="100" value="1">
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
                                <p class="card-text">
                                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise
                                    en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie
                                    depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de
                                    texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que
                                    survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans
                                    que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à
                                    la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus
                                    récemment, par son inclusion dans des applications de mise en page de texte, comme
                                    Aldus PageMaker.
                                </p>
                                <p class="card-text">
                                    Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte
                                    aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique
                                    datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du
                                    Hampden-Sydney College, en Virginie, s'est intéressé à un des mots latins les plus
                                    obscurs, consectetur, extrait d'un passage du Lorem Ipsum, et en étudiant tous les
                                    usages de ce mot dans la littérature classique, découvrit la source incontestable du
                                    Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du "De Finibus
                                    Bonorum et Malorum" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet
                                    ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de
                                    l'éthique. Les premières lignes du Lorem Ipsum, "Lorem ipsum dolor sit amet...",
                                    proviennent de la section 1.10.32.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row custom-margin">
                    <!-- Reviews -->
                    <div class="col-12" id="reviews">
                        <div class="card border-light mb-3">
                            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i>
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

    </div>

</div>
