# kibra-web-admin
FiveM için yapılmış, ExtendedMode altyapı uyumlu Web Panel

# Setup

Dosyaları xampp/htdocs/ klasörüne attıktan sonra;

```php
<?php
$servername = "localhost";
$database = "kibrapack";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . 
mysqli_connect_error());
}
echo "<font color='white'>Connected successfully</font>";
mysqli_close($conn);
?>
```

# settings.php Username Password Değiştirme

```php
<?php
$user = "admin";
$pass = "123456";
$kibraworks = "Kibra Admin"
?>
```

Bu kısımdan username ve şifreyi değiştirebilirsiniz.

Veritabanı bağlantınızı vt.php ve connect.php dosyasından ayarlayın.

Soru Ve Önerileriniz İçin: http://dc.emirkibar.com/

