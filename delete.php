<?php
include'functions.php';
$Id = (int)$_GET['Id'];
$sql="delete from tasks where Id='$Id'";
$val=$db->query($sql);
if($val){
    header('location:index.php');
};
?>