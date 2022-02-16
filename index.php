<?php
//This is my CONTROLLER

//Turn on output buffering
ob_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start the session
session_start();
//var_dump($_SESSION);

//Require the autoload file
require_once('vendor/autoload.php');
require ('model/data-layer.php');


//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
//    echo "<h1>default route midterm</h1>";

    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a route for the survey
$f3->route('GET /survey', function($f3) {
//    echo "<h1>My term default router</h1>";
    $f3->set('options', getOptions());

    $view = new Template();
    echo $view->render('views/survey.html');
});

    //Clear the session data
    session_destroy();

//Run fat-free
$f3->run();

//Send output to the browser
ob_flush();