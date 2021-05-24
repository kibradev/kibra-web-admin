<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/kibra-admin.css" type="text/css" />
<title>Kibra Admin Panel</title>
</head>
<?php
include("settings.php");

session_start();
if(!isset($_SESSION["login"])){
header("Location:index.php");
}else{
?>
<body>
    <?php include("kibra-menu.php"); ?>
    <?php include("connect.php"); ?>
 
    <?php  $sorgu = $baglanti->query("SELECT * FROM users WHERE identifier='$_GET[id]'");
    $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

?>
<style>
    .kibra-player-edit {
    background-color: #14151c;
    width: 1000px;
    margin: auto;
    margin-top: 30px;
    height: 800px;
    border: 1px;
    
}

.kibra-player-edit-header {
    background-color: transparent;
    width: 500px;
    height: 100px;
    border: 1px solid #fff;
}

::-webkit-input-placeholder { /* Edge */
  color: white;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: white;
}

::placeholder {
  color: white;
}

img{
width: 319px;
height: 317px;
margin-top: 30px;
margin-left: 30px;
border-radius: 175px;
border-color: #ecf0f1;
border-width: 8px;
border-style: solid;

}
    </style>

<div class="kibra-player-edit">
<h1><?php if($sonuc['group'] == 'user'){ ?><span style="margin-top: 40px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-secondary">Normal Kullanıcı</span> <?php } else { ?><span style="margin-top: 40px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-danger">Admin</span><?php } ?></h1>
<h1><?php if($sonuc['sex'] == 'm'){ ?><span style="margin-top: 10px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-secondary">Erkek</span> <?php } else { ?><span style="margin-top: 40px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-success">Kadın</span><?php } ?></h1>
<h1><span style="margin-top: 10px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-primary"><?php echo $sonuc['firstname'].' '.$sonuc['lastname']; ?></h1>
<h1><span style="margin-top: 10px; margin-left: 40%;; font-size: 20px; color: #fff;" class="badge bg-primary"><?php echo $sonuc['identifier']; ?></h1>


<img src="https://www.euroteks.com.tr/wp-content/uploads/2013/05/765-default-avatar.png" width="200" height="400" />
<form action="" method="post">
<br>
<input type="text" name="identifier" style="margin-left: 42%; margin-top: -330px; width: 450px; height: 45px; " class="form-control" placeholder="Oyuncu Adı" value="<?php echo $sonuc['identifier']; ?>" /><br>
<br>
<input type="text" name="firstname" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Oyuncu Adı" value="<?php echo $sonuc['firstname']; ?>" /><br>
<input type="text" name="lastname" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Oyuncu Soyadı" value="<?php echo $sonuc['lastname']; ?>" /><br>
<input type="text" name="job" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Oyuncu Soyadı" value="<?php echo $sonuc['job']; ?>" /><br>
<input type="text" name="phone_number" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Telefon Numarası" value="<?php echo $sonuc['phone_number']; ?>" /><br>
<input type="text" name="job_grade" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Meslek Level" value="<?php echo $sonuc['job_grade']; ?>" /><br>
<input type="submit" style="margin: auto; margin-left: 42.5%; margin-top: 1%; width: 450px; height: 45px; " class="btn btn-primary" value="Değişiklikleri Kaydet">
</form>
</div>
</div>
<div>



<?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    
    $hex = $_POST['identifier']; // Post edilen değerleri değişkenlere aktarıyoruz
    $meslek = $_POST['job'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mesleklevel = $_POST['job_grade'];
    $telefon = $_POST['phone_number'];
    $group = $_POST['group'];
    $job_grade = $_POST['job_grade'];


    if ($hex!="" && $meslek!="") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($baglanti->query("UPDATE users SET identifier = '$hex', job = '$meslek', firstname = '$firstname', lastname = '$lastname', job_grade = '$mesleklevel', phone_number = '$telefon' WHERE identifier='$_GET[id]'")) 
        {
            header("location:players.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

