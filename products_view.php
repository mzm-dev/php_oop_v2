<?php
/**
 *
 */
include_once 'config/app.php';

/**
 *
 */
include_once 'elements/header.php';

/**
 *
 */
include_once 'elements/navbar.php';

/**
 * is logged in?
 */
$User->is_loggedin();

/**
 * GET PARAM
 */
if (isset($_GET) && $_GET) {
    $product = $Product->findById($_GET['id']);
}
?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Products</h2>
                <div class="card">
                    <div class="card-header bg-primary text-light">Product Details</div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-2">ID</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['id'] ?></dd>
                            <dt class="col-sm-2">Name</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['name'] ?></dd>
                            <dt class="col-sm-2">Description</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['description'] ?></dd>
                            <dt class="col-sm-2">Price</dt>
                            <dd class="col-sm-10">&nbsp;<?= "RM ".number_format($product['price'],2,".",",") ?></dd>
                            <dt class="col-sm-2">Category</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['category'] ?></dd>


                            <dt class="col-sm-2">Created</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['created'] ?></dd>
                            <dt class="col-sm-2">Modified</dt>
                            <dd class="col-sm-10">&nbsp;<?= $product['modified'] ?></dd>
                        </dl>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row-reverse">
                            <a class="btn btn-success" href="products_edit.php?id=<?= $product['id'] ?>">Modified</a>
                        </div>
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
