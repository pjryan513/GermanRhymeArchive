<!DOCTYPE html>
<html>
	<head>
		<title>Archive View</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
	<ul>
                        <li><a class="active" href="index.html">Home</a></li>
                        <li><a href="#contact">Logout</a></li>
                        <li><a href="#about">Login</a></li>
                </ul>

		<table>
<?php
	
	$rel = "def";

	if(isset($_GET['rhy'])) {
		$rel = $_GET['rhy'];
	}
	else if(isset($_GET['illu'])) {
		$rel = $_GET['illu'];
	}
	else if(isset($_GET['vol'])) {
		$rel = $_GET['vol'];
	}

	if($rel != "def")
	{
		$db_file = 'hoop6.db';

		try {
			$db = new PDO('sqlite:' . $db_file);

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$query_str = "select * from $rel";
			$result_set = $db->query($query_str);


			if($rel == "rhyme") {
				?>
				<tr>
					<th>Rhyme ID</th>
					<th>First Line of Rhyme</th>
				</tr> 
				<?php
			}
			else if($rel == "illustrator") {
				?>
				<tr>
					<th>Illustrator ID</th>
					<th>Last Name</th>
					<th>First name</th>
					<th>Gender</th>
					<th>Date of Birth</th>
					<th>Date of Death</th>
					<th>Source 1</th>
					<th>Source 2</th>
				</tr>
				<?php
			}
			else if($rel == "volume") {
				?>
				<tr>
					<th>Volume ID</th>
					<th>Date Published</th>
					<th>Paginated</th>
					<th>External</th>
				</tr>
				<?php
			}

			foreach($result_set as $tuple) {

				if($rel == "rhyme") {
					?>
					<tr>
						<td> 
							<?php echo "$tuple[rID]" ?>
						</td> 
						<td>
							<?php echo "$tuple[flor]" ?>
						</td>
						<td>
	<?php
	if(!isset($_SESSION)) 
    	{ 
        	session_start(); 
    	}
	if(isset($_SESSION['username'])){
?>
      <form method="post" action="update.php">
        <div>
	  <input type="hidden" name="rid" value=<?php echo "$tuple[rID]" ?>>
          <input type="text" size="35" name="newflor" id="usrnm" placeholder="Enter updated first line of rhyme here">
          <input type="submit" data-inline="true" value="Update">
        </div>
      </form>
<?php
}
?>
						</td>
					</tr>
					<?php
				}
				else if($rel == "illustrator") {
					?>
					<tr>
						<td>
							<?php echo "$tuple[illustratorID]" ?>
						</td>
						<td>
							<?php echo "$tuple[lname]" ?>
						</td>
						<td>
							<?php echo "$tuple[fname]" ?>
						</td>
						<td>
							<?php echo "$tuple[gender]" ?>
						</td>
						<td>
							<?php echo "$tuple[dob]" ?>
						</td>
						<td>
							<?php echo "$tuple[dod]" ?>
						</td>
						<td>
							<?php echo "$tuple[source1]" ?>
						</td>
						<td>
							<?php echo "$tuple[source2]" ?>
						</td>
					</tr>
					<?php
				}
				else if($rel == "volume") {
					?>
					<tr>
						<td>
							<?php echo "$tuple[volumeID]" ?>
						</td>
						<td>
							<?php echo "$tuple[datePublished]" ?>
						</td>
						<td>
							<?php echo "$tuple[paginated]" ?>
						</td>
						<td>
							<?php echo "$tuple[external]" ?>
						</td>
					</tr>
					<?php
				}
			}

			$db = null;
		}
		catch(PDOExecption $e) {
			die('Expection : '.$e->getMessage());
		}
	}
	else
	{
		echo "ERROR:  relation name was still set to default, no database name choosen";
	}
?>
		</table>
	</body>
</html>
