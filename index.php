<html>
    <head>
        <title>send text</title>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
    </head>
    <body bgcolor="#ffffff" text="#000000">
        <font size="4">Send Text</font>
        <form name="form1" method="post" action="confirm.php">
            Name:<br>
            <input type="text" name="name">
            <br>
            Content:<br>
            <textarea name="content" col="30" rows="5"></textarea>
            <br>
            <input type="submit" value="send">
            <input type="hidden" name="user_id" value="001">
        </form>
    </body>
</html>