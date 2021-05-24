<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <?php 
$baglanti->set_charset("utf8");





?>

<h1 style="margin-top: 50px; text-align: center; width: 100%; color: #fff; font-size: 20px;">Kibra Admin - Whitelist Listesi</h1>
<button data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="width: 500px; margin-left: 36.8%;" type="button" class="btn btn-success" >Whitelist Ekle</button><br>
<table class="table" style="border: 1px solid #fff; color: #fff; background-color: #171921; margin: auto; width: 500px;"><br>
<thead>
<tr>
  <th scope="col">Hex</th>
  <th scope="col">Discord ID</th>
  <th scope="col">İşlem</th>

</tr>
</thead>
<tbody>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Whitelist Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="whitelistekle.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Steam (Hex): </label>
            <input name="hex" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Discord ID:</label>
            <input name="dcid" type="text" class="form-control" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
          <input class="btn btn-danger" value="Ekle" type="submit"/>
    </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
<?php 

$sorgu = $baglanti->query("SELECT * FROM dcwl order by id DESC"); 

while ($sonuc = $sorgu->fetch_assoc()) { 

$hex = $sonuc['hex'];
$discordid = $sonuc['dcid'];



?>
<tr>
  <th scope="row"><?php echo $hex; ?></th>
  <td><b><font color="green"><?php echo $discordid; ?></font></td>
  <td><a href="deletewhitelist.php?id=<?php echo $hex; ?>"<button class="btn btn-danger" type="button">Sil</button></td>



</tr>
<?php 
} 
?>



</tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

