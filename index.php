<?php
/*
 * Name: Vadim Balan
 * Date: 05/20/2020
 * Description: This is the midterm programming portion. Create a survey
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");

// Instantiate the F3 Base Class
$f3 = Base::instance();

// Default route
$f3->route('GET /', function()
{
    echo '<h1>Midterm Survey</h1>';

    echo '<a href="survey">Take my Midterm Survey</a>';
});

// Survey Route
$f3->route('GET|POST /survey', function($f3)
{
    $list = getList();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Testing
        //var_dump($_POST);

        // Data is valid
        // Store the data in the session array
        $_SESSION['list'] = $_POST['list'];
        $_SESSION['name'] = $_POST['name'];

        // Redirect to profile page
        $f3->reroute('/summary');
    }
    $f3->set('list', $list);
    $view = new Template();
    echo $view->render('views/survey.html');
});

// Default route
$f3->route('GET /summary', function()
{
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run F3
$f3->run();