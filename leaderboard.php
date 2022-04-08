<?php  
if (!isset($_SESSION)) {
      session_start();
}
	
?>
<html>
	<head>
		<title>Leaderboard</title>

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
			.table {
				 background-color: #c7c7c7;
           			 box-shadow: 5px 5px;
				 width: 600px;
				 position: relative;
				 margin-left: auto;
           			 margin-right: auto;
				 top: 15%;
       			 }

        		table, th, td {
            			border: 1px solid black;
           			border-spacing: 2px;
		
        		}
        		table {
            			width: 100%;
        		}
			th{
				background-color: blue;
				color: white;
			}
        		td {
            			text-align: center;
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
        		<li name="home" style="float:left"><a  href="/index.php">Home</a></li>
        		<li name="tetris" style="float:right"><a href="/tetris.php">Play Tetris</a></li>
        		<li name="leaderboard" style="float:right"><a class="active" href="/leaderboard.php">Leaderboard</a></li>
        		
    		</ul>
	<div class ="main">
		<a href="/logout.php" class="button">Log Out</a>
		<div class ="table">
			<?php
				$conn = new mysqli('localhost','ecm1417','WebDev2021','tetris');
				if ($conn->connect_error) {
  					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT Scores.Username, Score, Display FROM Scores, Users WHERE Scores.Username = Users.UserName AND Display = 1 order by Score DESC";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
  					echo "<table><tr><th>Username</th><th>Score</th></tr>";
  
  				while($row = $result->fetch_assoc()) {
    					echo "<tr><td>".$row["Username"]."</td><td>".$row["Score"]."</td></tr>";
  				}
  				echo "</table>";
				} else {
  					echo "0 results";
				}
				$conn->close();
			?>
	</div>
	</div>
	</body>
</html>
