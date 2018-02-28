

<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<ul>
		<li><a class="active" href="index.html">Home</a></li>
		<li><a href="login.html">Login</a></li>
		<li><a style="text-align:right;" href="logout.php">Logout</a></li>
	</ul>
	<?php
	$attr = '*';
	$rel = "rhyme natural join contains natural join volume natural join drawFor natural join illustrator";
	$cond = "";

	if(isset($_POST['flor']) && $_POST['flor'] != "") {
		$cond = $cond . "flor='" . $_POST['flor'] ."'";
	}
	if(isset($_POST['illuL']) && $_POST['illuL'] != "") {
		if($cond != "") {
			$cond = $cond . " AND ";

		}
		$cond = $cond . "lname='" . $_POST['illuL'] . "'";
	}
	if(isset($_POST['illuF']) && $_POST['illuF'] != "") {
		if($cond != "") {
			$cond = $cond . " AND ";
		}
		$cond = $cond . "fname='". $_POST['illuF'] . "'";
	}
	if(isset($_POST['onlyIllu']) && $_POST['onlyIllu'] != "") {
		if($cond != "") {
			$cond = $cond . " AND ";
		}
		if($_POST['onlyIllu'] == "onlyIllu") {	
			$cond = $cond . "illu='yes'";
		}
	}
	if(isset($_POST['dateStart']) && $_POST['dateStart'] != "") {
		if($cond != "") {
			$cond = $cond . " AND ";
		}
		$cond = $cond . "datePublished>=" . $_POST['dateStart'];
	}
	if(isset($_POST['dateEnd']) && $_POST['dateEnd'] != "") {
		if($cond != "") {
			$cond = $cond . " AND ";
		}
		$cond = $cond . "datePublished<=" . $_POST['dateEnd'];
	}
	if(isset($_POST['gender']) && $_POST['gender'] != "both_gender") {
		if($cond != "") {
			$cond = $cond . " AND ";
		}
		if($_POST['gender'] == "male") {
			$cond = $cond . "gender='M'";
		}
		else if($_POST['gender'] == "female") {
			$cond = $cond . "gender='F'";
		}
	}
			//echo "($cond)";

	$db_file = 'hoop6.db';

			//$other_query = "SELECT DISTINCT * FROM contains NATURAL JOIN drawn NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND illu = 'yes' ORDER BY volumeID";


	try {
		$db = new PDO('sqlite:' . $db_file);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo $attr. "<br>";
				//echo $rel. "<br>";
				//echo $cond. "<br>";
				//$stmt = $db->prepare("SELECT * FROM rhyme NATURAL JOIN contains NATURAL JOIN volume NATURAL JOIN drawFor NATURAL JOIN illustrator WHERE :cond", array(PDO::ATTR_CURSOR => PDO::CURSOR_);
				//$stmt->bindParam(":cond", $cond);
				//$stmt->execute();

				//---------------old query prep code------------
				//$query_str = "select distinct $attr from $rel where $cond";
				//$result_set = $db->query($query_str);
				//$count = "select distinct count(rID) from $rel where $cond";
				//$illuFreq = "select distinct count(illu) from $rel where $cond and illu = 'yes'";
				//$illuFreqR = $db->query($illuFreq);
				//$count_result = $db->query($count);

		$query_str = "";
		if($cond == "")
		{
			$query_str = "select distinct $attr from $rel";
		}
		else
		{
			$query_str = "select distinct $attr from $rel where $cond";
		}
		
		$result_set = $db->query($query_str);

		$count = "";
		if($cond == "")
		{
			$count = "select distinct count(rID) from $rel";
		}
		else
		{
			$count = "select distinct count(rID) from $rel where $cond";
		}

		$illuFreq ="";
		if($cond == "")
		{
			$illuFreq = "select distinct count(illu) from $rel";
		}
		else
		{
			$illuFreq = "select distinct count(illu) from $rel where $cond and illu = 'yes'";
		}
		
				//$illuFreq = "select distinct count(illu) from $rel where $cond and illu = 'yes'";
		$illuFreqR = $db->query($illuFreq);
		$count_result = $db->query($count);

		while ($row = $count_result->fetch(PDO::FETCH_ASSOC))
			{
                			//useful for getting info about variables print_r($row);
        				// echo "Total number of instances returned: ".$row["count(rID)"];
				$totalcount = $row["count(rID)"];
			}
			while ($row = $illuFreqR->fetch(PDO::FETCH_ASSOC))
				{
                                        //useful for getting info about variables print_r($row);
                                        //echo "Freq: ".$row["count(illu)"]."/".$totalcount;
					$freq = $row["count(illu)"];
				}
				?>
				<head>
					<style>
					div.head {
						background-color: lightgray;
						width: 1200px;
						border: 2px solid gray;
						padding: 5px;
						margin: 5px;
						line-height: 170%;
					}
				</style>
			</head>
			<body>
				<div class="head">
					Your search returned a total of <?php echo " $totalcount";?> rhyme instances &emsp; <?php echo " $freq";?> out of  <?php echo " $totalcount";?> rhyme instances are illustrated
				</div>
				</body>                                 <?php
				session_start();
				foreach($result_set as $tuple) {
					//echo "$tuple[rID] | $tuple[flor] | $tuple[illustratorID] | $tuple[lname] | $tuple[fname] | $tuple[datePublished]<br/>\n";
					//print_r($tuple);
					$_SESSION['deletevar'] = $tuple;
					?>
					<head>
						<style>
						div {
							background-color: white;
							width: 1200px;
							border: 2px solid black;
							padding: 5px;
							margin: 5px;
							line-height: 170%;
						}
					</style>
				</head>
				<body>
					<div>
						<u>First Line of Rhyme:</u><?php echo " $tuple[flor]";?>&emsp; <u>Illustrator:</u> <?php echo " $tuple[lname]";?>, <?php echo " $tuple[fname]";?>&emsp; <u>Gender:</u> <?php echo " $tuple[gender]";?>&emsp; <u>Illustrator Lifespan:</u> <?php echo " $tuple[dob] ";?>-<?php echo " $tuple[dod]";?><br>
						<u>Volume:</u> <?php echo " $tuple[title]";?>,&emsp; &emsp;<u>Date Published:</u> <?php echo " $tuple[datePublished]";?>
						&emsp;<u>Paginated:</u> <?php echo " $tuple[paginated]";?> &emsp;<u>External:</u> <?php echo " $tuple[external]";?>&emsp;<u>Illustrated:</u> <?php echo " $tuple[illu]";?><br>
						<u>Source(s):</u> <?php echo " $tuple[source1]";?>, <?php echo " $tuple[source2]";?>

						<form action="delete.php">
							<input type='hidden' name='var' value="<?php echo $tuple ?>"/>
							<input type="submit" value="Delete" />
						</form>
					</div>

					</body>					<?php
				}

				$db = null;
			}
			catch(PDOException $e) {
				die('Exception : ' . $e->getMessage());
			}
			?>
		</body>
		</html>
