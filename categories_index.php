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


$categories = $Category->all();
?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Categories</h2>
                <div class="card">
                    <div class="card-header d-flex p-2">
                        <div class="flex-grow-1 font-weight-bold p-1">Categories List</div>
                        <div class="p-0"><a class="btn btn-success btn-sm m-0" href="categories_add.php">Add New</a></div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th scope="col" class="w-auto">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                           href="categories_view.php?id=<?= $category['id'] ?>">
                                            View
                                        </a>
                                        <a class="btn btn-success btn-sm"
                                           href="categories_edit.php?id=<?= $category['id'] ?>">
                                            Edit
                                        </a>
                                        <a class="btn btn-dark btn-sm delete"
                                           href="categories_delete.php?id=<?= $category['id'] ?>">
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

