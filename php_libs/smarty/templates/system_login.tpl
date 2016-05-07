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
		 			<td width="22%">
		 				<form {$form.attributes}>
		 					<table border="0" cellpadding="0" cellspacing="0" summary="login form" width="100">
		 						<tr>
		 							<td colspan="2" bgcolor="#eeeeee">
		 								<b><font size="2">管理画面:</font></b>
		 							</td>
		 						</tr>
		 						<tr>
		 							<td nowrap><font size="2">{$form.username.label}:</font></td>
		 							<td>{$from.username.html}</td>
		 						</tr>
		 						<tr>
		 							<td nowrap><font size="2">{$form.password.label}:</font></td>
		 							<td>{$from.password.html}</td>
		 						</tr>
		 						<tr>
		 							<td colspan="2">
		 								<input type="hidden" name="type" value="$type">
		 								<div align="center">{$form.submit.html}</div>
		 								<br>
		 								<font size="2" color="red">{$auth_error_mess}</font>
		 							</td>
		 						</tr>
		 					</table>
		 				</form>
		 			</td>
		 			<td width="78%" align="left" valign="top">
		 				<br><br>
		 			</td>
		 		</tr>
		 	</table>
		</center>
		{if($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>