<?php 

if ($_GET) 
{

include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM users WHERE identifier='$_GET[id]'")) 
{
    header("location:players.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}



?>