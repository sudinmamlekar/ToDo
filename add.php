<?php
session_start();
include('functions.php'); 
$username = $_SESSION['username'];	
$password = $_SESSION['password'];
$password = md5($password);
$query = "select id from users where username='$username' and password='$password'";
//$result =mysqli_query($db,$query);
$result = $db->query($query);
$tuser_id="";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo  $row['id'] ;
        $tuser_id = $row['id'] ;
        //echo "$tuser_id";
       
    }
} else {
    echo "0 results";
}

if(isset($_POST['send'])){
$name = htmlspecialchars($_POST['Task']);
$sql = "insert into tasks(Task, userid) values('$name','$tuser_id')";
$val = $db->query($sql);
if($val){
header('location: index.php');
}
}
?>
