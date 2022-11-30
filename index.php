<?php

use Steampixel\Route;

require_once('user.class.php');
require_once('config.php');
Route::add('/', function() {
    echo "Strona główna";
});

Route::add('/login', function() {
   // echo "Strona logowania";
   global $twig;
   $twig->display('login.html.twig');
});
Route::add('/login', function() {
    // echo "Strona logowania";
    global $twig;
    require_once('config.php');
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        if($user->login()) {
            $v = array(
                'message' => "Zalogowano poprawnie użytkownika: ".$user->getname(),
            );
            $twig->display('message.html.twig', $v);
        } else {
            $twig->display('login.html.twig', 
            ['message' => "Błędny login lub hasło"]);
        }
    } else {
        die("nie otrzymano danych");
    }
 }
 , 'post');
Route::add('/register', function() {
   // echo "Strona rejestracji";
   global $twig;
   $twig->display('register.html.twig');

});
Route::add('/register', function() {
    // echo "Strona rejestracji";
    global $twig;
   // $twig->display('register.html.twig');
   if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    if(empty($_REQUEST['login']) || empty($_REQUEST['password'])
    || empty($_REQUEST['firstName']) || empty($_REQUEST['lastName'])) {
        //podano pusty string jako jedną z wymaganych wartości
        $twig->display('register.html.twig', 
                        ['message' => "Nie podano wymaganej wartości"]);
        exit();
    }
    $user = new User($_REQUEST['login'], $_REQUEST['password']);
    $user->setfirstname($_REQUEST['firstname']);
    $user->setlastname($_REQUEST['lastname']);
    if($user->register()) {
        $twig->display('message.html.twig', 
        ['message' => "Zarejestrowano poprawnie"]);
    } else {
        $twig->display('register.html.twig', 
        ['message' => "Błąd rejestracji użytkownika"]);
    }
   
} else {
die("dupa");
}
 
 }, 'post');

Route::run('/php_bz');
?>