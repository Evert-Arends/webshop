</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="<?= APPPATH ?>/assets/custom-js/login.js"></script>
<script src="<?= APPPATH ?>/assets/custom-js/cart.js"></script>
<script src="<?= APPPATH ?>/assets/custom-js/register.js"></script>

<!-- FOOTER -->
<footer class="py-5 bg-dark mt-3">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="d-block mb-2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                </svg>
                <small class="d-block mb-3 text-muted">&copy; BitHopper 2018</small>
            </div>
            <div class="col-6 col-md">
                <h5>Pagina's</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="<?= BASEPATH ?>">Home</a></li>
                    <li><a class="text-muted" href="<?= BASEPATH ?>overview">Producten</a></li>
                    <li><a class="text-muted" href="<?= BASEPATH ?>contact">Contact</a></li>
                    <li><a class="text-muted" href="<?= BASEPATH ?>cart">Winkelwagen</a></li>
                </ul>
            </div>
            <?php
            $userIsLoggedIn = $this->request->User->isAuthenticated;
            if ($userIsLoggedIn) {
                ?>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="<?= BASEPATH ?>profile">Account</a></li>
                        <li><a class="text-muted" href="<?= BASEPATH ?>logout">Uitloggen</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</footer>

</body>

</html>
