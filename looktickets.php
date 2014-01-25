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
    <form action="arama_sonuc.php" method="POST" enctype="multipart/form-data">
        Arama <input type="text" name="arama" value="" placeholder="Kelimeyi giriniz..." size="25" maxlength="25" />
        <input type="submit" value="Ara" name="aramaBtn" />
    </form>
    <br>
    
    <b>TÜM TICKETLAR </b>
    
    <br>
<?php

require 'config.php';
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


$sor = $DB->get_results("select * from ticket_id order by ticket_id");
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
echo"

</table>
</body>
</html>";

?>
</body>
</html>
