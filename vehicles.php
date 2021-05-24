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
    <?php include("connect.php");  ?>

    <h1 style="margin-top: 50px; text-align: center; width: 100%; color: #fff; font-size: 20px;">Kibra Admin - Araç Listesi</h1>

<table class="table" style="border: 1px solid #fff; color: #fff; background-color: #171921; margin: auto; width: 500px;">
<thead>
<tr>
  <th scope="col">Araç Sahibi (Hex)</th>
  <th>Plaka</th>
  <th>Araç Tipi</th>
  <th>Kuruluş</th>
  <th>Garajda mı</th>
  <th>Model</th>
  <th>Garaj</th>
  <th>İşlem</th>













</tr>
</thead>
<tbody>
<?php 

$sorgu = $baglanti->query("SELECT * FROM owned_vehicles"); 

while ($sonuc = $sorgu->fetch_assoc()) { 

$owner = $sonuc['owner'];
$plaka = $sonuc['plate'];
$type = $sonuc['type'];
$sirket = $sonuc['job'];
$garaj = $sonuc['stored'];
$model = $sonuc['model'];
$nerde = $sonuc['garage'];







?>
<tr>
  <th scope="row"><span class="badge bg-danger" style="font-size: 15px; color: #fff;"><?php echo $owner; ?></span></th>
  <td scope="row"><?php echo $plaka; ?></td>
  <td scope="row"><?php if($type == 'car'){ ?>Araba<?php } ?></td>
  <td scope="row"><?php if($sirket == 'ambulance') { ?><span class="badge bg-danger" style="font-size: 15px; color: #fff;">Hastane</span><?php } ?><?php if($sirket == 'police') { ?><span class="badge bg-info" style="font-size: 15px; color: #fff;">LSPD</span><?php } ?><?php if($sirket == ""){ ?><span class="badge bg-warning" style="font-size: 15px; color: #fff;">Kişisel Araç</span><?php } ?><?php if($sirket == 'sivil') { ?><span class="badge bg-warning" style="font-size: 15px; color: #fff;">Kişisel Araç</span><?php } ?></td>
  <td scope="row"><?php if($garaj == '1'){ ?><span class="badge bg-primary" style="font-size: 15px; color: #fff;">Garajda</span<?php } else { ?>Garajda Değil<?php }?></td>
  <td scope="row"><?php if($model == ''){ ?>Bilinmiyor<?php } else {?><span class="badge bg-danger" style="font-size: 15px; color: #fff;"><?php echo $sonuc['model'];  ?></span><?php } ?></td>
  <td scope="row"><?php echo $sonuc['garage']; ?></td>
  <td scope="row"><a href="deletevehicle.php?id=<?php echo $owner; ?>"<button type="submit" class="btn btn-danger">Aracı Sil</button></a></td>



 


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

