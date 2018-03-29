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
                <h3 class="partial-title" style="">Contact</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem">
            <div class="col-12">
                <form id="contact-form" method="post" action="" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Voornaam *</label>
                                    <input id="form_name" type="text" name="name" class="form-control"
                                           placeholder="Uw voornaam"
                                           data-error="Voornaam is verplicht" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Achternaam *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control"
                                           placeholder="Uw achternaam"
                                           data-error="Achternaam is verplicht" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">E-mail *</label>
                                    <input id="form_email" type="email" name="email" class="form-control"
                                           placeholder="Uw e-mail adres"
                                           data-error="E-mail adres moet worden ingevuld" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone">Telefoonnummer</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control"
                                           placeholder="Uw telefoonnummer">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Bericht *</label>
                                    <textarea id="form_message" name="message" class="form-control"
                                              placeholder="Uw bericht" rows="4"
                                              data-error="Vul een bericht in." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Bericht versturen">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> Deze velden zijn verplicht
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
