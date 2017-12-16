<?php
session_start();
$tuple = $_SESSION['deletevar'];
        if (isset($tuple[0])){
        $db_file = "hoop6.db";
        try {
            //open connection to the hooper database file
            $db = new PDO("sqlite:" . $db_file);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("DELETE FROM contains WHERE rID = :rID AND volumeID = :vID");
            $stmt->bindParam(":rID", $tuple['rID']);
	    $stmt->bindParam(":vID", $tuple['volumeID']);
            $stmt->execute();
            $stmt2 = $db->prepare("DELETE FROM drawn WHERE rID = :rID AND volumeID = :vID");
            $stmt2->bindParam(":rID", $tuple['rID']);
            $stmt2->bindParam(":vID", $tuple['volumeID']);
            $stmt2->execute();
            $db = null;

        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        };
   }
?>
<html>
<head>
</head>
<body>
Update worked. Click below to return to main page.
<meta http-equiv="refresh" content="1;URL=index.html" />
If you are not redirected please click button below 
<form action="/~ubuntu/index.html">
  <input type="submit" value="Submit">
</form> 
</body>
</html>


