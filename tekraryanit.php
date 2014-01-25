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
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title>YENİ TICKETLAR</title>
</head>
<body>
    <b>YENİ TICKETLAR</b>
    <br>
<?php


echo "
<html>
<head>
<title>Veri Tabanındaki Bilgileri Listeleme</title>
</head>
<body><table width=\"100%\">
<tr>
<td>ticketid</td>
<td>kategori</td>
<td>ticketbaslik</td>
<td>ticketdetay</td>
<td>ticketdurum</td>
<td>tarih</td>
<td>dosya1</td>
<td>cevap</td>
<td>ticketdetay2</td>
<td>cevap2</td>
</tr>
";

require_once 'config.php';

$sor = $DB->get_results("select * from ticket_id where ticketdetay2 <> '' ") ;

foreach ( $sor as $kayit){
    $ticketid            = $kayit->ticket_id;
    $kategori            = $kayit->kategori;
    $ticketbaslik        = $kayit->ticketbaslik;
    $ticketdetay         = $kayit->ticketdetay; 
    $ticketdurum         = $kayit->ticketdurum;
    $tarih               = $kayit->tarih; 
    $dosya1              = $kayit->dosya1;
    $cevap               = $kayit->cevap; 
    $ticketdetay2        = $kayit->ticketdetay2;
    $cevap2              = $kayit->cevap2;

echo "
<tr>
<td>$ticketid</td>
<td>$kategori</td>
<td>$ticketbaslik</td>
<td>$ticketdetay</td>
<td>$ticketdurum</td>
<td>$tarih</td>
<td>$dosya1</td>
<td>$cevap</td>   
<td>$ticketdetay2</td> 
<td>$cevap2</td> 
</tr>
";
}
echo"

</table>
</body>
</html>";

?>
     <br />
     <form action="tekrarcevapgonder.php" method ="POST" name="Gönder">
        ID: <input type='text' name="ticketid" value="" placeholder="Ticket id giriniz" />
        <br />
        Cevap: <br />
        <textarea name="cevap" rows="4" cols="20" placeholder="Cevabınızı giriniz"></textarea>
        <br />
        <input type="submit" value="Gönder" name="Sorgu" />
    </form>




