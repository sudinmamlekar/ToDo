<?php
session_start();
include 'functions.php';
$tuser_id = $_SESSION['id'];
$page = (isset($_GET['page']) ? (int)$_GET['page']:1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql="select * from tasks inner join shared on tasks.Id=shared.taskid where shared_with_id='$tuser_id' limit ".$start.",".$perPage."";
$total = $db->query("select * from shared")->num_rows;
$pages =ceil($total / $perPage);
$rows=$db->query($sql);
?>
<html>
<head>
	<title>Home</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style >
	.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #555;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float:left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}
.topnav-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
.btn-success{
  width: 75px;
  height: 35px;
}
input[type=checkbox]{
	vertical-align: middle;
	float: right;
}
.check{
	border-color: solid black;
	display: block;
	overflow: hidden;
	width: 200px;
}
</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<body>

	<div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
   <div class="topnav-right">
  <a href="login.php"><i class="fa fa-fw fa-user"></i> Logout</a>
</div>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Todays Task</a>
  <a href="#">Priority Task</a>
  <a href="#">Completed Task</a>
  <a href="#">Deleted Task</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
	 <div class="container">
  <center><h1><b><u>Shared Task</u></b></h1></center> 
  <div class="row" style="margin-top:70px;">
  <div class="col-md-10 col-md-offset-1">
 
  <table class="table">
  <br>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Task</th>
    </tr>
  </thead>
  <tbody>
    <tr> 
    <?php while($row = $rows->fetch_assoc()): ?>
      <th><?php echo $row['userid'] ?></th>
      <td class="col-md-10"><?php echo $row['Task'] ?></td>
     <!-- <td class="col-md-10"><?php// echo $row['username'] ?><form method="post" ><center><input type="checkbox" name="check[]" value="<?php //echo $row['id']; ?>" class="check"></center>  </td>-->
   </tr>
<?php endwhile; ?>
  </tbody>
</table>
<!--<input type="submit" name="submit"  value="share">-->
</form>
</div>
</div>
</div>
</body>
 <center>
 <ul class="pagination">
 <?php for($i = 1 ; $i <= $pages ;$i++):?>
 <li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i;?></a></li>
<?php endfor; ?>  