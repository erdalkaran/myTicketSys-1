<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>TICKET SORGU SAYFASI</title>
</head>
<body>
    
<?php

require 'config.php';

echo "
<html>
<head>
<title>TICKET SORGU SAYFASI</title>
</head>
";

$id = $_GET['ticketid'];

if( empty( $id ) ){
    $hataMesaj[] = 'ID giriniz.';
}

$soru = $DB->get_results("select ticket_id, ticketbaslik, ticketdetay ,ticketdurum, cevap, tarih"
        . " from ticket_id where ticket_id like '".$id."' ");

foreach ( $soru as $kayit){
    $ticketid            = $kayit->ticket_id;
    $ticketbaslik        = $kayit->ticketbaslik;
    $ticketdetay         = $kayit->ticketdetay; 
    $ticketdurum         = $kayit->ticketdurum;
    $tarih               = $kayit->tarih; 
    $cevap               = $kayit->cevap; 
    
// DEĞİŞTİRİLECEK CUNKU SU ANDA CEVAP VERİLMEYENLERİ gösteriyor. parantez basına ! konulacak
    
if(($cevap == 0 || $cevap == 'NULL' || $cevap == '') ){
    
    echo "
    <body><table width=\"100%\">
    <tr>
    <td><b>ticketid<b></td>
    <td><b>ticketbaslik<b></td>
    <td><b>ticketdetay<b></td>
    <td><b>ticketdurum<b></td>
    <td><b>tarih<b></td>
    <td><b>cevap<b></td>
    </tr>
    <tr>
    <td>$ticketid</td>
    <td>$ticketbaslik</td>
    <td>$ticketdetay</td>
    <td>$ticketdurum</td>
    <td>$tarih</td>
    <td>$cevap</td>   
    </tr>
    
    ";
}
else echo "Henuz ticketiniz cevaplanmadı...";
}

echo"
</table>
</body>
</html>";

?>
   
TICKET CEVAP YAZINIZ
<form action="cevap.php" method="POST" enctype="multipart/form-data">
    <textarea name="cevap" rows="4" cols="20" placeholder="Mesajınızı girin."></textarea>
        <br />
                
        <input type="submit" value="Gönder" name="btnGonder" />
</form>
<?php

//yeniden cevap yazma hakkı 
    require_once  'config.php';
    
    $cevap             = $_POST['cevap'];
       
    $sql1 = "UPDATE ticket_id SET ticketdetay2 = '".$cevap."' WHERE ticket_id ='".$id."' ";

    $sonuc1 = $DB->query( $sql1);

    ?>
</body>
</html>