<?php  

      session_start();

	
?>
<html>
	<head>
		<title>Play Tetris</title>

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
        		#tetris-bg {
            			width: 300px;
            			height: 600px;
            			background-image: url("tetris-grid-bg.png");
        		}
			.gameboard{
				 background-color: #c7c7c7;
           			 box-shadow: 5px 5px;
				width: 300px;
				position: relative;
				margin-left: auto;
           			 margin-right: auto;
				top: 15%;

       			 }
			#Start{
				position: absolute;
				left:    0;
				top:   10%;
				padding: 15px 32px;
            			background-color: blue;
            			border: 1px solid white;
            			color: white;	
            			text-align: center;
       			     	font-size: 15px;
       			     	cursor: pointer;
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
			sendScore {
  				display:absolute;
   				justify-content:center;
   				align-items:center;
   				height:1;
			}
        }
			

		</style>
	</head>
	<body>
		<ul>
        		<li name="home" style="float:left"><a  href="/index.php">Home</a></li>
        		<li name="tetris" style="float:right"><a class="active"href="/tetris.php">Play Tetris</a></li>
        		<li name="leaderboard" style="float:right"><a href="/leaderboard.php">Leaderboard</a></li>
        		
    		</ul>
	<div class ="main">
		
		<a href="/logout.php" class="button">Log Out</a>
		<button type="button" id="Start" onclick="startGame()">Start Game</button>
		<div class = "gameboard">
			<div id = "tetris-bg">	
				
			
			</div>
		</div>
		
	<form method="GET" action= " " name ="sendScore">
  		<label for="fname">Enter Score (Proof that the mysql works)</label><br>
  		<input type="text" id="score" name="score"><br>
  		<input type="submit" value="Submit">
	</form> 


	<?php
	if(isset($_GET['score']) and isset($_SESSION['username'])){
		$score = $_GET['score'];
		
		
	$servername = "localhost";
	$username = "ecm1417";
	$password = "WebDev2021";
	$dbname = "tetris";

	$conn = new mysqli($servername, $username, $password, $dbname);


	$sql = "INSERT INTO Scores (Username, Score)
VALUES ('".$_SESSION['username']."', '$score')";
	if ($conn->query($sql) === TRUE) {
  		echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	}
?>
	
	
	

	</div>
	<script>  
	function startGame(){
	document.getElementById("Start").style.display="none"; 
	}
	let grid = Array(20).fill().map(() => Array(10).fill(0));
	var shapes = {
            "L": [ [1,2],[2,2],[3,2],[3,3] ],
            "Z": [ [1,3],[2,3],[2,2],[3,2] ], 
            "S": [ [1,2],[2,2],[2,3],[3,3] ],
            "T": [ [1,2],[2,2],[2,3],[3,2] ], 
            "O": [ [1,1],[1,2],[2,1],[2,2] ],
            "I": [ [1,3],[2,3],[3,3],[4,3] ],
            "J": [ [1,2],[1,3],[2,2],[3,2] ]
                
            
        };
	console.log(shapes);
	var music = new Audio('soundtrack.mp3');
        music.play();
        music.loop = true;



	function placeBlock(){
		var allShapes = ["L","Z","S","T","O","I","J"];
            var currentBlock = allShapes[Math.floor(Math.random()*7)];
		if (currentBlock === "L"){
			grid[0][4]=1;
			grid[1][4]=1;
			grid[2][4]=1;
			grid[2][5]=1;
		}
		if (currentBlock === "Z"){
			grid[0][4]=2;
			grid[0][3]=2;
			grid[1][4]=2;
			grid[1][5]=2;
		}
		if (currentBlock === "S"){
			grid[0][4]=3;
			grid[0][5]=3;
			grid[1][4]=3;
			grid[1][3]=3;
		}
		if (currentBlock === "T"){
			grid[0][4]=4;
			grid[0][3]=4;
			grid[0][5]=4;
			grid[0][4]=4;
		}
		if (currentBlock === "O"){
			grid[0][4]=5;
			grid[0][5]=5;
			grid[1][4]=5;
			grid[1][5]=5;
		}
		if (currentBlock === "I"){
			grid[0][4]=6;
			grid[1][4]=6;
			grid[2][4]=6;
			grid[3][4]=6;
		}
		if (currentBlock === "J"){
			grid[0][4]=7;
			grid[1][4]=7;
			grid[2][4]=7;
			grid[2][3]=7;
		}
	return grid;
}

		 function move(direction) {
			if (direction = "left"){
				
			}
			if (direction = "right"){
			}
			if (direction = "down"){
			}
			if (direction = "automatic"){
			}
}

	</script>




	
	
	</body>
</html>
