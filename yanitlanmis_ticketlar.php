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
<b>YANITLANMIŞ TICKETLAR </b>
        
    <br>
<?php


echo "
<html>
<head>
<title>Veri Tabanındaki Bilgileri Listeleme</title>
</head>
<body><table width=\"100%\">
";

require 'config.php';

$sor = $DB->get_results("select * from ticket_id where cevap like NOT '' ") ;
if($sor != 0){
    

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

<tr>
<td>$ticketid</td>
<td>$kategori</td>
<td>$ticketbaslik</td>
<td>$ticketdetay</td>
<td>$ticketdurum</td>
<td>$tarih</td>
<td>$dosya1</td>
<td>$cevap</td>   
</tr>
";
}
}else echo'Yanıtlanmış ticket YOK';
echo"

</table>
</body>
</html>";

?>
</body>
</html>

