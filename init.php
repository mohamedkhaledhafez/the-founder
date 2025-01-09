<?php

//Error Reporting 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include 'manage/connect.php';

$sessionUser = '';

if (isset($_SESSION['user'])) {
    $sessionUser = $_SESSION['user'];
} elseif (isset($_SESSION['parent'])) {
    $sessionUser = $_SESSION['parent'];
}


// Routes :

$templates = 'includes/templates/'; // Templates directory
$lang      = 'includes/languages/'; // languages directory
$func      = 'includes/functions/';  // functions directory 
$css       = 'layout/css/';         // Css directory
// $css2      =  'layout/css/front-rtl.css';
$js        = 'layout/js/';          // js directory
$imgs      = '/manage/uploads/imgs/';

$dir = "rtl";
// $css = "";

/* if(isset($_GET['lang'])) {
        $_SESSION['lang']=$_GET['lang'];
    } else {
        $_SESSION['lang']='en';
    }
    
    switch($_SESSION['lang']) {
        case 'en':
            $lang_file='english.php';
            break;
    
        case 'ar':
            $lang_file='arabic.php';
            $dir = "rtl";
            // $css2 = 'front-rtl.css';
            break;
        default:
            $lang_file='arabic.php';

    }
     */
// include_once './includes/languages/'.$lang_file;
// include_once 'layout/css/'.$css2;
// include the important files :
include $func . 'functions.php';

// include $lang . 'english.php';
include $templates . 'header.php';
include $templates . 'navbar.php';