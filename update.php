<?php
        if (isset($_POST['rid'])){
        $db_file = "hoop6.db";
        try {
            //open connection to the hooper database file
            $db = new PDO("sqlite:" . $db_file);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Insert into illustrator
            $stmt = $db->prepare("UPDATE rhyme SET flor = :flor WHERE rID = :rID");
            $stmt->bindParam(":flor", $_POST["newflor"]);
            $stmt->bindParam(":rID", $_POST["rid"]);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
   }
?>
<html>
<head>
</head>
<body>
Update worked. Click below to return to main page.
<meta http-equiv="refresh" content="3;URL=index.html" />
If you are not redirected please click button below 
<form action="/~ubuntu/index.html">
  <input type="submit" value="Submit">
</form> 
</body>
</html>
