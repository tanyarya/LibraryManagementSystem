<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$sid=$_POST['sid'];
$pas=sha1($_POST['pass']);
if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO students(sid,name,branch,sem,password,email) VALUES('$sid','$name','$branch','$sem','$pas','$email')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="User Already Exists";
	}
}
?>
<!DOCTYPE html>
<html >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link href="register.css" rel="stylesheet" type="text/css" />
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

<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Registration Form
		</div>
		<?php echo $msg;?>
		<form method="post">
			<div class="form_wrap">
					<div class="input_wrap">
						<label for="fname">First Name</label>
						<input type="text" name="name" id="fname">
					</div>
				<div class="input_wrap">
					<label for="sid">Student ID</label>
					<input type="text" name="sid" id="sid">
				</div>
				<div class="input_wrap">
					<label for="sem">Semester</label>
					<input type="text" name="sem" id="sem">
				</div>
        <div class="input_wrap">
					<label for="sem">Branch</label>
					<input type="text" name="branch" id="sem">
				</div>  
				<div class="input_wrap">
					<label for="mail">E-mail</label>
					<input type="text" name="email" id="country">
				</div>
        <div class="input_wrap">
					<label for="pass">Create Password</label>
					<input type="text" name="pass" id="pass">
				</div>
				<div class="input_wrap">
					<input type="submit" value="Register Now" class="submit_btn">
				</div>
        <a href="index.php" style="text-decoration:none; color: aliceblue; text-align: center">Go Back</a>
			</div>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body> 
</html>