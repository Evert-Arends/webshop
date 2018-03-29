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

    <!-- PRODUCTS -->
    <div class="col-xl-9 col-lg-12 col-md-12">
        <!-- PRODUCTS ONE -->
        <div class="row custom-margin">
            <div class="col-12">
                <h3 class="partial-title" style="">Profiel</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem">
            <div class="d-flex flex-row mt-2">
                <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link active" data-toggle="tab" role="tab" aria-controls="profile">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a href="#favourites" class="nav-link" data-toggle="tab" role="tab"
                           aria-controls="favourites">Favorieten</a>
                    </li>
                    <li class="nav-item">
                        <a href="#orderhistory" class="nav-link" data-toggle="tab" role="tab"
                           aria-controls="orderhistory">Ordergeschiedenis</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <h1>Profiel</h1>

                        <p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in
                            in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat
                            dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra
                            dictum.</p>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh
                            ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere
                            facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien,
                            vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus
                            placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla
                            lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum
                            condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque
                            leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at
                            condimentum ac, luctus nec nulla.</p>
                    </div>

                    <div class="tab-pane fade" id="favourites" role="tabpanel">
                        <h1>Favorieten</h1>

                        <p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in
                            in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat
                            dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra
                            dictum.</p>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh
                            ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere
                            facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien,
                            vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus
                            placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla
                            lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum
                            condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque
                            leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at
                            condimentum ac, luctus nec nulla.</p>
                    </div>

                    <div class="tab-pane fade" id="orderhistory" role="tabpanel">
                        <h1>Ordergeschiedenis</h1>

                        <p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in
                            in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat
                            dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra
                            dictum.</p>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh
                            ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere
                            facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien,
                            vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus
                            placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla
                            lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum
                            condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque
                            leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at
                            condimentum ac, luctus nec nulla.</p>
                    </div>
                </div>
            </div>
            <style>
                .nav-tabs--vertical {
                    border-bottom: none;
                    border-right: 1px solid #ddd;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -ms-flex-flow: column nowrap;
                    flex-flow: column nowrap;
                }

                .nav-tabs--left {
                    margin: 0 15px;
                }

                .nav-tabs--left .nav-item + .nav-item {
                    margin-top: .25rem;
                }

                .nav-tabs--left .nav-link {
                    -webkit-transition: border-color .125s ease-in;
                    transition: border-color .125s ease-in;
                    white-space: nowrap;
                }

                .nav-tabs--left .nav-link:hover {
                    background-color: #f7f7f7;
                    border-color: transparent;
                }

                .nav-tabs--left .nav-link.active {
                    border-bottom-color: #ddd;
                    border-right-color: #fff;
                    border-bottom-left-radius: 0.25rem;
                    border-top-right-radius: 0;
                    margin-right: -1px;
                }

                .nav-tabs--left .nav-link.active:hover {
                    background-color: #fff;
                    border-color: #0275d8 #fff #0275d8 #0275d8;
                }
            </style>
        </div>
    </div>

</div>
