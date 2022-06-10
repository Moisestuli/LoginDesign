<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina do Usuario</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<style type="text/css">
		.alert{
			color:green;
		}
	</style>
</head>
<body>

		<div id="hore">

			<div class="form-box">
				<div class="button-box">
					<div class="btn"></div>
					<a href="login.php"><button type="button" class="toggle-btn">Login</button></a>
					<a href="register.php"><button type="button" class="toggle-btn">Registar</button></a>
					
				</div>
				<!--social media icons-->
				<div class="social-icons">
					<a href="https://www.facebook.com/moiseis.tulitekule"><img src="images/facebook.png"></a> 
					<a href="https://www.youtube.com/channel/UCQlibny7qKjA46PWvJlYJAw"><img src="images/youtube.png"></a>
					
					<img src="images/whatsapp.png">
					
					<img src="images/linkedin.png">

				</div>

				<div class="input-group">
					
					<form class="input-group" action="#" method="POST">
						<input type="text" placeholder="username" name="username" class="input-field" required=""><br>
						<input type="text" placeholder="password" name="password" class="input-field" required=""><br>
						<input type="submit" value="LOGIN" name="submit" class="input-field-btn">
					</form>

				</div>

				

			</div>

				<div id="alert">
								<?php

							include('connection.php');

							if($conn){

								$username="";
								if (isset($_POST['username'])) {
									$username=$_POST['username'];
								}
								$password="";
								if (isset($_POST['password'])) {
									$password=$_POST['password'];
								}

								$sql="SELECT * FROM users where username='$username' AND password='$password'";

								$result=@mysqli_query($conn,$sql);

								if(@mysqli_num_rows($result)>0){

									$row=@mysqli_fetch_assoc($result);
									$role=$row['role'];
									$username=$row['username'];

									// nowinitialize session

									$_SESSION['username']=$row['email'];
									$_SESSION['role']=$row['role'];

									// check  the permission 
									if($role=="admin"){
										header("location:admin/");
									}
									else if($role=="studant"){
										header("location:studant/");
									}
									else if($role=="instructor"){
										header("location:instructor/");
									}
								}
								else{
									echo 'password ou Nome do ususario incorreto';
								}

							}
							else{

								echo 'connection failed';
							}
							?>
					
					</div>
			
		</div>
		

	


</body>
</html>