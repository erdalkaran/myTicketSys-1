<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
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
</tr>
";

require 'config.php';
$kelime             = $_POST['arama'];
echo "Aradıgınız kelime : ".$kelime;

if( empty( $kelime ) ){
    $hataMesaj[] = 'Kelime giriniz.';
}

$sor = $DB->get_results("select * from ticket_id where ticket_id like '%".$kelime."%'"
        . " or ticketdetay like '%".$kelime."%'"
        . " or ticketdurum like '%".$kelime."%'"
        . " or ticketbaslik like '%".$kelime."%'"
        . " or cevap like '%".$kelime."%'"
        . " or kategori like '%".$kelime."%'");
//print_r($sor);

foreach ( $sor as $kayit){
    $ticketid            = $kayit->ticket_id;
    $kategori            = $kayit->kategori;
    $ticketbaslik        = $kayit->ticketbaslik;
    $ticketdetay         = $kayit->ticketdetay; 
    $ticketdurum         = $kayit->ticketdurum;
    $tarih               = $kayit->tarih; 
    $dosya1              = $kayit->dosya1;
    $cevap               = $kayit->cevap; 


echo "
<br>
<td>$ticketid</td>
<td>$kategori</td>
<td>$ticketbaslik</td>
<td>$ticketdetay</td>
<td>$ticketdurum</td>
<td>$tarih</td>
<td>$dosya1</td>
<td>$cevap</td>   
</br>
";
}
echo"

</table>
</body>
</html>";

?>
</body>
</html>

