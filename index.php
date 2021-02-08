<!--BASIC HTML SET UP-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Car Display</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <h1>My music library</h1>
        <?php
            //connecting to database and server
            $db = new PDO('mysql:host=172.31.22.43;dbname=Quinlan1145112', 'Quinlan1145112', 'osYG6iiDwD');
            $sql = "SELECT * FROM dropDown ORDER BY item";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            //retrieving inputs
            $inputs = $cmd->fetchAll();
            //PRINT STATEMENTS
            echo '<table><thread><th>Artist</th><th>Album</th><th>Song</th></thread>';
            foreach ($inputs as $indInputs){
                echo '<tr><td>' . $indInputs['artistName'] . '</td><td>' . $indInputs['albumName'] . '</td><td>' . $indInputs['songName'] . '</td></tr>';
            }
            echo '</table>';
            $db = null;
        ?>
    </body>
</html>


