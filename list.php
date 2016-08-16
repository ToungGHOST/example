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
      
       <form class="form-horizontal" method="POST" action="list.php">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">ค้นหา : </label>
			
			 <input type="text" class="form-control" name="txt_keyword" placeholder="ค้นหา">
			<input type="submit" value="ค้นหา" />
		</div>
		
			
		
	</form>
    
      <div class="row">
		<?php
		
			$search_text = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
			
			$data = array();
			$sql = "SELECT * FROM comments  
					WHERE `name` LIKE '%$search_text%'  
					OR detail LIKE '%$search_text%'";
			echo $sql;
			if ($result = $conn->query($sql)) {
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
