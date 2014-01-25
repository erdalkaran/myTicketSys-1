<?php
session_start();

//oturumAcildi session değişkeni daha önce oluşturulmuş mu? oluşturulmuşsa değeri 1 yapılmış mı?
//bu bize daha önce üye girişinin yapılıp yapılmadığını belirtir.
if( !( isset($_SESSION['oturumAcildi']) && $_SESSION['oturumAcildi'] == 1 ) ){
    header('Location: login.php');
    exit;
}

require_once 'config.php';
?>

<?php

$id = $_POST['ticketid'];
$cevap = $_POST['cevap'];

if( empty( $id ) ){
    $hataMesaj[] = 'ID giriniz.';
}

$sql1 = "UPDATE ticket_id SET cevap2 = '".$cevap."' WHERE ticket_id ='".$id."' ";

$sonuc1 = $DB->query( $sql1);


if($sonuc1 == 1){
    

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hasanaytac';                            // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    $mail->From = 'admin@myticketsys.com';
    $mail->FromName = 'TicketSys';
    $mail->addAddress($eposta, $ad.$soyad);  // Add a recipient
    $mail->addReplyTo('admin@myticketsys.com', 'TicketSysInformation');


    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Gönderiniz Hakkında';
    $mail->Body    = 'http://localhost/ibbTicket/cevap.php?ticketid='.$ticketid.'&Sorgu=Sorgula';
    
    $mail->AltBody = $ticketdetay;

    if(!$mail->send()) {
        echo 'Mail gönderilemedi...'.'</br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }

 }

