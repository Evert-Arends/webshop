<main role="main" id="categories" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categorieen</h1>
    </div>
    <div class="content-part">
        <div class="custom-margin">
            <div class="card">
                <div class="card-body">
                    <style>
                        .no-border {
                            border-bottom: none !important;
                            margin: 0 !important;
                            padding: 2px 0px 0 10px !important;
                            border-top: none;
                            border-left: 1px solid black;
                        }

                        .btn-sm {
                            margin-top: 3px !important;
                        }
                    </style>
                    <?php
                    echo 'Productcategorieen';
                    loopCategories($this->AllRootCategories);
                    function loopCategories($categories)
                    {
                        foreach ($categories as $cat) {
                            echo "<ul class='list-group list-group-flush no-border'>";
                            echo "<li class='list-group-item no-border'>";
                            echo $cat->getId() . " " . $cat->getName();
                            echo " <button type='button' class='editModalOpener btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal' data-id='" . $cat->getId() . "' data-name='" . $cat->getName() . "'>Bewerken</button>";
                            echo " <button type='button' class='deleteModalOpener btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal' data-id='" . $cat->getId() . "'>Verwijderen</button>";
                            echo "</li>";
                            if ($cat->getChildren()) {
                                echo "<li class='list-group-item no-border'>";
                                loopCategories($cat->getChildren());
                                echo "</li>";
                                echo "<li class='list-group-item no-border'><button type='button' class='createModalOpener btn btn-success btn-sm' data-toggle='modal' data-target='#createModal' data-id='" . $cat->getId() . "'>Nieuwe categorie</button></li>";
                            } else {
                                echo "<li class='list-group-item no-border'><button type='button' class='createModalOpener btn btn-success btn-sm' data-toggle='modal' data-target='#createModal' data-id='" . $cat->getId() . "'>Nieuwe categorie</button></li>";
                            }
                            echo "</ul>";
                        }
                    }

                    echo "<button type='button' class='createModalOpener btn btn-success btn-sm' data-toggle='modal' data-target='#createModal' data-id='" . NULL . "'>Nieuwe categorie</button>";
                    ?>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).on("click", ".editModalOpener", function () {
        var productId = $(this).data('id');
        var productName = $(this).data('name');
        $(".modal-body #CategoryId").val(productId);
        $(".modal-body #CategoryName").val(productName);
    });

    $(document).on("click", ".deleteModalOpener", function () {
        var productId = $(this).data('id');
        $(".modal-footer #CategoryId").val(productId);
    });

    $(document).on("click", ".createModalOpener", function () {
        var productId = $(this).data('id');
        $(".modal-body #CategoryId").val(productId);
    });
</script>

<!-- EditModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Categorie bewerken</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bewerk categorie naam.
                <form class="form form-outline" id="editCategory" name="editCategory" method="POST"
                      action="<?= BASEPATH ?>edit_category/">
                    <input type="hidden" name="edit_category" id="CategoryId" value=""/>

                    <input type="hidden" name="CategoryId" id="CategoryId" value=""/>
                    <input class="form-control" type="text" name="CategoryName" id="CategoryName" value=""/>
                    <button type="button" id="editCategoryBtn" name="editCategoryBtn"
                            class="btn btn-danger mt-1 form-control"
                            onclick="postForm('<?= BASEPATH ?>edit_category/', 'editCategory')">
                        Aanpassen
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
            </div>
        </div>
    </div>
</div>

<!-- DeleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product verwijderen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Als u de categorie verwijdert worden de categorien en producten die in deze categorie zitten
                ook verwijderd.

                Weet u zeker dat u de categorie wilt verwijderen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
                <form id="deleteCategory" name="deleteCategory" method="POST" action="<?= BASEPATH ?>edit_category/">
                    <input type="hidden" name="CategoryId" id="CategoryId" value=""/>
                    <input type="hidden" name="delete_category" id="CategoryId" value=""/>
                    <button type="button" id="deleteCategoryBtn" name="deleteCategoryBtn"
                            onclick="postForm('<?= BASEPATH ?>edit_category/', 'deleteCategory')"
                            class="btn btn-danger">
                        Verwijderen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CreateCategoryModal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nieuwe categorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Info!</strong> Indicates a neutral informative change or action.
                </div>
                Vul een categorienaam in.
                <form class="form form-outline" id="createCategory" name="createCategory" method="POST"
                      action="<?= BASEPATH ?>edit_category/">
                    <input type="hidden" name="create_category" id="CategoryId" value=""/>
                    <input class="form-control" type="text" name="name" id="CategoryName" value=""/>
                    Vul een categorie beschrijving in.
                    <input class="form-control" type="text" name="desc" id="CategoryDescription" value=""/>
                    <input type="hidden" name="parent" id="CategoryId" value="0"/>
                    <button type="button" id="createCategoryBtn" name="createCategoryBtn"
                            onclick="postForm('<?= BASEPATH ?>edit_category/', 'createCategory')"
                            class="btn btn-danger mt-1 form-control">
                        Opslaan
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleren</button>
            </div>
        </div>
    </div>
</div>

<script>
    function postForm(url, target) {
        if (target === "deleteCategory") {
            let data = $("#deleteCategory").serialize();
            $.post(url, data, function (returnData) {
                if (returnData === "success") {
                    location.reload();
                } else {
                    console.log(returnData + "dd");
                    alert(returnData);
                }
            });
        } else if (target === "createCategory") {
            let data = $("#createCategory").serialize();
            $.post(url, data, function (returnData) {
                if (returnData === "success") {
                    location.reload();
                } else {
                    console.log(returnData + "dd");
                    alert(returnData);
                }
            });
        } else if (target === "editCategory") {
            let data = $("#editCategory").serialize();
            $.post(url, data, function (returnData) {
                if (returnData === "success") {
                    location.reload();
                } else {
                    console.log(returnData + "dd");
                    alert(returnData);
                }
            });
        }
    }
</script>

<script src="<?= APPPATH ?>/assets/custom-js/crud_category.js"></script>
