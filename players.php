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
    <h1 style="margin-top: 50px; text-align: center; width: 100%; color: #fff; font-size: 20px;">Kibra Admin - Oyuncu Listesi</h1>

    <table class="table" style="border: 1px solid #fff; color: #fff; background-color: #171921; margin: auto; width: 500px;">
  <thead>
    <tr>
      <th scope="col">Hex</th>
      <th scope="col">Ad Soyad</th>
      <th scope="col">Group</th>
      <th scope="col">Meslek</th>
      <th scope="col">Cinsiyet</th>
      <th scope="col">Telefon</th>
      <th scope="col">Düzenle</th>
      <th scope="col">İşlem</th>





    </tr>
  </thead>
  <tbody>
  <?php 

$sorgu = $baglanti->query("SELECT * FROM users"); 

while ($sonuc = $sorgu->fetch_assoc()) { 

$hex = $sonuc['identifier'];
$adsoyad = $sonuc['firstname'].' '.$sonuc['lastname']; 
$usergroup = $sonuc['group'];
$meslek = $sonuc['job'];
$cinsiyet = $sonuc['sex'];
$telefon = $sonuc['phone_number']; 

?>
    <tr>
      <th scope="row"><?php echo $hex; ?></th>
      <td><?php echo $adsoyad; ?></td>
      <td><?php if($usergroup == 'user'){?> Normal Kullanıcı <?php } else {?><font color="red">Admin</font><?php } ?></td>
      <td><font color="#0091ff"><?php echo $meslek; ?></font></td>
      <td><?php if($cinsiyet == 'm') {?><font color="#1bb500">Erkek</font><?php } else { ?><font color="#ff009d">Kadın</font><?php } ?></td>
      <td><h5><span class="badge bg-danger"><?php echo $telefon; ?></span></h5></td>
      <td><a target="blank" href="edit.php?id=<?php echo $hex; ?>"<button class="btn btn-primary" type="button">Düzenle</button></td>
      <td><a href="delete.php?id=<?php echo $hex; ?>"<button class="btn btn-danger" type="button">Sil</button></td>


    </tr>
    <?php 
} 
?>



  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

