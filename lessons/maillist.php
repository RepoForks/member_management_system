<html>
    <head>
        <title>Mail</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    </head>
    <body>
        メール受信：
        <?php
        $mailserver="imap.mail.yahoo.co.jp";
        $username="c9_php";
        $password="sakurajima";
        $mailbox = @imap_open("{".$mailserver.":993/imap/novalidate-cert/ssl}INBOX",$username,$password);
        print "conect";
        if($mailbox){
            $mails = imap_check($mailbox);
            $count = $mails->Nmsgs;
            print "not nil";
            if($count >= 1){
                print "got mails";
        ?>
                メールは<?=$count?>件あります<br>
        
                <table border=1>
                    <tr><td>No</td><td>Title</td><td>Date</td><td>From</td><td>Size</td></tr>
        <?php
                    for($num=1;$num<=$count;$num++){
                        $head = imap_header($mailbox, $num);
        ?>
                        <tr>
                            <td><?=$num?></td>
                            <td nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->subject))?></td>
                            <td nowrap><?=$head->date?></td>
                            <td nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->fromaddress))?></td>
                            <td nowrap><?=$head->Size?></td>
                        </tr>
        <?php
                    }
        ?>
                </table>
        <?php
            }else{
            ?>
                新着メールはありません。
        <?php
            }
            imap_close($mailbox);
        }else{
        ?>
            Error! Wrong username or password.
        <?php
        }
        ?>
    </body>
</html>