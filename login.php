<?php
/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashp = hash('md5',$password);
	if (isset($_POST['username'])){
        	$db_file = "users.db";
		$db = new PDO("sqlite:" . $db_file);
        	try {
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           		$stmt = $db->prepare("select * from user where username = '$username' and password = '$hashp';");
			$stmt->execute();
                        $worked = $stmt->fetchAll();
           		$db = null;
	   		if(!empty($worked)){
				session_start();
				$_SESSION['username'] = $username;
				echo $_SESSION['username'];
				header("Location:VolumeStart.php"); /* Redirect browser */
			}
			else{
				echo "Invalid Credentials please try again <a href ='login.html'>Click here to go back to login page </a>";
			}
		}
		catch(PDOException $e) {
          		die('Exception : '.$e->getMessage());
        	}
	}
?>
