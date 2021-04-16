<?php

include_once "logintodo.php";
if ($conn ->connect_error) {
    die("Fatal Error");
}
date_default_timezone_set('Asia/Taipei');
$id=$_GET['id'];
$sql2="SELECT * FROM todo WHERE id = '$id'";
$result=mysqli_query($conn, $sql2);                  

if (isset($_POST['edit'])) {
    $edit=$_POST['edit'];
    $sql3="UPDATE todo SET task ='$edit' WHERE id='$id'";
    $result3=mysqli_query($conn,$sql3);
    header("location:todoo.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo-List</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }

        table button {
            margin-left: 20px
        }
    </style>
</head>
<body>


    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Task List
                </a>
            </div>
        </div>
    </nav>
        <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            


                <div class="panel-body">

            
            <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    修改內容
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>

<div class="top">
 <a href="todoo.php"><button type="button" class="btn btn-primary btn-lg">回到todo頁面</button></a>
</div>
      
<p>&nbsp;</p>
<p>&nbsp;</p>


<tr></tr>
<?php
for($i=1;$i<=mysqli_num_rows($result);$i++){                
$rs=mysqli_fetch_assoc($result);

?>

<tr>
<td class="col-sm-6"><?php echo $rs['task']?></td>          
<!-- Task Buttons -->
<td class="col-sm-6">
</td>
</tr>


<?php 
}       
?>

<form id="form1" name="form1" method="post" action="">
<input type="text" name="edit" value="請輸入文字" id="content" cols="50" rows="1" onfocus="if (value =='請輸入文字'){value =''}">
<input type="submit" class="btn btn-success" value="修改"/>


</body>
</html>