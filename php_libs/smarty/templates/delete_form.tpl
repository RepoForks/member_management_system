<html>
	<head>
		<title>{$title}</title>
	</head>
	<body>
		<center>
			<hr size="1" noshade>
			<b>{$title}</b>
			<hr size="1" noshade>
			<tabel width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td width="22%" align="left" valign="top">
						[<a href="{$SCRIPT_NAME}">トップページへ</a> ]
					{if ($is_system) } 
						<br><br>
						[<a href="{$SCRIPT_NAME}?type=list&action=form{$add_pageID}">会員一覧</a> ]
					{/if}
						<br><br>
						{$disp_login_state}
					</td>

					<td width="78%" align="left" valign="top">
						<form {$form.attributes}>
							{$message}
							<br><br>
							{$form.submit.html}
							<input type="hidden" name="type" value="{$type}">
							<input type="hidden" name="action" value="{$action">
						</form>
					</td>
				</tr>
			</tabel>
		</center>
		{if ($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>
