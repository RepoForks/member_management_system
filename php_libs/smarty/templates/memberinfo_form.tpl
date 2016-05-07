<html>
	<head>
		<title>{$title}</title>
	</head>
	<body bgcolor="#ffffff">
		<center>
			<hr size="1" noshade>
			<b>{$title}</b>
			<hr size="1" noshade>
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td width="22%" align="left" valign="top">
						[ <a href="{$SCRIPT_NAME}">トップページへ</a> ]
					{if {$is_system)}
						<br><br>
						[ <a href="{$SCRIPT_NAME}?type=list&action=form{$add_pageID}">会員一覧</a> ]
					{/if}
						<br><br>
						{$disp_login_state}
					</td>
					<td width="78%" align="left" valign="top">
						{$message}
						<form {$form.attributes}>
							<table width="95%" border="0" cellspacing="5" cellpadding="0">
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">{$form.username.label}：</font>
									</td>
									<td width="79%">
									{if $form.username.error}
										<font size="2" color="red">{$form.username.error}</font>
										<br>
									{/if}
										{$form.username.html}
									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											{$form.password.label}:
										</font>
									</td>
									<td width="79%">
									{if $font.password.error}
										<font size="2" color="red">
											{$font.password.error}
										</font>
										<br>
									{/if}
										{$form.password.html}
									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											{$form.last_name.label}:
										</font>
									</td>
									<td width="79%">
									{if $font.last_name.error}
										<font size="2" color="red">
											{$font.password.error}
										</font>
										<br>
									{/if}
										{$form.last_name.html}
									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											{$form.first_name.label}:
										</font>
									</td>
									<td width="79%">
									{if $font.first_name.error}
										<font size="2" color="red">
											{$font.first_name.error}
										</font>
										<br>
									{/if}
										{$form.first_name.html}
									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											{$form.birthday.label}:
										</font>
									</td>
									<td width="79%">
									{if $font.birthday.error}
										<font size="2" color="red">
											{$font.birthday.error}
										</font>
										<br>
									{/if}
										{$form.birthday.html}
									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											{$form.prefecture.label}:
										</font>
									</td>
									<td width="79%">
									{if $font.password.error}
										<font size="2" color="red">
											{$font.prefecture.error}
										</font>
										<br>
									{/if}
										{$form.prefecture.html}
									</td>
								</tr>
								<tr align="center" valign="top">
									<td>&nbsp;</td>
									<td align="left">
									{if ($form.neg_submit.value != "")}
										{$form.neg_submit.html}
									{else}
										{$form.reset.html}
									{/if}
									{$form.pos_submit.html}
										<input type="hidden" name="type" value="{$type}">
										<input type="hidden" name="action" value="{$action}">
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</center>
		{if ($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>