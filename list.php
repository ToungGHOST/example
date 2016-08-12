<?php include "mysql_connect.php";?>
<html>
<head>
<title>PHP MySQL กับการบันทึกข้อมูล : SUNZANDESIGN.BLOGSPOT.COM</title>
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
        <h3 class="text-muted">PHP MySQL การค้นหาข้อมูล : SUNZANDESIGN.BLOGSPOT.COM	</h3>
      </div>
    
      <div class="row">
		<?php
			$data = array();
			if ($result = $conn->query("SELECT * FROM comments")) {
				//printf("Select returned %d rows.\n", $result->num_rows);
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					//print_r($row);echo '<br>';
					$data[] = $row;
				}

				/* free result set */
				$result->close();
			}
			$conn->close();
			
			//echo '<pre>', print_r($data, true), '</pre>';
		?>
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>รหัส</th>
					<th>ชื่อ</th>
					<th>ความคิดเห็น</th>
					<th>เพศ</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($data as $row){
						
						if($row['sex'] == 1){
							$sex = 'ชาย';
						}else if($row['sex'] == 2){
							$sex = 'หญิง';
						}else{
							$sex = 'ไม่ระบุ';
						}
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['detail'];?></td>
					<td><?php echo $sex;?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
      </div>
      
	</div><!-- container -->

	<footer class="footer">
		<br/><br/>
		<div class="container">
        <i>ติดตามความเคลื่อนไหวได้ที่ :: <a href='https://www.facebook.com/ToBeDeveloper'>https://www.facebook.com/ToBeDeveloper</a></i>
        </div>
    </footer>

</div> <!-- /container -->

<script src="js/jquery.min.js"></script>
<script src="js/highlight.js"></script>

<script>
$("td.detail").highlight("<?php echo $search_text;?>");
</script>
</body>
</html>
