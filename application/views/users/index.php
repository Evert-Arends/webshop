<main role="main" id="users" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Klantgegevens</h1>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid content-container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASEPATH ?>admin">Dashboard</a>
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
                                <th>Bewerken</th>
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
                                <th>Bewerken</th>
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
                                        $role = $user->getRole();
                                        ?>
                                        <td><?= $role->getDescription(); ?></td>
                                        <td><?= $user->getDateOfBirth(); ?></td>
                                        <td><?= $user->getDateRegistered(); ?></td>
                                        <td>
                                            <button type='button' class='editModalOpener btn btn-warning btn-sm'
                                                    data-toggle='modal' data-target='#editModal'
                                                    data-id='<?= $user->getId(); ?>'
                                                    data-role='<?= $user->getRole()->getName(); ?>'>
                                                Bewerken
                                            </button>
                                        </td>
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

<script>
    $(document).on("click", ".editModalOpener", function () {
        var userId = $(this).data('id');
        var roleId = $(this).data('role');
        $(".modal-body #userId").val(userId);
        $('#selectRole option[value="' + roleId + '"]').prop("selected", "selected");
    });
</script>

<!-- EditModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gebruiker bewerken</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bewerk gebruikersrechten.
                <form class="form form-outline" id="editUser" name="editUser" method="POST"
                      action="<?= BASEPATH ?>users/">
                    <input type="hidden" name="userId" id="userId" value=""/>
                    <select class="form-control" id="selectRole" name="selectRole">
                        <option value="Customer">Gebruiker</option>
                        <option value="Admin">Administrator</option>
                    </select>
                    <button type="submit" id="editUserBtn" name="editUserBtn" class="btn btn-danger mt-1 form-control">
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