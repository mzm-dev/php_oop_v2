<?php
/**
 *
 */
include_once 'config/App.php';

/**
 *
 */
include_once 'elements/header.php';


$User->is_loggedin('login');
//dd($_SESSION);

/**
 * FORM SUBMIT
 * User::login()
 */
$error = false;
$errorMsg = '';
if (isset($_POST) && $_POST) {

    $email = $_POST['email'];
    $upass = $_POST['password'];

    if ($User->login($email, $upass)) {
        $error = false;
        redirect('home.php');
    } else {
        $error = true;
        $errorMsg = validation_msg('login', 'danger');
    }
}


?>

    <form class="form-signin" method="post">

        <div class="text-center mb-4">
            <img class="mb-4" src="./assets/img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">PHP OOP</h1>
            <p>Example project using PHP OOP, PDO and Mysql Database</p>
            <?php
            if ($error) {
                echo $errorMsg;
            }
            ?>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required
                   autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
                   required>
            <label for="inputPassword">Password</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block my-5" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date('Y') ?> coder@mzm </p>
    </form>
<?php
/**
 *
 */
include_once 'elements/footer.php';
