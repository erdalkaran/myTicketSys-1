<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <title>YENİ TICKET OLUSTURMA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>    
    <script type="text/javascript">
    $(function() { 
    $( "#baslik" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "source.php",
          dataType: "json",
          data: {
		term: request.term
          },
          success: function( data ) {
            response( $.map( data, function( item ) {
              return {
                label: item,
                value: item
              }
            }));
          }
        });
      },
    });
});
        
        </script>
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
        Kategori:
        <?php
        echo "<select name='user'>";
        $sor = $DB->get_results("select * from kategori_id order by kategori");
        foreach  ($sor as $kayit) {
            echo "<option value=' kategori'>".$kayit->kategori."</option>";
        }
        echo "</select>";
        ?>
        <br/>
        Başlık: <input type="text" name="baslik" value="" placeholder="Mesaj başlığınızı girin."
        class ='baslik'  />
        <br />
        Mesajınız: <br />
        <textarea name="mesaj" rows="4" cols="20" placeholder="Mesajınızı girin."></textarea>
        <br />
                
        <input type="submit" value="Gönder" name="btnGonder" />
        
        
    </form>
</div>
</body>
</html>
