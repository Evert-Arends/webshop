<main role="main" id="users" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Klantgegevens</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Eporteren</button>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/webshop/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Klantgegevens</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>Klantgegevens inzien
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
                            if ($this->users) {
                                foreach ($this->users as $user) { ?>
                                    <tr>
                                        <td><?= $user->getFirstName(); ?></td>
                                        <td><?= $user->getLastName(); ?></td>
                                        <td><?= $user->getEmail(); ?></td>
                                        <?php
                                        $role = $user->getRole(); ?>
                                        <td><?= $role->getDescription(); ?></td>
                                        <td><?= $user->getDateOfBirth(); ?></td>
                                        <td><?= $user->getDateRegistered(); ?></td>
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



