<?php
session_start();
$count = 1;
if (isset($_SESSION["count"])){
    $count = $_SESSION["count"] + 1;
}
$_SESSION["count"] = $count;
?>

<html>
    <head>
        <title>Cookie</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    </head>
    <body>
        Cookie Test
        <br><br>
        <?php
        if($count == 1){
        ?>
        First Visit<br>
        <?php
        }else{
        ?>
        <?= $count ?> times visit.
        <?php
        }
        ?>
    </body>
</html>