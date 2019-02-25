<?php
$navbarText = '';
if ($_SESSION['user_session']):
    $name = $_SESSION['user_session']['name'];
    $navbarText = "<span class='navbar-text ml-4 text-light font-weight-bold'>Welcome, $name</span>";
endif;

?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-gradient-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">PHP OOP</a>
    <?= $navbarText ?>
    <ul class="navbar-nav ml-auto px-3">
        <li class="nav-item active">
            <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
    </ul>

</nav>