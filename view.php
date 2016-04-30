<html>
    <head>
        <title>Result</title>
    </head>
    <body>
        <?php
        if(isset($_POST["confirm"])){
        ?>
            <?php
            print "From ".$_POST["name"];
            print "<br><br>";
            print "Content:<br>";
            print nl2br($_POST["content"]);
            ?>
        <?php
        }elseif (isset($_POST["back"])){
        ?>        
            <font size="4">Send Test</font>
            <form name="form1" method="post" action="confirm.php">
                Name:<br>
                <input type="text" name="name" value="<?= $_POST["name"] ?>">
                <br>
                Content:<br>
                <textarea name="content" cols="30" rows="5"><?= $_POST["content"] ?></textarea>
                <br>
                <input type="submit" value="send">
                <input type="hidden" name="user_id" value="<?= $_POST["user_id"] ?>">
            </form>
        <?php
        }else{
        ?>
        ERROR<br>
        <a href="index.php">もどる</a>
        <?php
        }
        ?>
    </body>
</html>