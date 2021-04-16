<?php
include_once "logintodo.php";
if ($conn ->connect_error) {
    die("Fatal Error");
}

$id=$_GET['id'];                                    
$sql="SELECT * FROM todo WHERE id='$id'";                  
$rsql=mysqli_query($conn, $sql);                    
$rs=mysqli_fetch_assoc($rsql);                      
if ($rs['done']>0) {                                
    $cc=0;                                          
}else {
    $cc=1;                                          
}
$sql3="UPDATE todo SET done ='$cc' WHERE id='$id'"; 
$result3=mysqli_query($conn,$sql3);                 

header("location:todoo.php");                       


?>