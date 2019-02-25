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

/**
 * @uses objects/Products::all()
 */
$products = $Product->all();

?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Products</h2>
                <div class="card">
                    <div class="card-header d-flex p-2">
                        <div class="flex-grow-1 font-weight-bold p-1">Products List</div>
                        <div class="p-0"><a class="btn btn-success btn-sm m-0" href="products_add.php">Add New</a></div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">description</th>
                                <th scope="col">category</th>
                                <th scope="col" class="w-auto">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product['id'] ?></td>
                                    <td><?= $product['name'] ?></td>
                                    <td class="text-right"><?= "RM " . number_format($product['price'], 2, ".", ",") ?></td>
                                    <td><?= $product['description'] ?></td>
                                    <td><?= $product['category'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                           href="products_view.php?id=<?= $product['id'] ?>">
                                            View
                                        </a>
                                        <a class="btn btn-success btn-sm"
                                           href="products_edit.php?id=<?= $product['id'] ?>">
                                            Edit
                                        </a>
                                        <a class="btn btn-dark btn-sm delete"
                                           href="products_delete.php?id=<?= $product['id'] ?>">
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

