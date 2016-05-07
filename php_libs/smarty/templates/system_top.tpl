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
						[ <a href="{$SCRIPT_NAME}?type=list&action=form">会員一覧</a> ]
					</td>
				</tr>
			</table>
		</center>
		{if ($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>