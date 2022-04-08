<?php  

session_start();	
?>

	<script>
function myFunction() {
  var x = document.getElementById("popup");
    x.style.display = "none";
  }
}
</script>


<html>
	<head>
		<title>Home</title>



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
			#popup, #logged-in {
				 background-color: #c7c7c7;
           			 box-shadow: 5px 5px;
				 width: 600px;
				 position: relative;
				 margin-left: auto;
           			 margin-right: auto;
				 top: 15%;
       			 }
			.button {
  				background-color: #4CAF50;
				text-decoration: none;
  				border: none;
  				color: white;
  				padding: 14px 30px;
  				text-align: center;
  				
  				display: inline-block;
  				font-size: 16px;
				bottom:   0;
				right:    0;
  				margin: 4px 2px;
  				cursor: pointer;
				position: absolute;
				
			}	
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





	<a href="/logout.php" class="button">Log Out</a>

	<?php
			
	if(isset($_SESSION['username']) and strlen($_SESSION['username'])>4){?>   
		<div id="logged-in" >

		
            	<h1 class="div-title">Welcome to Tetris</h1><br>
            	<?php echo"<p>Welcome back ".$_SESSION['username']."!</p>" ?>
           	<a href="tetris.php"><button type="button" class="play-button">Click here to play</button></a>
		
        	</div>
		<?php
		
	}else{
		if( isset($_POST['firstName']) and isset($_POST['lastName']) and isset($_POST['username']) and isset($_POST['password1']) and isset($_POST['display'])) {
			$username = $_POST['username'];

		echo "<script type='text/javascript'>alert('entering values to db');</script>";
		$conn = new mysqli('localhost','ecm1417','WebDev2021','tetris');
		
		
		$sql = "SELECT UserName FROM Users WHERE UserName='{$username}'";
		$result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
      		if (mysqli_num_rows($result) > 0) {
       			 echo "Username is already exist";
     		 	echo "<script type='text/javascript'>alert('username already exists');</script>";
    				header("Location:register.php");
  			}else{
			echo "<script type='text/javascript'>alert('uur calm');</script>";
		}


			echo "<script type='text/javascript'>alert('entering values to db');</script>";
			
			$display = (int)$_POST['display'];
			$username = $_POST['username'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$password = $_POST['password1'];
			
			
			$conn = new mysqli('localhost','ecm1417','WebDev2021','tetris');
			if($conn->connect_error){
				echo "$conn->connect_error";
				die("Connection Failed : ". $conn->connect_error);
			} else {
				$stmt = $conn->prepare("INSERT INTO Users(UserName, FirstName, LastName, Password, Display) values(?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssi", $username, $firstName, $lastName, $password, $display);
				$execval = $stmt->execute();
				echo $execval;
				echo "Registration successfull...";
				$stmt->close();
				$conn->close();
			}
			header("Location:index.php");
			}

	}

	if (strlen($_GET['loginName'])>4){
		
		$conn = new mysqli('localhost','ecm1417','WebDev2021','tetris');
		$sql = "SELECT * FROM Users WHERE UserName='".$_GET['loginName']."' LIMIT 1;";
		$result = mysqli_query($conn, $sql);
   		$row = mysqli_fetch_assoc($result);
		if ($row["Password"] === $_GET['Passcode']) {
       			$_SESSION['username'] = $_GET['loginName'];
       			$_SESSION['display'] = $row['Display'];
			header("Location:index.php");
		}else{
			header("Location:logout.php");
			echo "<script type='text/javascript'>alert('incorrect password');</script>";    
		}
	}elseif (!isset($_POST['username']) and !isset($_SESSION['username'])){
		
		?>
		<div id = "popup">
		
		<form method="GET" action= " " name ="login">
        		Username: <input type="text" placeholder="username"name="loginName" style="width: 2cm"><br>
        		Password: <input type="password" placeholder="password"name="Passcode" id = "password" style="width: 2cm"><br>
			<p><input type="checkbox" onclick="showPassword()">Show Password</p>

			<script>
			function showPassword() {
  				var x = document.getElementById("password");
  				if (x.type === "password") {
    					x.type = "text";
 				} else {
    					x.type = "password";
  				}
			}
			</script>
       			<input type="submit" name = "login" value="Login" >
			
			</form>
			<p>Don't have a user account? <a href="register.php">Register now</a></p>
		</div>
		
		
		<?php } ?>
			
        </div>
	

	
	</body>
</html>
