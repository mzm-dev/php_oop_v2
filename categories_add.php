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
 * FORM SUBMIT
 * User::login()
 */
$error = false;
$errorMsg = '';
if (isset($_POST) && $_POST) {

    if ($Category->create($_POST)) {
        $error = false;
        redirect('categories_index.php');
    } else {
        $error = true;
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
                    <div class="card">
                        <div class="card-header bg-primary text-light">Add New Category</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="phone">Name Category</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
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
