<?php 
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<?php
$page = (isset($_GET['page']) ? (int)$_GET['page']:1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql="select * from tasks limit ".$start.",".$perPage."";
$total = $db->query("select * from tasks")->num_rows;
$pages =ceil($total / $perPage);
$rows=$db->query($sql);
?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
  width: 80px;
  height: 35px;
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
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
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
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
				
			</div>
		</div>
	</div>
 <div class="container">
  <center><h1><b><u>Todo List</u></b></h1></center> 
  <div class="row" style="margin-top:70px;">
  
  <div class="col-md-10 col-md-offset-1">
 
  <table class="table">
  <button type="button" data-target="#myModal"  data-toggle="modal" class="btn btn-success">Add task</button>
  <button type="button"  class="btn btn-default pull-right" onclick="print()">Print</button>
  <hr><br>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add task</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
        <div class="form-group">
        <label>Task Name</label>
        <input type="text" required name="Task" class="form-control">
      </div>
      <input type="submit" name="send" value="send" class="btn btn-success">
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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

      <th><?php echo $row['Id'] ?></th>
      <td class="col-md-10"><?php echo $row['Task'] ?></td>
      <td><a href="update.php?Id=<?php echo $row['Id'];?>"  class="btn btn-success">Edit</a></td>
      <td><a href="delete.php?Id=<?php echo $row['Id'];?>"  class="btn btn-danger">Delete</a></td>
   </tr>
<?php endwhile; ?>

  </tbody>
</table>
 <center>
 <ul class="pagination">
 <?php for($i = 1 ; $i <= $pages ;$i++):?>
 <li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i;?></a></li>
<?php endfor; ?>
 </ul>
</center>
</div>
</div>
</div>
</body>
</html>
