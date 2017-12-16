<!DOCTYPE html>
<html>
	<head>
		<title>The Kent Hooper German Rhyme Archive</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<div class="Header">
			<h1 class="Header">Welcome to the Kent Hooper German Rhyme Archive</h1>
			<p class="Header">Providing thousands of German nursey rhymes and their illustrations to search through</p>
		</div>
		<form action="search.php" method="post">
			<div class="search" >
    					<div float="left">
      					First line of rhyme:<br>
      					<input class="text" type="text" name="flor">
      					<br>
      					Illustrator (Probably have to split into last, first) :<br>
      					<input class="text" type="text" name="illuL" placeholder="Last"> <input class="text" type="text" name="illuF" placeholder="First">
      					<br>
      					Volume(our data for this is incomplete so not useful rn ):<br>
      					<input class="text" type="text" name="vol" >
      					<br>
      					Date Range:<br>
      					<input class="text" type="text" name="dateStart"> - <input class="text" type="text" name="dateEnd"><br>
      					<input type="checkbox" name="count" value="count">(going to get rid of, will be included on every query) Count of rhymes in a given search<br>
      					<input type="checkbox" name="illuFreq" value="illuFreq">(going to get rid of, will be included on every query) Frequency of illustration for a given search<br>
      					<input type="checkbox" name="onlyIllu" value="onlyIllu"> Only return illutrated rhymes(freq will obvi always be 100% if marked)<br>
					<div> <hr>Pagenated<br>
					<select>
						<option value="pagen">yes</option>
                                                <option value="noPagen">No</option>
					</select>	
     			 		<div> <hr>Gender<br>
      					<select>
  						<option value="male">Male</option>
  						<option value="female">Female</option>
					</select>
					</div><hr>
      					<input type="submit"value="Search" >
			</div>
		</action>
	</body>
</html>
