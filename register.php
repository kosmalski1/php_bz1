
<?php
require_once('config.php');

if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    if(empty($_REQUEST['login']) || empty($_REQUEST['password'])
    || empty($_REQUEST['firstname']) || empty($_REQUEST['lastname'])) {
        //podano pusty string jako jedną z wymaganych wartości
        $twig->display('message.html.twig', 
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
        $twig->display('message.html.twig', 
        ['message' => "Błąd rejestracji użytkownika"]);
    }
   
} else {
        $twig->display('register.html.twig');
    }
?>    
