<?php
 error_reporting(0);
 
 $mai=base64_decode($_GET['user_id']);
if(isset($_POST["delete"])) {   
    $check = mysqli_fetch_assoc($mysqli->query("select * from registration where email = '".base64_encode($mai)."' 
 and password = '".base64_encode($_POST['password'])."'"));
 if($check['password'] == base64_encode( $_POST['password'])){
  
    $mysqli->query("delete from contact where email= '$mai'");
    $mysqli->query("delete from services where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from skill where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from prolife where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from details where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from content where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from achievements where email= '".base64_encode($mai)."'");
    $mysqli->query("delete from registration where email= '".base64_encode($mai)."'");
    header('location: index.php');
 }else{
     $errors[] = 'Incorrect password. ';
        }if (!empty($errors)) {                     
            $errorstring = "Error! <br /> The following error(s) occurred:<br>";
        foreach ($errors as $msg) 
        {
                $errorstring .= " $msg<br>\n";
            }
            $errorstring .= "Please try again.<br>";
            echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
            }        
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .container{
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Trang xóa thành viên</h1>
                    </div>
                    <form method="post">
                        <div class="container">
                          
                            <div class="form-group"><label class="text-secondary">Password</label>
                            <input name= "password" id="password" class="form-control" type="password" required="" placeholder="Enter Password"></div>
                            <p>Bạn thật sự muốn xóa thành viên này?</p><br>
                            <p>
                                <input name="delete" type="submit" value="Xóa" class="btn btn-warning">
                                <a href="index.php" class="btn btn-default">Thôi</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>