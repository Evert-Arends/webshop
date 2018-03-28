<main role="main" id="users" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Product bewerken</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/webshop/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Product bewerken</li>
            </ol>

            <?php
            if ($this->product) {
                foreach ($this->product as $product) { ?>
                    <!-- product editing -->
                    <div class="form-group row">
                        <label for="name" class="col-2 col-form-label">Productnaam</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $product->getName(); ?>" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-2 col-form-label">Omschrijving</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $product->getDescription(); ?>" id="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="manufacturer" class="col-2 col-form-label">Leverancier</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $product->getManufacturer(); ?>" id="manufacturer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-2 col-form-label">Categorie</label>
                        <div class="col-10">
                            <select class="form-control" id="category">
                                <?php
                                $category = $product->getCategory();
                                ?>
                                <option selected><?= $category->getName(); ?></option>
                                <?php
                                if ($this->allCategories) {
                                    foreach ($this->allCategories as $cat) { ?>
                                        ?>
                                        <option><?= $cat->getName(); ?></option>
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
                            <input class="form-control" type="number" value="<?= $product->getPrice(); ?>" step=".01" id="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sale" class="col-2 col-form-label">Korting</label>
                        <div class="col-10">
                            <input class="form-control" type="number" value="<?= $product->getDiscount(); ?>" id="sale">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark form-control">Veranderingen opslaan</button>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</main>