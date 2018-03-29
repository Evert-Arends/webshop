<main role="main" id="categories" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Ordergeschiedenis</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Orderoverzicht</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>Orders inzien
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>E-Mail</th>
                                <th>Rol</th>
                                <th>Geboortedatum</th>
                                <th>Geregistreerd op</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>E-Mail</th>
                                <th>Rol</th>
                                <th>Geboortedatum</th>
                                <th>Geregistreerd op</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($this->allOrders) {
                                foreach ($this->allOrders as $order) {
                                    $user = $order->getUser();
                                    $rules = $order->getOrderRules();
                                    foreach($rules as $rule){
                                        print_r($rule->getProduct());
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $order->getId(); ?></td>
                                        <td><?= $order->getId(); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>