<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location:index.html");
}
?>
<html>
	<head>
		<title>Volume Insert</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
<ul>
                        <li><a class="active" href="index.html">Home</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a style="text-align:right;" href="logout.php">Logout</a></li>
                </ul>
		<div class="Search">
			<p class="Header">Insert Volume</p>
			<div class ="Search_area">
				<!-- <p><u>Please enter the following information about the new volume:</u></p>-->
				<form action="InsertVolume.php" method="post">
					Title: <input class="text" type = "text" name = "title"><br>
					Date Published: <input class="text" type = "text" name = "datePublished"><br>
					Was this volume paginated (Yes or No): 
						<select name = "paginated">
					        <option value="Yes">Yes</option>
  						<option value="No">No</option>
						</select><br>
					Was the date of publication found from an external source (Yes or No):
					 	<select name = "external">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select><br>
					<input type="submit">
				</form>
			</div>
		</div>
	</body>
</html>


