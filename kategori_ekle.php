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
    <title>KATEGORİ EKLEME</title>
</head>
<body>
    <form action="kategori_ekle.php" method="POST" enctype="multipart/form-data" >
        Kategori Ekle: <input type="text" name="kategori" value="" placeholder="Eklenecek kategoriyi giriniz.." size="25" maxlength="25" />
        <br />
        <input type="submit" value="Kategori Ekle" name="AddCat" />
    </form>
   
    <?php
    require_once  'config.php';
    // put your code here
    $kategori             = $_POST['kategori'];

    $sql1 = "INSERT INTO "
                    . "kategori_id(kategori) "
                    . "VALUES( '$kategori' )";
            
            $sonuc1 = $DB->query( $sql1);
    ?>
</body>
</html>