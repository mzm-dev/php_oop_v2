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
    $category = $Category->findById($_GET['id']);
}
?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Categories</h2>
                <div class="card">
                    <div class="card-header bg-primary text-light">Category Details</div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-2">ID</dt>
                            <dd class="col-sm-10">&nbsp;<?= $category['id'] ?></dd>
                            <dt class="col-sm-2">Name</dt>
                            <dd class="col-sm-10">&nbsp;<?= $category['name'] ?></dd>


                            <dt class="col-sm-2">Created</dt>
                            <dd class="col-sm-10">&nbsp;<?= $category['created'] ?></dd>
                            <dt class="col-sm-2">Modified</dt>
                            <dd class="col-sm-10">&nbsp;<?= $category['modified'] ?></dd>
                        </dl>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row-reverse">
                            <a class="btn btn-success" href="categories_edit.php?id=<?= $category['id'] ?>">Modified</a>
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
