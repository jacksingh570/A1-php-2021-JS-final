<!--html base-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Music Library</title>
    </head>
    <body>
        <h1>Music set up</h1>
        <form method="post" action="save.php"></form>
            <fieldset>
                <label for="artistName">Artists</label>
                <select name="artistName" id="artistName">
                    <?php
                        //variables
                        $artistName = $_POST['artistName'];
                        $albumName = $_POST['albumName'];
                        $songName = $_POST['songName'];

                        //conditions
                        if(empty($artistName)) {
                            echo 'artist name error';
                        }elseif(empty($albumName)){
                            echo 'album name error';
                        }elseif(empty($songName)){
                            echo 'song name error';
                        }
                        //connection to database
                        //connection to server
                        $db = new PDO('mysql:host=172.31.22.42;dbname=Jackson1141574', 'Jackson1141574', 'Eq0W7b1PrZx');
                        $sql = "SELECT * FROM artist ORDER BY item";
                        $cmd = $db->prepare($sql);
                        $cmd -> execute();
                        $dropDown = $cmd->fetchAll();
                        //printing the drop down
                        foreach ($dropDown as $inDropDown){
                            echo '<option value="' . $inDropDown['dropDownId'] . '">' . $inDropDown['item'] . '</option>';
                        }
                        //parameters
                        $cmd->bindParam(':artistName', $artistName, PDO::PARAM_STR, 30);
                        $cmd->bindParam('albumName', $albumName, PDO::PARAM_STR, 30);
                        $cmd->bindParam('songName', $songName, PDO::PARAM_STR, 30);
                        $cmd->execute();
                        $db = null;
                    ?>
                </select>
            </fieldset>
            <!--labels for album and song-->
            <fieldset>
                <label for="albumName">Albums</label>
                <input name="albumName" id="albumName">
            </fieldset>
            <fieldset>
                <label for="snogName">Songs</label>
                <input name="songName" id="songName">
            </fieldset>
            <button>Save</button>
        </form>
    </body>
</html>

