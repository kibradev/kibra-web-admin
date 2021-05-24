<?php 

if ($_GET) 
{

include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM dcwl WHERE hex='$_GET[id]'")) 
{
    header("location:whitelist.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}



?>