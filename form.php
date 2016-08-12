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
        <h3 class="text-muted">PHP MySQL กับการบันทึกข้อมูล : SUNZANDESIGN.BLOGSPOT.COM	</h3>
      </div>
      

      <div class="row">
      
      <form class="form-horizontal" method="POST" action="save.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_name" id="inputEmail3" placeholder="ระบุชื่อผู้โพสต์">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">รายละเอียด : </label>
    <div class="col-sm-10">
      <textarea name="txt_detail" class="form-control" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
		<label class="radio-inline">
		  <input type="radio" name="sex" id="inlineRadio1" value="1"> ชาย
		</label>
		<label class="radio-inline">
		  <input type="radio" name="sex" id="inlineRadio2" value="2"> หญิง
		</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
  </div>
</form>
      
      </div>
	
	</div>

	<footer class="footer">
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

<?php mysqli_close($conn);?>
</body>
</html>
