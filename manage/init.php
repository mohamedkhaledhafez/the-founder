<?php

include 'connect.php';


$sessionUser = '';

if (isset($_SESSION['User'])) {
    $sessionUser = $_SESSION['User'];
} elseif (isset($_SESSION['Username'])) {
    $sessionUser = $_SESSION['Username'];
} elseif (isset($_SESSION['user'])) {
    $sessionUser = $_SESSION['user'];
}


// Routes :

$templates = 'includes/templates/'; // Templates directory
$lang      = 'includes/languages/'; // languages directory
$func      = 'includes/functions/';  // functions directory 
$css       = 'layout/css/';         // Css directory
$vendor    = 'layout/vendor/';         // Vendor directory
$js        = 'layout/js/';          // js directory
$imgs      = 'uploads/imgs/';

// include the important files :

$dir = "rtl";
/* 
    if(isset($_GET['lang'] )) {
        $_SESSION['lang']=$_GET['lang'];
    } else {
        $_SESSION['lang']='en';
    }
    
    switch( $_SESSION['lang']) {
        case 'en':
            $lang_file='english.php';
            $dir = "ltr";
            break;
    
        case 'en':
            $lang_file='arabic.php';
            break;
        default:
            $lang_file='english.php';

    } */

// include_once './includes/languages/'.$lang_file;

// include $lang . 'english.php';
include $func . 'functions.php';
include $templates . 'header.php';

if (!isset($noNavbar)) {
    include $templates . 'navbar.php';
}


// include the navbar in all pages except the one with variable : $noNavbar 