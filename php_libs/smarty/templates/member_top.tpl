<html>
	<head>
		<title>{$title}</title>
	</head>
	<body>
		<center>
			<hr size="1" noshade>
				<b>{$title}</b>
			<hr size="1" noshade>
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
				 	<td width="22%" align="left" valign="top">
				 		[ <a href="{$SCRIPT_NAME}?type=logout">ログアウト</a> ]
				 		<br><br>
				 		{$disp_login_state}
				 	</td>
				 	<td width="78%" align="left" valign="top">
				 		<p>
				 			{$last_name|escape:"html"} さん、こんにちは！
				 			<br><br>
				 			<a href="{$SCRIPT_NAME}?type=modify&action=form">
				 				会員登録情報の修正
				 			</a>
				 			<br><br>
				 			<a href="{$SCRIPT_NAME}?type=delete&action=confirm">
				 				退会する
				 			</a>
				 		</p>
				 	</td>
				 </tr>
			</table>
		</center>
		{if ($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>