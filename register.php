<?php  
if (!isset($_SESSION)) {
      session_start();
}
	
?>
<html>
	<head>
		<title>Register</title>
		<script>



	
		function validateForm() {
  			let a = document.forms["form"]["firstName"].value;
			let b = document.forms["form"]["lastName"].value;
			let c = document.forms["form"]["username"].value;
			let d = document.forms["form"]["password1"].value;
			let e = document.forms["form"]["password2"].value;
			let message = ""; 
			let error = false;
	
			<?php
			//$conn = new mysqli('localhost','ecm1417','WebDev2021','tetris');
			//$sql = "SELECT UserName FROM Users WHERE UserName = 'admin'";
			//$result = mysqli_query($conn, $sql);
   			//$row = mysqli_fetch_assoc($result);
			//if(mysqli_num_rows($result)){
    			//	echo "<script type='text/javascript'>alert('username already exists');</script>";
    			//	header("Location:register.php");
  			//}
			?>
			

			
				
  			if (a == "") {
				
    				 message = message.concat("Firstname cant be left blank "+"\n");
    				error = true;
  			}
  			if (b == "") {
    				 message = message.concat("Lastname cant be left blank "+"\n");
    				error = true;
  			}
  			if (c.length < 5) {
    				 message = message.concat("Username must be at least 5 charicters long "+"\n");
    				error = true;
  			}
  			if (d.length < 5) {
    				 message = message.concat("Password must be at least 5 charicters long "+"\n");
    				error = true;
  			}
  			if (!(d === e)) {
    				message = message.concat("Passwords must match "+"\n");
    				error = true;
  			}
		if (error == true){
  			alert(message);
			//return false;
		}

		}
		
		</script>
		

		<style>
			body {
				margin: 0;
				font-family: Arial, Helvetica, sans-serif;
			}



			.main{ 
				background-image:url('tetris.png');
  				background-position:center; 
  				background-repeat:no-repeat;
				background-size: 95% 100%;
				height: 100vh;
				width: 100vw;
	
			}
			
			ul {
            			list-style-type: none;
            			margin: 0;
            			padding: 0;
            			overflow: hidden;
            			background-color: blue;
            			position: fixed;
            			top: 0;
            			width: 100%;
        		}

        		li a {
            			display: block;
            			color: white;
            			text-align: center;
            			padding: 12px 14px;
            			text-decoration: none;
            			font-family: Arial;
            			font-weight: bold;
            			font-size: 12px;
       			}

        		li a:hover:not(.active) {
            			background-color: #111;
        		}

        		a.active {
            			background-color: #04AA6D;
        		}
			.form {
				 background-color: #c7c7c7;
           			 box-shadow: 5px 5px;
				width: 600px;
				position: relative;
				margin-left: auto;
           			 margin-right: auto;
				top: 15%;
       			 }

		</style>
	</head>
	<body>
		<ul>
        		<li name="home" style="float:left"><a class="active" href="/index.php">Home</a></li>
        		<li name="tetris" style="float:right"><a href="/tetris.php">Play Tetris</a></li>
        		<li name="leaderboard" style="float:right"><a href="/leaderboard.php">Leaderboard</a></li>
        		
    		</ul>
	<div class ="main">


		<div class = "form">
			<form name ="form" action="/index.php" onsubmit="return validateForm()" method="POST">
			<p><label>First Name: <input type="text" name="firstName"></label></p>
			<p><label>Last Name: <input type="text" name="lastName"></label></p>
			<p><label>Username: <input type="text" name="username"></label></p>
			<p><label>Password: <input type="password" placeholder="Password" id = "p1" name="password1"></label></p>
			<p><label>Repeat Password: <input type="password"id = "p2" placeholder="Confirm Password" name="password2"></label></p>
			

			<script>
			function myFunction() {
  				var x = document.getElementById("p1");
				var y = document.getElementById("p2");
  				if (x.type === "password") {
   					x.type = "text";
					y.type = "text";
  				} else {
    					x.type = "password";
					y.type = "password";
  				}
			}
			</script>
			<label for="display">Display Scores on Leaderboard</label><br>
                	<label for="yes">Yes</label>
                	<input type="radio" id="yes" name="display" value="1" checked>
                	<label for="no">No</label>
                	<input type="radio" id="no" name="display" value="0"><br><br>
			<input type="checkbox" onclick="myFunction()">Show Password
			<hr size=2 width="500px" align=left>
			<input type=submit value=Send>
			<input type=reset value=Cancel>
			</form>
		</div>

	</div>
	</body>
</html>
