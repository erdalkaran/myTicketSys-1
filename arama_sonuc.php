<?php
require_once 'config.php';
$kelime             = $_POST['arama'];
echo $kelime;

if( empty( $kelime ) ){
    $hataMesaj[] = 'Kelime giriniz.';
}

$sor= $DB->get_results("select * from ticket_id where ticket_id like ‘%".$kelime."%’");
print_r($sor0);
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
?>

