<html>
    <head>
        <title>Comfirm</title>
    </head>
    <body>
        <form name="form1" method="post" action="view.php">
            <?php
                print "From ".$_POST["name"];
                print "<br><br>";
                print "Content:<br>";
                print nl2br($_POST["content"]);
            ?>
            <br>
            <input type="submit" value="confirm" name="confirm">
            <input type="submit" value="back" name="back">
            <input type="hidden" name="user_id" value="<?= $_POST["user_id"] ?>">
            <input type="hidden" name="name" value="<?= $_POST["name"] ?>">
            <input type="hidden" name="content" value="<?= $_POST["content"] ?>">
        </form>
    </body>
</html>