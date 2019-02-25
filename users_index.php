<?php
/**
 *
 */
include_once 'config/app.php';

/**
 * is logged in?
 */
$User->is_loggedin();

/**
 *
 */
include_once 'elements/header.php';

/**
 *
 */
include_once 'elements/navbar.php';


$users = $User->all();

?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Users</h2>
                <div class="card">
                    <div class="card-header d-flex p-2">
                        <div class="flex-grow-1 font-weight-bold p-1">Users List</div>
                        <div class="p-0"><a class="btn btn-success btn-sm m-0" href="users_add.php">Add New</a></div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="w-auto">id</th>
                                <th scope="col" class="w-auto">name</th>
                                <th scope="col" class="w-auto">email</th>
                                <th scope="col" class="w-auto">phone</th>
                                <th scope="col" class="w-auto">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="users_view.php?id=<?= $user['id'] ?>">
                                            View
                                        </a>
                                        <a class="btn btn-success btn-sm" href="users_edit.php?id=<?= $user['id'] ?>">
                                            Edit
                                        </a>
                                        <a class="btn btn-dark btn-sm delete" href="users_delete.php?id=<?= $user['id'] ?>">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

<?php
/**
 *
 */
include_once 'elements/footer.php';
