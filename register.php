<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<style type="text/css">
		h1{color:red; 
			text-align: center; 
			margin-left: 50px; 
			margin-bottom: 50px;

		}
		.lg{
			background: linear-gradient(to right, #ff105f,#ffad06);
			border-radius: 30px;
			transition: .5s;
			width: 180px;
			height: 50px;
			margin-left: 38%;
			margin-top: 10px;
		}
		.hore1{
			height: 100%;
			width: 100%;
			color: red;
			background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(images/regist.jpg);
			background-position: center;
			background-size: cover;
			position: absolute;
			border-radius: 50px 0  0;
		}
		.form-box1{
			width: 380px;
			height: 480px;
			position: relative;
			margin: 6% auto;
			background-color: #fff;
			padding: 5px;
			border-radius: 5px;
			padding-right: 80px;


				}
	</style>
</head>
<body>
	<div class="hore1">

			
			<div class="form-box1">
				
					<div id="content">
						<h1>Registar</h1>

						<form action="#" method="POST" name="form1">
					 		<input type="text" class="input-field" placeholder="meu email" name="email" required=""><br><br>
					 		<input type="text" class="input-field" placeholder="Telefone" name="phone" required=""><br><br>
					 		<input type="text" class="input-field" placeholder="Nome" name="username" required=""><br><br>
					 		<input type="text" class="input-field" placeholder="password" name="password" required=""><br><br>
					 		<input type="text" class="input-field" placeholder="role" name="role"><br><br>


					 		<input type="submit" class="input-field-btn" value="REGISTAR" name="submit">
					 		<a href="login.php"><button class="lg" type="button" style="">Login</button></a>
				 		
				 		</form>

				 
					</div>

						<?php

					 			include('connection.php');

					 			if($conn){
					 				if(isset($_POST['submit'])){

					 					$email="";
					 					if (isset($_POST['email'])) {
					 						$email=$_POST['email'];
					 					}

					 					$phone="";
					 					if (isset($_POST['phone'])) {
					 						$phone=$_POST['phone'];
					 					}

					 					$username="";
					 					if (isset($_POST['username'])) {
					 						$username=$_POST['username'];
					 					}
					 					$password="";
					 					if (isset($_POST['password'])) {
					 						$password=$_POST['password'];
					 					}
					 					$role="";
					 					if (isset($_POST['role'])) {
					 						$role=$_POST['role'];
					 					}

					 					$sql="SELECT * FROM users where email='$email' OR phone='$phone'";

					 					$result=mysqli_query($conn,$sql);

					 						if(mysqli_num_rows($result)>0){

					 							echo 'Registration failed, th user already exist';
					 						}
					 						else{
					 							$sql2="INSERT INTO users(email,phone,username,role,password) VALUES('$email', '$phone', '$username', '$role', '$password')";

					 							$result2=mysqli_query($conn,$sql2);

					 							if($result2){
					 								echo 'you have successfully register';

					 								// echo '<a href="login.php">LOGIN</a>';
					 							}
					 							else{
					 								echo 'registration failed, please tru again';
					 							}
					 						}
					 					}
					 			}else{
					 				echo "database not found";
					 			}
					 	?>
			</div>
	</div>
	
	

 	
</body>
</html>