<?php
$count = 1;
if (isset($_COOKIE["count"])){
    $count = $_COOKIE["count"] + 1;
}
setcookie("count",$count,time()+10);
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