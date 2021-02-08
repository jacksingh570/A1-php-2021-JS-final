<!--BASIC HTML SET UP-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Save</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <h1>Saved</h1>
        <form method="post" action="index.php">
            <?php
                //SAVE VARIABLES
                $artistName = $_POST['artistName'];
                $albumName = $_POST['carModel'];
                $songName = $_POST['songName'];
                //CONNECTION CODE
                $db = new PDO('mysql:host=172.31.22.43;dbname=Jackson1141574', 'Jackson1141574',  'Eq0W7b1PrZ');
                $sql = "INSERT INTO artist (artistName, albumName, songName) VALUES (:artistName, :albumName, :songName)";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                //PARAMETERS
                $cmd->bindParam(':artistName', $artistName, PDO::PARAM_STR, 30);
                $cmd->bindParam(':albumName', $albumName, PDO::PARAM_STR, 30);
                $cmd->bindParam(':songName', $songName, PDO::PARAM_STR, 30);
                $cmd->execute();
                $db = null;
            ?>
        </form>
    </body>
</html>