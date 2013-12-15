<?php
include_once 'config.php';

//atamalar

//formdan gelen veri
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$eposta = $_POST['email'];
$kategori_id = $_POST['id_kategori'];
$ticketbaslik = $_POST['baslik'];
$ticketdetay = $_POST['mesaj'];

$dosya1 = $_FILES['dosya1'];

//phpnin ürettiği veri
$tarih = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

//kontroller
$hataMesaj = array();
if( empty( $ad ) ){
    $hataMesaj[] = 'Ad boş bırakılamaz.';
}

if( empty( $soyad ) ){
    $hataMesaj[] = 'Soyad boş bırakılamaz.';
}

if( strlen($ad)>25 || strlen($soyad)>25 ){
    $hataMesaj[] = 'Ad ve soyad 25 karakterden büyük olamaz.';
}

if( empty( $eposta ) ){
    $hataMesaj[] = 'Email boş bırakılamaz.';
}

if( strlen($eposta)>100 ){
    $hataMesaj[] = 'Email 100 karakterden büyük olamaz.';
}

if( empty( $ticketbaslik ) ){
    $hataMesaj[] = 'Başlık boş bırakılamaz.';
}

if( strlen($ticketbaslik)>255 ){
    $hataMesaj[] = 'Başlık 255 karakterden büyük olamaz.';
}

if( empty( $ticketdetay ) ){
    $hataMesaj[] = 'Mesaj boş bırakılamaz.';
}

if( strlen($ticketdetay)>1000 ){
    $hataMesaj[] = 'Başlık 1000 karakterden büyük olamaz.';
}

if( !empty( $dosya1 ) && $dosya1['size'] > 3 * 1024 * 1024 ){
    $hataMesaj[] = 'Dosya boyutu 3MB den büyük olamaz.';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>İletişim formu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div>
    <?php 
        //hata varsa hataları yazdıracak
        if(count($hataMesaj)>0 ){
            foreach ($hataMesaj as $hata){
                echo $hata;
                echo '<br />';
            }
        }else{
            move_uploaded_file($dosya1['tmp_name'], 'dosyalar/' . $dosya1['name'] );
            
            $sql1 = "INSERT INTO "
                    . "kullanici_id(ad,soyad,eposta,ip) "
                    . "VALUES( '$ad' , '$soyad' , '$eposta', '$ip' )";
            
            $sonuc1 = $DB->query( $sql1);
            
            $sql2 = "INSERT INTO "
                    . "kategori_id(kategori_id) "
                    . "VALUES('$kategori')";
            
            $sonuc2 = $DB->query( $sql2);
            
            $sql3 = "INSERT INTO "
                    . "ticket_id(ticketbaslik,ticketdetay,tarih,dosya1) "
                    . "VALUES('$ticketbaslik' , '$ticketdetay' , '$tarih', '".$dosya1['name']."')";
            
            $sonuc3 = $DB->query( $sql3);
            
            if($sonuc1==1 && $sonuc2==1 && $sonuc3==1){
                echo 'Kayıt başarılı..';
            }else{
                echo 'Kayıt esnasında bir hata oluştu.';
                echo '<br />';
                echo 'Hata mesajı: <br />';
                echo $DB->last_error;
            }
        }
    ?>
</div>
</body>
</html>