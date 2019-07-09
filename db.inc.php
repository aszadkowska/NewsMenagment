<?php

$servername = "localhost";
$dbUsername = "ada";
$dbPassword = "ada";
$dbName = "test";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("failed " .mysqli_connect_error());
}

//$request = $_SERVER['REDIRECT_URL'];
//
//switch ($request) {
//    case '/' :
//        require __DIR__ . 'app/View/profile/home.php';
//        break;
//    case '' :
//        require  __DIR__ . 'app/View/profile/home.php';
//        break;
//    case '/home' :
//        //var_dump(__DIR__ , 'app/View/profile/home.php');exit;
//        require __DIR__ . 'app/View/profile/home.php';
//        break;
//    case '/news' :
//        require __DIR__ . 'app/View/profile/news.php';
//        break;
//    default:
//        require __DIR__ . '/views/404.php';
//        break;
//}
//// Include router class
//include('Route.php');
//include('app/Controller/UserController.php');
//
//// Add base route (startpage)
//Route::add('/', function (){
//    require "app/View/layout/header.php";
//});
//
//// Simple test route that simulates static html file
//Route::add('/home',function(){
//    require "app/View/layout/header.php";
//});
//
//
////Route::get('/user', 'UserController@index');
//
//
//// Post route example
//Route::add('/contact-form',function(){
//    echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
//},'get');
//
//// Post route example
//Route::add('/contact-form',function(){
//    echo 'Hey! The form has been sent:<br/>';
//    print_r($_POST);
//},'post');
//
//// Accept only numbers as parameter. Other characters will result in a 404 error
//Route::add('/foo/([0-9]*)/bar',function($var1){
//    echo $var1.' is a great number!';
//});
//
//Route::run('/');
//?>
