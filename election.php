<?php 
	
	$mysqli = new mysqli("HOST", "USERNAME", "PASSWORD", "TABLE");
	
	if (mysqli_connect_errno()){

    echo "I cannot connect";
	}
	
	$_GET['method'];
	
	if ($_GET['method'] == "get"){
		
		$user = $_GET['username'];
		
		$query = "SELECT * FROM students WHERE username = '$user' ";
		
		$results = mysqli_query($mysqli, $query);
		
		$count = 0;
		
		while($array = mysqli_fetch_array($results)){
			
			$count ++;
			
			$newarray[$count]["user"] = $array['username'];
			$newarray[$count]["pass"] = $array['password'];
			$newarray[$count]["firstname"] = $array['firstname'];
			$newarray[$count]["surname"] = $array['surname'];
			$newarray[$count]["voted"] = $array['voted'];
			
			}
	
			echo json_encode($newarray, JSON_FORCE_OBJECT);
		
	}
	
	if ($_GET['method'] == "set"){
		
		$name = $_GET["username"];
		$vote = $_GET["vote"];

		$query = "UPDATE students SET voted='{$vote}' WHERE username = {$name}";

		$results = mysqli_query($mysqli, $query);
    
		if($results == 1) {$newarray["result"] = "Record Updated";

		echo json_encode($newarray);

		
		}
		else{
			
			$newarray["result"] = "Failed";
			echo json_encode($newarray);

		}
		}

?>
