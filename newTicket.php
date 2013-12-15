<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div>
<?php
include_once "lib/ezSQL/shared/ez_sql_core.php";
include_once "lib/ezSQL/mysqli/ez_sql_mysqli.php";

$DB = new ezSQL_mysqli('root','','ibbticket','localhost');

?>
      <form action="iletisim_gonder.php" method="POST" enctype="multipart/form-data">
        Ad: <input type="text" name="ad" value="" placeholder="Adınızı girin." size="25" maxlength="25" />
        <br />
        Soyad: <input type="text" name="soyad" value="" placeholder="Soyadınızı girin." />
        <br />
        Email: <input type="text" name="email" value="" placeholder="Eposta adresinizi girin." />
        <br />
        Kategori: <input type="text" name="kategori" value="" placeholder="Kategori giriniz." />
                    
        <br />
        
        Başlık: <input type="text" name="baslik" value="" placeholder="Mesaj başlığınızı girin." />
        <br />
        
        Mesajınız: <br />
        <textarea name="mesaj" rows="4" cols="20" placeholder="Mesajınızı girin."></textarea>
        <br />
                
        <input type="submit" value="Gönder" name="btnGonder" />
        
        
    </form>
</div>
</body>
</html>
