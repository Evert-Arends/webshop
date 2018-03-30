<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 19-2-18
 * Time: 13:07
 */
?>

<div class="row">

    <?php $this->loadSnippet("sidebar_product"); ?>

    <!-- CONTENT -->
    <div class="col-xl-9 col-lg-12 col-md-12">
        <!-- HEADER -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Profiel</h3>
            </div>
        </div>

        <!-- Profile -->
        <div class="row" style="margin-top: 1rem;">
            <div class="col-12">
                <div class="jumbotron">
                    <h5>Profielgegevens</h5>
                    <ul>
                        <li><?= $this->user->first_name; ?></li>
                        <li><?= $this->user->last_name; ?></li>
                        <li><?php print_r($this->user); ?></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
