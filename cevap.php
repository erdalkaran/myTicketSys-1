<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
echo "
<html>
<head>
<title>Veri Tabanındaki Bilgileri Listeleme</title>
</head>

";
require 'config.php';
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

</body>
</html>