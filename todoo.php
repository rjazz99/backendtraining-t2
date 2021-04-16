<?php 
include_once "logintodo.php";     
if ($conn ->connect_error) {
    die("Fatal Error");           
}
date_default_timezone_set('Asia/Taipei');
$task=$_POST['task'];             
$time=date("Y:m:d H:i:s");        
$query = "INSERT INTO todo VALUES ('$task','$time', NULL, 0)";      
if (isset($task)) {                                                 
    $result=$conn->query($query);                                   
}
$sql='SELECT * FROM todo order by time desc';                                   
$rsql=mysqli_query($conn, $sql);                                 

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
<body id="app-layout">
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="" method="POST" class="form-horizontal">
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="task" id="task-name" class="form-control" value="">
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            
            <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>

<?php
for($i=1;$i<=mysqli_num_rows($rsql);$i++){               
$rs=mysqli_fetch_assoc($rsql);                            
$dd=$rs['done'];                                          
?>
                            <tr>
                                
                                <td class="col-sm-6">
                                <?php 
                                if ($dd>0) {                                    
                                ?><del><?php echo $rs['task']; ?></del><?php    
                                }else{
                                    echo $rs['task'];                           
                                }                                               
                                ?>

                                <!-- Task Buttons -->
                                <td class="col-sm-6">
                                        <button type="submit" class="btn btn-success" onclick="location.href='todo-done.php?id=<?php echo $rs['id']?>'"><i class="fa fa-btn fa-thumbs-o-up"></i>completed</button> 
                                        <button <?php if($dd>0){?>disabled <?php } ?>type="submit" class="btn btn-primary" onclick="location.href='todo-edit.php?id=<?php echo $rs['id']?>'"><i class="fa fa-btn fa-pencil"></i>edit</button>
                                        <button type="submit" class="btn btn-danger" onclick="location.href='todo-delete.php?id=<?php echo $rs['id']?>'"><i class="fa fa-btn fa-trash"></i>delete</button>
                                </td>
                            </tr>
<?php 
}       
?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>