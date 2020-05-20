<?php
/*
 * Name: Vadim Balan
 * Date: 05/20/2020
 * Description: This is the midterm programming portion. Create a survey
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once("vendor/autoload.php");

// Instantiate the F3 Base Class
$f3 = Base::instance();

// Default route
$f3->route('GET /', function()
{
    echo '<h1>Midterm Survey</h1>';

    echo '<a href="survey">Take my Midterm Survey</a>';
});

// Run F3
$f3->run();