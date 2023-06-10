<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
$aid=mysqli_real_escape_string($set,$_POST['aid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($aid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=sha1($pass);
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:adminhome.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="index.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image: url('https://c4.wallpaperflare.com/wallpaper/148/392/948/1920x1080-px-books-interior-design-interiors-knowledge-library-shelves-anime-pokemon-hd-art-wallpaper-preview.jpg');">
<nav class="navbar navbar-expand-lg ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#" style="padding-left: 2%; color: aliceblue; height:47.4px; padding-top:10px">E-RESOURCE MANAGEMENT SYSTEM</a>
        </div>
      </nav>
<br />

<div class="login-wrapper">
        <form action="" method="POST" class="form">
        <?php echo $msg;?>
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="aid"  id="loginUser" required="required" />
                <label for="loginUser">Admin id</label>
            </div>

	
            <div class="input-group">
                <input type="password" name="pass" id="loginPassword" required />
                <label for="loginPassword">Admin Password</label>
            </div>
            <input type="submit" value="Login" class="submit-btn" />
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
