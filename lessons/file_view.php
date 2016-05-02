<html>
    <head>
        <title>file view</title>
    </head>
    <body>
        <?php
        $file_dir = '/Applications/XAMPP/xamppfiles/htdocs/member_management_system/image/';
        $file_path = $file_dir.$_FILES["uploadfile"]["name"];
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
            $img_dir = "./image/";
            $img_path = $img_dir.$_FILES["uploadfile"]["name"];
            $size = getimagesize($file_path);
        ?>
            uploaded!<br>
            <img src="<?=$img_path?>" <?=$size[3]?>><br>
            <b><?=$_POST["comment"]?></b><br>
        <?php
        }else{
        ?>
        Error!<br>
        <?php
        }
        ?>
    </body>
</html>