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
    $user = $User->findById($_GET['id']);
}

/**
 * FORM SUBMIT
 * User::login()
 */
$error = false;
$errorMsg = '';
if (isset($_POST) && $_POST) {

    if ($User->update($_POST)) {
        $error = false;
        redirect('users_index.php');
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
                <h2 class="my-2">Users</h2>
                <form method="post" class="needs-validation" autocomplete="off">
                    <input readonly type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Update User</div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="name">Officer Name</label>
                                <input required type="text" class="form-control" name="name" id="name"
                                       value="<?= $user['name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Official Email)</span></label>
                                <input required type="email" class="form-control" id="email" name="email"
                                       value="<?= $user['email'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="phone">Phone Number <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           value="<?= $user['phone'] ?>">
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
