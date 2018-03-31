<main role="main" id="users" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Product bewerken</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>products">Producten</a>
                </li>
                <li class="breadcrumb-item active">Product bewerken</li>
            </ol>

            <?php
            if ($this->product) {
                foreach ($this->product as $product) { ?>
                    <!-- product editing -->
                    <form class="form form-outline" id="editProduct" name="editProduct" method="POST"
                          action="<?= BASEPATH ?>edit_product/">
                        <input required class="hidden" type="hidden" value="<?= $product->getId(); ?>" id="id"
                               name="id">
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Productnaam</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" value="<?= $product->getName(); ?>" id="name"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-2 col-form-label">Omschrijving</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" value="<?= $product->getDescription(); ?>"
                                       id="description" name="description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manufacturer" class="col-2 col-form-label">Leverancier</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" value="<?= $product->getManufacturer(); ?>"
                                       id="manufacturer" name="manufacturer">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-2 col-form-label">Categorie</label>
                            <div class="col-10">
                                <select class="form-control" id="category" name="category">
                                    <?php
                                    $category = $product->getCategory();
                                    ?>
                                    <option selected
                                            value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                                    <?php
                                    if ($this->allCategories) {
                                        foreach ($this->allCategories as $cat) { ?>
                                            ?>
                                            <option value="<?= $cat->getId(); ?>"><?= $cat->getName(); ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-2 col-form-label">Prijs (in euro's ex BTW)</label>
                            <div class="col-10">
                                <input required class="form-control" type="number" value="<?= $product->getPrice(); ?>"
                                       step=".01" id="price" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale" class="col-2 col-form-label">Korting</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="<?= $product->getDiscount(); ?>"
                                       id="sale" name="sale">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image1" class="col-2 col-form-label">Afbeelding #1</label>
                            <div class="col-10">
                                <input required class="form-control" type="url" placeholder="Afbeelding 1"
                                       id="image1" name="image1"
                                       value="<?= $product->getImages()[0]->getLocation(); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image2" class="col-2 col-form-label">Afbeelding #2</label>
                            <div class="col-10">
                                <input required class="form-control" type="url" placeholder="Afbeelding 2"
                                       id="image2" name="image2"
                                       value="<?= $product->getImages()[1]->getLocation(); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image3" class="col-2 col-form-label">Afbeelding #3</label>
                            <div class="col-10">
                                <input required class="form-control" type="url" placeholder="Afbeelding 3"
                                       id="image3" name="image3"
                                       value="<?= $product->getImages()[2]->getLocation(); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image4" class="col-2 col-form-label">Afbeelding #4</label>
                            <div class="col-10">
                                <input required class="form-control" type="url" placeholder="Afbeelding 4"
                                       id="image4" name="image4"
                                       value="<?= $product->getImages()[3]->getLocation(); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image5" class="col-2 col-form-label">Afbeelding #5</label>
                            <div class="col-10">
                                <input required class="form-control" type="url" placeholder="Afbeelding 5"
                                       id="image5" name="image5"
                                       value="<?= $product->getImages()[4]->getLocation(); ?>">
                            </div>
                        </div>

                        <input required class="hidden" type="hidden" value="<?= $product->getImages()[0]->getPhotoId() ?>" id="imgId1" name="imgId1">
                        <input required class="hidden" type="hidden" value="<?= $product->getImages()[1]->getPhotoId() ?>" id="imgId2" name="imgId2">
                        <input required class="hidden" type="hidden" value="<?= $product->getImages()[2]->getPhotoId() ?>" id="imgId3" name="imgId3">
                        <input required class="hidden" type="hidden" value="<?= $product->getImages()[3]->getPhotoId() ?>" id="imgId4" name="imgId4">
                        <input required class="hidden" type="hidden" value="<?= $product->getImages()[4]->getPhotoId() ?>" id="imgId5" name="imgId5">

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" id="editProductBtn" name="editProductBtn"
                                        class="btn btn-dark form-control">Veranderingen opslaan
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</main>