<?php 

if ($_GET) 
{

include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM owned_vehicles WHERE owner='$_GET[id]'")) 
{
    header("location:vehicles.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}



?>