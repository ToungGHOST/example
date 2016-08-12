<?php include "mysql_connect.php";?>
<html>
<head>
<title>ทดสอบ jQuery text highlight</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">

<style>

    .highlight {
        background-color: #FFFF88;
    }

</style>
</head>
<body>
    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">ทดสอบ jQuery text highlight</h3>
      </div>
      
      <div class="row">
      	<form class="form-inline" method="POST">
		  <div class="form-group">
			<label for="exampleInputEmail2">สถานที่</label>
			<input type="text" class="form-control" name="search_text" placeholder="ระบุชื่อสถานที่">
		  </div>
		  <button type="submit" class="btn btn-primary">ค้นหา</button>
		</form>
      </div>
      
	<?php
	$search_text = isset($_POST['search_text']) ? $_POST['search_text'] : '';
	$strSQL = "SELECT * FROM tourist_attraction
				WHERE detail LIKE '%$search_text%'
				";
	echo $strSQL;
	$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
	?>
	<div class="row">
	<table class="table table-bordered">
	  <tr>
		<td width="101">#</td>
		<td width="101">สถานที่</td>
		<td width="82">รายละเอียด</td>
	  </tr>
	  <?php
	  $i=0;
	  while($objResult = mysqli_fetch_array($objQuery))
	  {
	  	$i++;
	  ?>
	  <tr>
		<td><?php echo $i;?></td>
		<td><?php echo $objResult["title"];?></td>
		<td class="detail"><?php echo $objResult["detail"];?></td>
	  </tr>
	  <?php
	  }
	  ?>
	</table>
	</row>

	<footer class="footer">
        <p>FB :: https://www.facebook.com/ToBeDeveloper</p>
      </footer>

</div> <!-- /container -->

<script src="js/jquery.min.js"></script>
<script src="js/highlight.js"></script>

<script>
$("td.detail").highlight("<?php echo $search_text;?>");
</script>

<?php mysqli_close($conn);?>
</body>
</html>
