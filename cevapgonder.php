<?php
require 'config.php';
$id = $_POST['ticketid'];
$cevap = $_POST['cevap'];
if( empty( $id ) ){
    $hataMesaj[] = 'ID giriniz.';
}
$sql1 = "UPDATE ticket_id SET cevap='".$cevap."' WHERE ticket_id ='".$id."' ";

$sonuc1 = $DB->query( $sql1);

$sor = $DB->get_results("select * from ticket_id order by ticket_id WHERE ticket_id='".$id."' ");

echo $cevap;

foreach ( $sor as $kayit){
    $ticketid            = $kayit->ticket_id;
    $kategori            = $kayit->kategori;
    $ticketbaslik        = $kayit->ticketbaslik;
    $ticketdetay         = $kayit->ticketdetay; 
    $ticketdurum         = $kayit->ticketdurum;
    $tarih               = $kayit->tarih; 
    $dosya1              = $kayit->dosya1;
    $cevap               = $kayit->cevap; 
}   
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
    $mail->Body    =  '<b>'.$ticketbaslik.'</b>';
    $mail->AltBody = $ticketdetay;

    if(!$mail->send()) {
        echo 'Mail gönderilemedi...'.'</br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }

 }

