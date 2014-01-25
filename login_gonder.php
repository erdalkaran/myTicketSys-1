<?php
session_start();
require_once 'config.php';

//atamalar
$email = $_POST['email'];
$password = $_POST['password'];

//kontroller
$hataMesaj = array();

if( empty( $email ) || empty( $password ) ){
    $hataMesaj[] = 'Email veya şifre boş bırakılamaz.';
}

if( strlen( $email ) > 255 || strlen($password) > 40 ){
    $hataMesaj[] = 'Email 255 karakterden uzun olamaz.';
    $hataMesaj[] = 'Şifre 40 karakterden uzun olamaz';
}

if( count($hataMesaj ) == 0 ){
   
    if($email == 'hasanaytac@outlook.com' && $password == '1234'){
        $sayi = 1;
    } 
    
    if( $sayi == 1 ){
        $_SESSION['oturumAcildi'] = 1;
        header('Location: index_admin.php');
        exit;
    }else{
        $hataMesaj[] = 'Email ya da şifre hatalı.';
    }
}

if( count($hataMesaj)>0 ){
    $_SESSION['hataMesaj'] = $hataMesaj;
    header('Location: login.php');
    exit; 
}

