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

    if ($User->create($_POST)) {
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
                    <div class="card">
                        <div class="card-header bg-primary text-light">Add New User</div>
                        <div class="card-body">
                            <?php
                            if ($error) {
                                echo $errorMsg;
                            }
                            ?>
                            <div class="mb-3">
                                <label for="name">Officer Name</label>
                                <input required type="text" class="form-control" name="name" id="name"
                                       placeholder="Full Name">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Official Email)</span></label>
                                <input required type="email" class="form-control" id="email" name="email"
                                       placeholder="you@example.com">
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="password">Password</label>
                                    <input required type="password" class="form-control" name="password" id="password"
                                           placeholder="*******">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="phone">Phone Number <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           placeholder="0388881111">
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
