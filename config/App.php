<?php
/**
 * Created by PhpStorm.
 * User: mohamadzaki
 * Date: 23/02/2019
 * Time: 9:02 PM
 */

/**
 * Initialize session data
 * @return bool This function returns true if a session was successfully started,
 */
session_start();

/**
 * Setting PHP error reporting
 * This determines whether errors should be printed to
 * the screen as part of the output or if they should be hidden from the user.
 *
 */
include_once 'Errors.php';
$errors = new Errors(array("level" => -1, 'display_errors' => 1));
$errors->init();

/**
 * Sets the default timezone used by all date/time functions in a script
 *
 */
date_default_timezone_set('Asia/Kuala_Lumpur');


/**
 * Defines a named constant for database
 *
 */
define("HOST", 'localhost');
define("USER", 'root');
define("PASSWORD", 'password');
define("DATABASE", 'php_oop');

/**
 *
 */
include_once 'Database.php';
$database = new Database(HOST, USER, PASSWORD, DATABASE);
$db = $database->connection();

/**
 * Load Object Class Users
 *
 */
include_once 'objects/Users.php';
$User = new Users($db);


/**
 * Load Object Class Categories
 *
 */
include_once 'objects/Categories.php';
$Category = new Categories($db);

/**
 * Load Object Class Products
 *
 */
include_once 'objects/Products.php';
$Product = new Products($db);

