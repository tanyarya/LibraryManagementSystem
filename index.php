<?php
include("setting.php");
session_start();
if(isset($_SESSION['sid']))
{
	header("location:home.php");
}
$sid=mysqli_real_escape_string($set,$_POST['sid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=sha1($pass);
	$sql=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['sid'];
		header("location:home.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="index.css" rel="stylesheet" type="text/css"/>
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>


<body style="background-image: url('https://www.pixel-studios.com/blog/wp-content/uploads/2018/12/012.jpg');">
    <nav class="navbar navbar-expand-lg ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#" style="padding-left: 2%; color: aliceblue;">E-RESOURCE MANAGEMENT SYSTEM</a>
        </div>
      </nav>
    <div class="login-wrapper">
        <form action="" method="POST" class="form">
        <?php echo $msg;?>
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="sid"  id="loginUser" required="required" />
                <label for="loginUser">User ID</label>
            </div>

	
            <div class="input-group">
                <input type="password" name="pass" id="loginPassword" required />
                <label for="loginPassword">Password</label>
            </div>
            <input type="submit" value="Login" class="submit-btn" />  <br> 
            <p>Admin? <a href="admin.php" style="text-decoration: none;">Login here</a> </p><br>
            <p>Don't have an account?<br>
            <a href="register.php" style="text-decoration: none;">Register</a>
            </p>
            
        </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

