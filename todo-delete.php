<?php
include_once "logintodo.php";
if ($conn ->connect_error) {
    die("Fatal Error");
}

$id=$_GET['id'];

$dd="SELECT done FROM todo WHERE id ='$id'";
if ($dd="1") {
    header("location:todo-edit.php");
}
$del="DELETE FROM todo WHERE id='$id'";
$result=mysqli_query($conn,$del);
header("location:todoo.php");



?>