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

/**
 * FORM SUBMIT
 * User::login()
 */
$error = false;
$errorMsg = '';
if (isset($_POST) && $_POST) {
    $error = true;
    if ($Category->update($_POST)) {
        redirect('categories_index.php');
    } else {
        $errorMsg = validation_msg('Please try agian.', 'danger');
    }
}


?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Categories</h2>
                <form method="post" class="needs-validation" autocomplete="off">
                    <input readonly type="hidden" name="id" value="<?= $category['id'] ?>">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Update Category</div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input required type="text" class="form-control" name="name" id="name"
                                       value="<?= $category['name'] ?>">
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </main>
        </div>
    </div>
<?php
/**
 *
 */
include_once 'elements/footer.php';
