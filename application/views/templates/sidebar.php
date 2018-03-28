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