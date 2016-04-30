<?php
session_start();
$_SESSION["name"] = $_POST["name"];
$_SESSION["content"] = $_POST["content"];
if(isset($_POST["user_id"])){
    $_SESSION["user_id"] = $_POST["user_id"];
}
?>

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
        </form>
    </body>
</html>