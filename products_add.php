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

    if ($Product->create($_POST)) {
        $error = false;
        redirect('products_index.php');
    } else {
        $error = true;
        $errorMsg = validation_msg('Please try agian.', 'danger');
    }
}

$categories = $Product->category_list();


?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'elements/sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-2">Products</h2>
                <form method="post" class="needs-validation" autocomplete="off">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Add New Product</div>
                        <div class="card-body">
                            <?php
                            if ($error) {
                                echo $errorMsg;
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select d-block w-100" id="category" name="category"
                                            required="">
                                        <option>Choose...</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['value'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input required type="text" class="form-control" name="name" id="name"
                                       placeholder="Name Product">
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea rows="5" required type="text" class="form-control" id="description"
                                          name="description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">RM</span>
                                        </div>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="000.00"
                                               required>
                                    </div>
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
