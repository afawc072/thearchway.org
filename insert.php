<?php include('variables/variables.php'); ?>

<?php
				$con=mysqli_connect($host, $user, $pass, $dbname);
		// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . 						mysqli_connect_error();
			  }
		
		$sql = "INSERT INTO TestInfo (Nom, Sexe)
                VALUES ('" . $_POST["nom"] . "', '" . $_POST["sexe"] . "')";
		if(!mysqli_query($con,$sql))
		{
		die('Error : ' . mysqli_error($con));
		}
		echo "Insertion Reussi de " . $_POST["nom"] . " du sexe " . $_POST["sexe"] . "!";

		mysqli_close($con);
		header('Location: TestBD.php'); 
	?>
