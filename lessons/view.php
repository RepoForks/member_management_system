<?php
session_start();
?>
<html>
    <head>
        <title>Result</title>
    </head>
    <body>
        <?php
        if(isset($_POST["confirm"])){
        ?>
            <?php
            print "From ".$_SESSION["name"];
            print "<br><br>";
            print "Content:<br>";
            print nl2br($_SESSION["content"]);
            ?>
            <br><br>
            <a href="index.php">Try Again?</a>
            <hr>
            <pre>
                <?php print_r($_SESSION);?>
            </pre>
        <?php
        }elseif (isset($_POST["back"])){
        ?>        
            <font size="4">Send Test</font>
            <form name="form1" method="post" action="confirm.php">
                Name:<br>
                <input type="text" name="name" value="<?= $_SESSION["name"] ?>">
                <br>
                Content:<br>
                <textarea name="content" cols="30" rows="5"><?= $_SESSION["content"] ?></textarea>
                <br>
                <input type="submit" value="send">
                <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">
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