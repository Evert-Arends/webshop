<main role="main" id="dashboard" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="content-part">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">Ordergeschiedenis</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= BASEPATH ?>orders">
                        <span class="float-left">Bekijk ordergeschiedenis</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">Producten</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= BASEPATH ?>products">
                        <span class="float-left">Bekijk producten</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Klanten</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= BASEPATH ?>users">
                        <span class="float-left">Bekijk klanten</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-user"></i>
                        </div>
                        <div class="mr-5"><?= $this->user->first_name . " " . $this->user->last_name ?></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= BASEPATH ?>logout">
                        <span class="float-left">Uitloggen</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>