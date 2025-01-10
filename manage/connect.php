<?php
/* 
    $dsn = 'mysql:host=localhost;dbname=thefounder';
    $user = 'root';
    $pass = '';
    $option = array (
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try {
        $con = new PDO($dsn, $user, $pass, $option);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'You are Connected To Database' . '<br>';
    }

    catch (PDOException $e){
        echo 'Failed to connect to Database' . $e->getMessage() . '<br>';
    } 
*/
// mysql://t78snp2igzndlql9:cihbqd6kgjxi5771@sulnwdk5uwjw1r2k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/zbud0v5s66drwoyg

// استخراج معلومات الاتصال من متغير البيئة
$url = parse_url(getenv("JAWSDB_URL"));

// تفكيك بيانات الاتصال
$host = $url["host"];
$dbname = substr($url["path"], 1); // إزالة علامة "/" من بداية اسم قاعدة البيانات
$user = $url["user"];
$pass = $url["pass"];

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'You are Connected To Database on JawsDB' . '<br>';
} catch (PDOException $e) {
    echo 'Failed to connect to Database: ' . $e->getMessage() . '<br>';
}
?>