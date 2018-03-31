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
                <li class="breadcrumb-item active">Nieuw product</li>
            </ol>
            <!-- product editing -->
            <form class="form form-outline" id="createProduct" name="createProduct" method="POST"
                  action="<?= BASEPATH ?>create_product/">
                <div class="form-group row">
                    <label for="name" class="col-2 col-form-label">Productnaam</label>
                    <div class="col-10">
                        <input required class="form-control" type="text" placeholder="Productnaam" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-2 col-form-label">Omschrijving</label>
                    <div class="col-10">
                        <input required class="form-control" type="text" placeholder="Omschrijving" id="description"
                               name="description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="manufacturer" class="col-2 col-form-label">Leverancier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Leverancier" id="manufacturer"
                               name="manufacturer">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-2 col-form-label">Categorie</label>
                    <div class="col-10">
                        <select class="form-control" id="category" name="category">
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
                        <input required class="form-control" type="number" placeholder="Prijs"
                               step=".01" id="price" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sale" class="col-2 col-form-label">Korting</label>
                    <div class="col-10">
                        <input class="form-control" type="number" placeholder="Korting"
                               id="sale" name="sale">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image1" class="col-2 col-form-label">Afbeelding #1</label>
                    <div class="col-10">
                        <input required class="form-control" type="url" placeholder="Afbeelding 1"
                               id="image1" name="image1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image2" class="col-2 col-form-label">Afbeelding #2</label>
                    <div class="col-10">
                        <input required class="form-control" type="url" placeholder="Afbeelding 2"
                               id="image2" name="image2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image3" class="col-2 col-form-label">Afbeelding #3</label>
                    <div class="col-10">
                        <input required class="form-control" type="url" placeholder="Afbeelding 3"
                               id="image3" name="image3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image4" class="col-2 col-form-label">Afbeelding #4</label>
                    <div class="col-10">
                        <input required class="form-control" type="url" placeholder="Afbeelding 4"
                               id="image4" name="image4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image5" class="col-2 col-form-label">Afbeelding #5</label>
                    <div class="col-10">
                        <input required class="form-control" type="url" placeholder="Afbeelding 5"
                               id="image5" name="image5">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" id="createProductBtn" name="createProductBtn"
                                class="btn btn-dark form-control">Product opslaan
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>